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
        DB::table('mahasiswas')->insert([
            'user_id' => '1',
            'nim' => '18104010'
        ]);
    }
}
