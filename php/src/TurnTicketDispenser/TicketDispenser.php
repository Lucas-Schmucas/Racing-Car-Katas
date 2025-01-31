<?php

declare(strict_types=1);

namespace RacingCar\TurnTicketDispenser;

class TicketDispenser
{
    private TurnNumberSequence $turnNumberSequence;
    public function __construct()
    {
        $this->turnNumberSequence = TurnNumberSequence::getInstance();
    }
    public function getTurnTicket(): TurnTicket
    {
        $newTurnNumber = $this->turnNumberSequence->nextTurn();

        return new TurnTicket($newTurnNumber);
    }
}
