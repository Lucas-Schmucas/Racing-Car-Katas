<?php

declare(strict_types=1);

namespace Tests\TirePressureMonitoring;

use PHPUnit\Framework\TestCase;
use RacingCar\TirePressureMonitoring\Alarm;
use RacingCar\TirePressureMonitoring\Sensor;

class AlarmTest extends TestCase
{
    public function testFoo(): void
    {
        $sensor = $this->createMock(Sensor::class);
        $alarm = new Alarm($sensor);
        $this->assertFalse($alarm->isAlarmOn());
        $alarm->check();
        $this->assertTrue($alarm->isAlarmOn());
    }
}
