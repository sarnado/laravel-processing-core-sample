<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\ServiceAccount;
use Illuminate\Database\Seeder;

class ServiceAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = Currency::all();
        foreach ($currencies as $currency)
        {
            $acc = new ServiceAccount();
            $acc->currency_id = $currency->id;
            $acc->account = '1234123412341234';
            $acc->save();
        }
    }
}
