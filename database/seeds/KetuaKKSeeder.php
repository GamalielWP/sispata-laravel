<?php

use App\BidangKeahlian;
use App\Dosen;
use App\User;
use Illuminate\Database\Seeder;

class KetuaKKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dosen = Dosen::all();

        foreach ($dosen as $ds) {
            if ($ds->user->role == 'kelompok-keahlian' || $ds->user->role == 'kk-gg') {
                
                $i = 1;
                DB::table('ketua_k_k_s')->insert([
                    'user_id' => $ds->user->id,
                    'dosen_id' => $ds->id,
                    'scope_id' => $i++
                ]);
                
            }
        }
    }
}
