<?php
declare(strict_types=1);

namespace App\Test\TestCase\DesignPattern;

use App\DesignPattern\Singleton;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class SingletonPropertyTest extends TestCase
{
    private const PROPERTIES = ['a' => 3, 'b' => 'extract'];

    /** @var Singleton */
    private $target;

    protected function setUp(): void
    {
        Singleton::reset();
        $this->target = Singleton::instance(self::PROPERTIES);
    }

    public function testOneProperty(): void
    {
        $actual = $this->target->get('a');

        self::assertSame(self::PROPERTIES['a'], $actual);
    }

    public function testTwoProperties(): void
    {
        $one = $this->target->get('a');
        $two = $this->target->get('b');

        self::assertSame(self::PROPERTIES['a'], $one);
        self::assertSame(self::PROPERTIES['b'], $two);
    }

    public function testWrongProperty(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->target->get('bogus');

        self::fail('Should see exception');
    }

    public function testSecondInstance(): void
    {
        $instance = Singleton::instance();

        $actual = $instance->get('a');

        self::assertSame(self::PROPERTIES['a'], $actual);
    }

    public function dataFields(): array
    {
        return [
            ['a'],
            ['b'],
        ];
    }

    /**
     * @param string $field
     * @return void
     * @dataProvider dataFields
     */
    public function testProvider(string $field): void
    {
        self::assertSame(self::PROPERTIES[$field], $this->target->get($field));
    }
}
