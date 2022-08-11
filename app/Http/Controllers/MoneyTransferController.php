<?php

namespace App\Http\Controllers;

use App\Contracts\MoneyTransferRepository;
use App\Contracts\MoneyTransferService;
use App\Http\Requests\SendMoneyTransferRequest;
use Illuminate\Http\Request;

class MoneyTransferController extends Controller
{

    private MoneyTransferService $moneyTransferService;

    public function __construct(MoneyTransferService $moneyTransferService)
    {
        $this->moneyTransferService = $moneyTransferService;
    }

    public function send(SendMoneyTransferRequest $request) {
        $this->moneyTransferService->doTransfer($request->validated());
    }
}
