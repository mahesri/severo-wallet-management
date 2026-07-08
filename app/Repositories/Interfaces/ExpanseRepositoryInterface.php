<?php

namespace App\Repositories\Interfaces;

use App\Models\Expense;

interface ExpanseRepositoryInterface
{

    public function add(Expense $expense);

}
