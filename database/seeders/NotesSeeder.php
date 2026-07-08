<?php

namespace Database\Seeders;

use App\Models\Transactions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transactions::create([
            'amount' => 500,
            'category' => 'liquid',
            'allocated_purpose'=>'saving_for_married',
            'type' => 'income',

        ]);
    }
}
