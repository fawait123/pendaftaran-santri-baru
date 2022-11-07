<?php

namespace Database\Seeders;

use App\Models\Pendidikan;
use Illuminate\Database\Seeder;

class JenjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pendidikan::create([
            'jenjang_pend'=>'SD'
        ]);
        Pendidikan::create([
            'jenjang_pend'=>'SMP'
        ]);
        Pendidikan::create([
            'jenjang_pend'=>'SMA'
        ]);
        Pendidikan::create([
            'jenjang_pend'=>'Sarjana'
        ]);
    }
}
