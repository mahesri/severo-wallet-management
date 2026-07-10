<?php

namespace App\Repositories;

use App\Models\Expense;
use App\Repositories\Interfaces\ExpanseRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ExpenseRepository implements ExpanseRepositoryInterface
{

    public function add(Expense $expense)
    {

        Expense::create([
            'amount' => $expense->amount,
            'cr_dr' => $expense->cr_dr,
            'category' => $expense->category,
            'description' => $expense->description,
        ]);
    }

    public function getTotalExpenses() : int
    {
        $expense = DB::table('expenses')
            ->selectRaw('SUM(amount) as total_expense')->first();

        $totalExpense = !is_null($expense->total_expense) ? $expense->total_expense : 0;

        return $totalExpense;
    }

    public function expenseUsingDebit(): int
    {
        $debitExpense = DB::table('expenses')
            ->where('cr_dr', 'debit')
                ->selectRaw('SUM(amount) as total_expenseDebit')
                ->first();
        $totalExpenseDebit = !is_null($debitExpense->total_expenseDebit) ? $debitExpense->total_expenseDebit : 0;

        return $totalExpenseDebit;
    }
}
