<?php
declare(strict_types=1);

namespace App\Test\TestCase\DesignPattern;

use App\DesignPattern\Singleton;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    protected function setUp(): void
    {
        Singleton::reset();
    }

    public function testInstanceReturnsSame(): void
    {
        $one = Singleton::instance();
        $two = Singleton::instance();
        self::assertSame($one, $two, 'Instances should be same');
    }

    public function testResetChangesInstance(): void
    {
        $one = Singleton::instance();

        Singleton::reset();

        $two = Singleton::instance();
        self::assertNotSame($one, $two, 'Reset should change instance');
    }

    public function testNoProperties(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $target = Singleton::instance();

        $target->get('bogus');

        static::fail('Should throw exception');
    }
}
