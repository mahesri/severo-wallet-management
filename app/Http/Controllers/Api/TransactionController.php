<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionsRequest;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Services\TransactionService;

class TransactionController extends Controller
{

    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function getTransactions()
    {

        $transactions = $this->transactionService->getTransaction();
        $result = json_encode($transactions);
        return response()->json(["message" => $result]);

    }



    public function createTransaction(StoreTransactionsRequest $request)
    {

        $data = $request->validated();

        $newTransaction = new Transactions();
        $newTransaction->amount = $data['amount'];
        $newTransaction->cr_dr = $data['cr_dr'];
        $newTransaction->allocate = $data['allocate'];
        $newTransaction->allocated_purpose = $data['allocated_for'];
        $newTransaction->type = $data['type'];
        $newTransaction->category = $data['category'];
        $newTransaction->description = $data['description'];

        $this->transactionService->addTransaction($newTransaction);

        return response()->json([
            'status' => 'success',
            'message' => 'Data saved successfully'],
            );
    }

    public function storeTransaction(Request $request)
    {

    }

    public function show(Transactions $transactions)
    {

    }


    public function edit(Transactions $transactions)
    {

    }


    public function update(Request $request, Transactions $transactions)
    {

    }


    public function destroy(Transactions $transactions)
    {

    }
}
