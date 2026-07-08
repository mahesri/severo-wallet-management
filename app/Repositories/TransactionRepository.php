<?php

namespace App\Repositories;

use App\Models\Transactions;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Repositories\IncomesRepository;
use Illuminate\Support\Facades\DB;


class TransactionRepository implements TransactionRepositoryInterface
{

    public function create(Transactions $data)
    {
        Transactions::create([
            'amount' => $data->amount,
            'cr_dr' => $data->cr_dr,
            'allocate' => $data->allocate,
            'allocated_purpose' => $data->allocated_purpose,
            'type' => $data->type,
            'category' => $data->category,
            'description' => $data->description,
        ]);
    }

    public function find($id): \App\Models\Transactions
    {
        // TODO: Implement find() method.
    }

    public function getAll()
    {
        $transactions = Transactions::all();
        $allTransactions = [];

        foreach ($transactions as $transaction){
            $allTransactions [] = [
                'amount' =>         $transaction->amount,
                'cr_dr' =>         $transaction->cr_dr,
                'allocate' =>       $transaction->allocate,
                'allocated_purpose' => $transaction->allocated_purpose,
                'type' =>           $transaction->type,
                'category' =>       $transaction->category,
                'description' =>    $transaction->description
            ];
        }

        return $allTransactions;
    }

    public function save($id, $data): int
    {

    }

    public function destroy($id)
    {

    }

    public function getTotalIncome() : int
    {

        $incomes = DB::table('transactions')
            ->where('type', 'income')
            ->selectRaw('SUM(amount) as total_incomes')
            ->first();

        $totalIncomes = !is_null($incomes->total_incomes) ? $incomes->total_incomes : 0;

        return $totalIncomes;
    }
}
