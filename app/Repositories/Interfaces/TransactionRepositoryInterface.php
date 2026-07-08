<?php

namespace App\Repositories\Interfaces;

use App\Models\Transactions;

interface TransactionRepositoryInterface
{
    public function create(Transactions $data);

    public function find($id): Transactions;

    public function getAll();

    public function save($id, $data) : int ;

    public function destroy($id);

}
