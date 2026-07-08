<?php

namespace Database\Seeders;

use App\Models\Transactions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Transactions::create([
            'amount' => 150000,
            'allocate' => 50000,
            'allocated_purpose'=>'saving_for_married',
            'type' => 'income',
            'category' => 'bonus',
            'description' => 'fee from freelance'
        ]);
    }
}
