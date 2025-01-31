<?php

declare(strict_types=1);

namespace RacingCar\TurnTicketDispenser;

use RacingCar\TurnTicketDispenser\Singleton;

class TurnNumberSequence extends Singleton
{
    private static int $turnNumber = 0;

    public static function nextTurn(): int
    {
        return self::$turnNumber++;
    }
}
