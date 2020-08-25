<?php
declare(strict_types=1);

namespace ScriptFUSIONTest\Type;

use ScriptFUSION\Type\Date;
use PHPUnit\Framework\TestCase;

/**
 * @see Date
 */
final class DateTest extends TestCase
{
    public function testToday(): void
    {
        self::assertSame('today', Date::adapt(new \DateTime));
    }

    public function testYesterday(): void
    {
        self::assertSame('yesterday', Date::adapt(new \DateTime('-1 day')));
    }

    public function testLastWeek(): void
    {
        self::assertSame('7 days', Date::adapt(new \DateTime('-7 day')));
    }

    public function test30DaysAgo(): void
    {
        self::assertSame('30 days', Date::adapt(new \DateTime('-30 day')));
    }

    public function test31DaysAgo(): void
    {
        self::assertSame(($date = new \DateTime('-31 day'))->format('M Y'), Date::adapt($date));
    }
}
