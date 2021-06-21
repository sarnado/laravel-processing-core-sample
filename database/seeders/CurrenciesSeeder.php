<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codes = [
            'EUR', 'USD', 'RUB'
        ];
        foreach ($codes as $code) {
            Currency::create([
                'code' => $code
            ]);
        }
    }
}
