<?php

namespace Javanile\CronExpression\Tests;

use Javanile\CronExpression\FieldFactory;
use PHPUnit\Framework\TestCase;

/**
 * @author Michael Dowling <mtdowling@gmail.com>
 */
class FieldFactoryTest extends TestCase
{
    /**
     * @covers \Cron\FieldFactory::getField
     */
    public function testRetrievesFieldInstances()
    {
        $mappings = array(
            0 => 'Javanile\CronExpression\MinutesField',
            1 => 'Javanile\CronExpression\HoursField',
            2 => 'Javanile\CronExpression\DayOfMonthField',
            3 => 'Javanile\CronExpression\MonthField',
            4 => 'Javanile\CronExpression\DayOfWeekField',
        );

        $f = new FieldFactory();

        foreach ($mappings as $position => $class) {
            $this->assertSame($class, get_class($f->getField($position)));
        }
    }

    /**
     * @covers \Cron\FieldFactory::getField
     */
    public function testValidatesFieldPosition()
    {
        $this->expectException(\InvalidArgumentException::class);

        $f = new FieldFactory();
        $f->getField(-1);
    }
}
