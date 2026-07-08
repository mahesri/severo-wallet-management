<?php

namespace App\Services;

use App\Repositories\ExpenseRepository;
use App\Repositories\IncomesRepository;
use App\Repositories\TransactionRepository;
use App\Services\Interfaces\DashboardServiceInterface;
use App\Repositories\InvestedRepository;

class DashboardService implements DashboardServiceInterface
{

    private $currentSaldo;
    private InvestedRepository $investedRepository;
    private IncomesRepository $incomesRepository;
    private TransactionRepository $transactionRepository;
    private ExpenseRepository $expenseRepository;


    public function __construct(InvestedRepository    $investedRepository,
                                IncomesRepository     $incomesRepository,
                                TransactionRepository $transactionRepository,
                                ExpenseRepository     $expenseRepository,
                                \stdClass             $currentSaldo )
    {
        $this->investedRepository = $investedRepository;
        $this->incomesRepository = $incomesRepository;
        $this->transactionRepository = $transactionRepository;
        $this->expenseRepository = $expenseRepository;
        $this->currentSaldo = $currentSaldo;
    }


    public function getSummerize()
    {

        $totalIncome = $this->incomesRepository->getTotalIncomes();
        $totalExpanse = $this->expenseRepository->getTotalExpenses();
        $totalCash = $this->incomesRepository->getTotalCash();
        $totalDebit = $this->incomesRepository->getTotalDebit() - $this->expenseRepository->expenseUsingDebit();
        $totalSavingForMarried = $this->investedRepository->getTotalSavingForMarried();
        $totalGoldInvested = $this->investedRepository->getTotalGold();
        $totalBtcInvested = $this->investedRepository->getTotalBtc();

        return [
            'income' => $totalIncome,
            'expense' => $totalExpanse,
            'total_cash' => $totalCash,
            'total_debit' => $totalDebit,
            'total_sfm' => $totalSavingForMarried,
            'total_iig' => $totalGoldInvested,
            'total_iib' => $totalBtcInvested
        ];
    }

    protected function setCurrentSaldo()
    {
        $this->currentSaldo->currentCash = $this->incomesRepository->getTotalCash()
                + $this->incomesRepository->getTotalDebit();
            - $this->expenseRepository->getTotalExpenses();

    }

    public function getCurrentSaldo() :int
    {
        $this->setCurrentSaldo();

        return $this->currentSaldo->currentCash;

    }
}
