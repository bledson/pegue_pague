<?php

namespace App\Events;

use App\Models\MoneyTransfer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MoneyReceived
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The moneyTransfer instance.
     *
     * @var \App\Models\MoneyTransfer
     */
    public MoneyTransfer $moneyTransfer;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\MoneyTransfer $moneyTransfer
     * @return void
     */
    public function __construct(MoneyTransfer $moneyTransfer)
    {
        $this->moneyTransfer = $moneyTransfer;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
