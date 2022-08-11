<?php

namespace App\Services;

use App\Contracts\MoneyTransferRepository;
use App\Contracts\MoneyTransferService;
use App\Events\MoneyReceived;
use Illuminate\Support\Facades\Auth;

class InternalMoneyTransferService implements MoneyTransferService
{

    private MoneyTransferRepository $moneyTransferRepository;

    public function __construct(MoneyTransferRepository $moneyTransferRepository)
    {
        $this->moneyTransferRepository = $moneyTransferRepository;
    }

    public function doTransfer(array $data): bool
    {
        if ($data['amount'] > Auth::user()->balance) {
            return false;
        }

        $data['status'] = 'to_be_processed';

        $moneyTransfer = $this->moneyTransferRepository->create($data);

        MoneyReceived::dispatch($moneyTransfer);

        return true;
    }
}
