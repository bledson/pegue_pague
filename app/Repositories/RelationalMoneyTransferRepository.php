<?php

namespace App\Repositories;

use App\Contracts\MoneyTransferRepository;
use App\Models\MoneyTransfer;

class RelationalMoneyTransferRepository implements MoneyTransferRepository
{

    public function create(array $data)
    {
        return MoneyTransfer::create($data);
    }
}
