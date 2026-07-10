<?php

    namespace App\Services;

    use App\Models\Expense;
    use App\Models\Incomes;
    use App\Models\Invested;
    use App\Models\Transactions;
    use App\Repositories\ExpenseRepository;
    use App\Repositories\InvestedRepository;
    use App\Services\Interfaces\TransactionServiceInterface;
    use App\Repositories\TransactionRepository;
    use App\Repositories\IncomesRepository;

class TransactionService implements TransactionServiceInterface
{

    private TransactionRepository $transactionRepository;
    private IncomesRepository $incomesRepository;
    private ExpenseRepository $expanseRepository;
    private InvestedRepository $investedRepository;

    public function __construct(TransactionRepository $transactionRepository, IncomesRepository $incomesRepository, ExpenseRepository $expanseRepository, InvestedRepository $investedRepository)
    {
        $this->transactionRepository = $transactionRepository;
        $this->incomesRepository = $incomesRepository;
        $this->expanseRepository = $expanseRepository;
        $this->investedRepository = $investedRepository;
    }

    public function addTransaction(Transactions $transaction)
    {

        if ($transaction->type === 'income'){

            $newIncome = new Incomes();

            $newIncome->amount = $transaction->amount - $transaction->allocate;
            $newIncome->cr_dr = $transaction->cr_dr;
            $newIncome->category = $transaction->category;
            $newIncome->description = $transaction->description;
            $this->incomesRepository->add($newIncome);
        }

        if ($transaction->type === 'expense'){

            $newExpanse = new Expense();
            $newExpanse->amount = $transaction->amount;
            $newExpanse->cr_dr = $transaction->cr_dr;
            $newExpanse->category = $transaction->category;
            $newExpanse->description = $transaction->description;

            $this->expanseRepository->add($newExpanse);
        }
        if (isset($transaction->allocate) == true){

            $newInvest = new Invested();
            $newInvest->amount = $transaction->allocate;
            $newInvest->cr_dr = $transaction->cr_dr;
            $newInvest->instrument = $transaction->allocated_purpose;
            $newInvest->description = $transaction->description;
            $this->investedRepository->add($newInvest);
        }

        $this->transactionRepository->create($transaction);
    }


    public function editTransaction()
    {

    }

    public function updateTransaction()
    {

    }

    public function getTransaction() : array
    {

        $transactions = $this->transactionRepository->getAll();
        return $transactions;
    }

    public function deleteTransaction()
    {

    }
}
