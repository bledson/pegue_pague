<?php

namespace App\Contracts;

interface MoneyTransferService
{

    public function doTransfer(array $data);
}
