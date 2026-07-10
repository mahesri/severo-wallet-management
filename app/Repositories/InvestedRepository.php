<?php

namespace App\Repositories;

use App\Models\Invested;
use App\Repositories\Interfaces\InvestedRepositoryInterface;
use Illuminate\Support\Facades\DB;

class InvestedRepository implements InvestedRepositoryInterface
{

    public function add(Invested|\App\Models\Investeds $invested){

        Invested::create([
            'amount' => $invested->amount,
            'instrument' => $invested->instrument,
            'cr_dr'=> $invested->cr_dr,
            'description' => $invested->description,
        ]);
    }

    public function getTotalBtc() : int
    {
        $btc = DB::table('invested')
            ->where('instrument', 'btc')
            ->selectRaw('SUM(amount) as total_btc')->first();

        $totalBtc = !is_null($btc->total_btc) ? $btc->total_btc : 0;

        return $totalBtc;
    }

    public function getTotalGold() : int
    {

        $gold = DB::table('invested')
            ->where('instrument', 'gold')
            ->selectRaw('SUM(amount) as total_gold')->first();

        $totalGold = !is_null($gold->total_gold) ? $gold->total_gold : 0;

        return $totalGold;
    }

    public function getTotalSavingForMarried() : int
    {

        $savingForMarried = DB::table('invested')
            ->where('instrument', 'saving_for_married')
            ->selectRaw('SUM(amount) as total_savingForMarried')->first();

        $totalSavingForMarried = !is_null($savingForMarried->total_savingForMarried) ? $savingForMarried->total_savingForMarried : 0;

        return  $totalSavingForMarried;
    }
}
