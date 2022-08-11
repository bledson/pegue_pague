<?php

namespace App\Listeners;

use App\Contracts\MoneyTransferNotificationService;
use App\Events\MoneyReceived;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

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
        DB::transaction(function () use ($event) {
            $payer = User::find($event->moneyTransfer->payer);
            $payer->balance -= $event->moneyTransfer->amount;
            $payee = User::find($event->moneyTransfer->payee);
            $payee->balance += $event->moneyTransfer->amount;
            $event->moneyTransfer->status = 'processed';
            $payer->save();
            $payee->save();
            $event->moneyTransfer->save();
        });
        $this->moneyTransferNotificationService->send($event->moneyTransfer);
    }
}
