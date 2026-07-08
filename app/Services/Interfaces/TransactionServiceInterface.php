<?php

namespace App\Services\Interfaces;

use App\Models\Transactions;

interface TransactionServiceInterface
{

    public function addTransaction(Transactions $notes);
    public function getTransaction(): array;
    public function deleteTransaction();
    public function editTransaction();
    public function updateTransaction();

}
