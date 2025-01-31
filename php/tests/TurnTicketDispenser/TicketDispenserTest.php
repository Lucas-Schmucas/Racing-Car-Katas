<?php

declare(strict_types=1);

namespace Tests\TurnTicketDispenser;

use PHPUnit\Framework\TestCase;
use RacingCar\TurnTicketDispenser\TicketDispenser;

class TicketDispenserTest extends TestCase
{
    public function testFoo(): void
    {
        $dispenser1 = new TicketDispenser();
        $dispenser2 = new TicketDispenser();
        $dispenser3 = new TicketDispenser();
        $ticket1 = $dispenser1->getTurnTicket();
        $ticket2 = $dispenser2->getTurnTicket();
        $ticket3 = $dispenser3->getTurnTicket();

        $this->assertSame(0, $ticket1->getTurnNumber());
        $this->assertSame(1, $ticket2->getTurnNumber());
        $this->assertSame(2, $ticket3->getTurnNumber());
    }
}
