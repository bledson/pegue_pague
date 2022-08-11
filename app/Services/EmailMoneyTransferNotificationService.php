<?php

namespace App\Services;

use App\Contracts\MoneyTransferNotificationService;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class EmailMoneyTransferNotificationService implements MoneyTransferNotificationService
{

    public function send(User $payee) : bool {
        $response = Http::post(config('app.external_email_service'), [
            'email' => $payee->email,
        ]);

        if (!$response->ok()) {
            return false;
        }

        return true;
    }
}
