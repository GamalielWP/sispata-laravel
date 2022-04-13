<?php

use Illuminate\Database\Seeder;
use App\User;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = User::where('role', 'pembimbing-penguji')->get();

        foreach ($data as $dt) {
            DB::table('dosens')->insert([
                'user_id' => $dt->id,
                'nidn' => mt_rand(10000,99999),
                'lecturer_code' => Str::random(3),
                'address' => 'Institut Teknologi Telkom Purwokerto Jl. DI Panjaitan No.128, Karangreja, Purwokerto Kidul, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53147 (0281) 641629'
            ]);
        }

    }
}
