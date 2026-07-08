<?php

 namespace App\Repositories\Interfaces;

 use App\Models\Incomes;

 interface IncomesRepositoryInterface {

    public function add(Incomes $newIncome);

}
