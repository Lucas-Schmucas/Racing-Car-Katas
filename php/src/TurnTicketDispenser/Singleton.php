<?php

namespace RacingCar\TurnTicketDispenser;
abstract class Singleton
{
    private static array $instances = [];
    protected function __construct()
    {
    }

    public static function getInstance(): static
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
}