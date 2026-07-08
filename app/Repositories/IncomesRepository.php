<?php

namespace App\Repositories;

use App\Models\Incomes;
use App\Repositories\Interfaces\IncomesRepositoryInterface;
use Illuminate\Support\Facades\DB;

class IncomesRepository implements IncomesRepositoryInterface
{
    public function getTotalIncomes() : int
    {
        $incomes = DB::table('incomes')
            ->selectRaw('SUM(amount) as totalIncomes')
            ->first();

        $totalIncomes = !is_null($incomes->totalIncomes) ? $incomes->totalIncomes : 0;
        return $totalIncomes;
    }

    public function add(Incomes $income)
    {
        Incomes::create([
            'amount' => $income->amount,
            'cr_dr' => $income->cr_dr,
            'category' => $income->category,
            'description' => $income->description,
        ]);

        return true;
    }

    public function getTotalDebit() : int
    {

    $debit = DB::table('incomes')
        ->where('cr_dr', 'debit')
        ->selectRaw('SUM(amount) as total_debit')
        ->first();

    $totalDebit = !is_null($debit->total_debit) ? $debit->total_debit : 0;

        return $totalDebit;
    }

    public function getTotalCash() : int
    {
        $cash = DB::table('incomes')
            ->where('cr_dr', 'cash')
            ->selectRaw('SUM(amount) as total_cash')
            ->first();

        $totalCash = !is_null($cash->total_cash) ? $cash->total_cash : 0;
        return $totalCash;
    }
}
