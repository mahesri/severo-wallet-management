<?php

namespace App\Providers;

use App\Models\Incomes;
use App\Repositories\ExpenseRepository;
use App\Repositories\IncomesRepository;
use App\Repositories\Interfaces\IncomeRepositoryInterface;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Repositories\TransactionRepository;
use App\Repositories\Interfaces\InvestedRepositoryInterface;
use App\Repositories\InvestedRepository;
use App\Services\Interfaces\TransactionServiceInterface;
use App\Services\TransactionService;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{


    public function register(): void
    {
        $this->app->bind(TransactionServiceInterface::class, TransactionService::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
        $this->app->bind(IncomesRepositoryInterface::class, IncomesRepository::class);
        $this->app->bind(ExpanseRepositoryInterface::class, ExpenseRepository::class);
        $this->app->bind(InvestedRepositoryInterface::class, InvestedRepository::class);
    }


    public function boot(): void
    {

    }
}
