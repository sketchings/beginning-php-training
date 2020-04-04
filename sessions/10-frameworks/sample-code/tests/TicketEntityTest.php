<?php

use PHPUnit\Framework\TestCase;
use App\TicketEntity;
use App\TicketMapper;
use PDO;
use Phinx\Config\Config;
use Phinx\Migration\Manager;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\NullOutput;


class TicketEntityTest extends TestCase
{
    protected $db;
    
    protected function setUp(): void
    {
        $pdo = new PDO('sqlite::memory:', null, null, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        try {
            $configArray = Yaml::parseFile('phinx.yml');
            $configArray['environments']['test'] = [
                'adapter'    => 'sqlite',
                'connection' => $pdo
            ];
            $config = new Config($configArray);
            $manager = new Manager($config, new NullOutput());
            $manager->migrate('test');
            $manager->seed('test');
            // You can change default fetch mode after the seeding
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->db = $pdo;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    public function testRuning()
    {
        $this->assertTrue(true);
    }
    public function testAddTicket()
    {
        $ticket_data = [
            'id' => 1,
            'title' => 'Test One',
            'description' => 'My test ticket',
            'component' => 'webiste'
        ];
        $ticket = new TicketEntity($ticket_data);
        $ticket_mapper = new TicketMapper($this->db);
        $ticket_mapper->save($ticket);
        $this->assertIsArray($ticket_data);
        //$this->assertIsArray($this->db);
    $actualRecordsArray = $ticket_mapper->getTickets();
    var_dump($actualRecordsArray);

        //$actualRecordsArray = $ticket_mapper->getTicketById(1);

        // Verify
        $this->assertEquals('Test One', $actualRecordsArray['title']);

    }
    // Stub
    public function ImportJson_full()
    {
        // Setup dummy
        $dummyDb = $this->createMock(\App\DatabaseWriter::class);

        // Setup data
        $filePath = 'https://teamtreehouse.com/alenaholligan.json';
        $filePath = __DIR__.'/../../Fixtures/call-records-full.json';

        // Exercise
        $results = new CallImporter();
        $actualRecordsArray = $results->importFromJson($filePath, $dummyDb);
        $headers = '';
        foreach ($actualRecordsArray as $key=>$value) {
            $headers.= $key.'\n';
        }
        $this->assertEquals($headers, $actualRecordsArray['name']);

        // Verify
        $this->assertEquals('Alena Holligan', $actualRecordsArray['name']);
    }
    // Stub
    public function ParseCsvLine_WithOneLine()
    {
        // Setup stub
        $double = $this->getMockBuilder(CallImporter::class)
             ->setMethodsExcept(['parseCsvLine'])
             ->getMock();
        $double->method('isExistingCustomer')->willReturn(true);

        // Setup data
        $csvLine = '1,2017-11-01 09:00:00,2017-11-01 09:05:00';

        // Setup expectations
        $expectedMinutes = 5;

        // Exercise
        $actualRecord = $double->parseCsvLine($csvLine);

        // Verify
        $this->assertEquals($expectedMinutes, $actualRecord->getMinutes());
    }

    // Mock + dummy
    public function ImportFromCsv_WithTwoRecords()
    {
        // Setup mock & expectations
        $double = $this->getMockBuilder(CallImporter::class)
             ->setMethodsExcept(['importFromCsv'])
             ->getMock();
        $double->expects($this->exactly(2))->method('parseCsvLine');

        // Setup dummy
        $dummyDb = $this->createMock(\App\Service\DatabaseWriter::class);

        // Setup data
        $filePath = __DIR__.'/../../Fixtures/call-records-2-rows.csv';

        // Exercise
        $actualRecordsArray = $double->importFromCsv($filePath, $dummyDb);

        // Verify
        $this->assertCount(2, $actualRecordsArray);
    }

    // Spy + stub
    /**
     * Setup spy (and auto-verify)
     */
    public function ParseCsvLine_WithInvalidCustomer()
    {
        $this->expectException(\UnexpectedValueException::class);
        // Setup stub
        $double = $this->getMockBuilder(CallImporter::class)
            ->setMethodsExcept(['parseCsvLine'])
            ->getMock();
        $double->method('isExistingCustomer')->willReturn(false);

        // Setup data
        $csvLine = '5,2017-11-01 09:00:00,2017-11-01 09:05:00';

        // Exercise
        $double->parseCsvLine($csvLine);
    }

    // Custom spy
    public function ImportFromCsv_SavesRecords()
    {
        // Setup mock
        $double = $this->getMockBuilder(CallImporter::class)
            ->setMethodsExcept(['importFromCsv'])->getMock();

        // Setup spy
        $dummyDb = $this->createMock(\App\Service\DatabaseWriter::class);
        $dummyDb->expects($spy = $this->any())->method('saveRecords');

        // Setup data
        $filePath = __DIR__.'/../../Fixtures/call-records-2-rows.csv';

        // Exercise
        $double->importFromCsv($filePath, $dummyDb);

        // Verify
        $invocations = $spy->getInvocations();

        $this->assertCount(1, $invocations);
        $firstParameter = $invocations[0]->getParameters()[0];

        $this->assertIsArray($firstParameter);
        $this->assertInstanceOf(\App\Model\Call::class, $firstParameter[0]);
    }

    // Fake + stub + spy
    public function ImportFromCsv_InvalidCustomerFake()
    {
        $this->expectException(\UnexpectedValueException::class);
        // Setup stub
        $double = $this->getMockBuilder(CallImporter::class)
            ->setMethodsExcept(['parseCsvLine'])->getMock();

        // Setup fake
        $double->method('isExistingCustomer')
            ->will($this->returnCallback(
                function (int $customerId) {
                    if ($customerId >= 1) {
                        return false;
                    }
                    return true;
                }
            ));

        // Setup data
        $csvLine = '1000,2017-11-01 09:00:00,2017-11-01 09:05:00';

        // Exercise
        $double->parseCsvLine($csvLine);
    }
}