<?php

namespace Database\Seeders;
use App\Models\Produksi;
use Carbon\Carbon;

use Illuminate\Database\Seeder;

class ProduksiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produksi::insert([
            [
                'tanggal'       => Carbon::parse('2020-10-20'),
                'wilayah'       => '1',
                'produksi'      => 100000
            ],
            [
                'tanggal'       => Carbon::parse('2020-10-21'),
                'wilayah'       => '2',
                'produksi'      => 150000
            ],
            [
                'tanggal'       => Carbon::parse('2020-10-22'),
                'wilayah'       => '3',
                'produksi'      => 200000
            ],
            [
                'tanggal'       => Carbon::parse('2020-10-21'),
                'wilayah'       => '4',
                'produksi'      => 300000
            ],
            [
                'tanggal'       => Carbon::parse('2020-10-22'),
                'wilayah'       => '5',
                'produksi'      => 300000
            ],
        ]);
    }
}
