<?php
declare(strict_types=1);

namespace App\Test\TestCase\ErrorException;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ExploreErrorTest extends TestCase
{
    public function testException(): void
    {
        try {
            self::assertTrue(true);
        } catch (InvalidArgumentException $e) {
            static::fail($e->getMessage() . PHP_EOL . $e->getTraceAsString());
        }
    }
}
