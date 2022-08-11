<?php

namespace App\Listeners;

use App\Contracts\MoneyTransferNotificationService;
use App\Events\MoneyReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTransferNotification implements ShouldQueue
{

    private MoneyTransferNotificationService $moneyTransferNotificationService;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(MoneyTransferNotificationService $moneyTransferNotificationService)
    {
        $this->moneyTransferNotificationService = $moneyTransferNotificationService;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\MoneyReceived  $event
     * @return void
     */
    public function handle(MoneyReceived $event)
    {
        $this->moneyTransferNotificationService->send($event->moneyTransfer);
    }
}
