<?php

use Illuminate\Database\Seeder;

class BidangKKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bidang_keahlians')->insert([
            'scope' => 'RPLM'
        ]);

        DB::table('bidang_keahlians')->insert([
            'scope' => 'TI'
        ]);

        DB::table('bidang_keahlians')->insert([
            'scope' => 'TKSE'
        ]);

        DB::table('bidang_keahlians')->insert([
            'scope' => 'RD'
        ]);
    }
}
