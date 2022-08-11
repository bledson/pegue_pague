<?php

namespace App\Services;

use App\Contracts\MoneyTransferNotificationService;
use App\Models\MoneyTransfer;
use Illuminate\Support\Facades\Http;

class EmailMoneyTransferNotificationService implements MoneyTransferNotificationService
{

    public function send(MoneyTransfer $moneyTransfer) : bool {
        $response = Http::post(config('app.external_email_service'), [
            // TODO: adicionar e-mail
            'email' => $moneyTransfer,
        ]);

        if (!$response->ok()) {
            return false;
        }

        return true;
    }
}
