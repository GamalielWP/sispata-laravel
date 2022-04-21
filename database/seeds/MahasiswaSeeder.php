<?php

use Illuminate\Database\Seeder;
use App\User;

class MahasiswaSeeder extends Seeder
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
            DB::table('mahasiswas')->insert([
                'user_id' => $dt->id,
                'nim' => mt_rand(18104010,18104013)
        ]);
    }
    }
}
