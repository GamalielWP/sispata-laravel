<?php

use App\User;
use Illuminate\Database\Seeder;

class SemproSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = User::where('role', 'mahasiswa')->get();

        foreach ($data as $dt) {
            DB::table('sempros')->insert([
                'mhs_user_id' => $dt->id
        ]);
        }
    }
}
