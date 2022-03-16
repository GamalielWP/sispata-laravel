<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@mahasiswa.com',
            'password' => Hash::make('1234'),
            'address' => 'Purwokerto',
            'phone_number' => '081222',
            'role' => 'mahasiswa'
        ]);

        DB::table('users')->insert([
            'name' => 'Gugus Tugas',
            'email' => 'gugus-tugas@gugus-tugas.com',
            'password' => Hash::make('1234'),
            'address' => 'Purwokerto',
            'phone_number' => '081222',
            'role' => 'gugus-tugas'
        ]);

        DB::table('users')->insert([
            'name' => 'Kelompok Keahlian',
            'email' => 'kelompok-keahlian@kelompok-keahlian.com',
            'password' => Hash::make('1234'),
            'address' => 'Purwokerto',
            'phone_number' => '081222',
            'role' => 'kelompok-keahlian'
        ]);

        DB::table('users')->insert([
            'name' => 'Pembimbing',
            'email' => 'pembimbing@pembimbing.com',
            'password' => Hash::make('1234'),
            'address' => 'Purwokerto',
            'phone_number' => '081222',
            'role' => 'pembimbing'
        ]);
        
        DB::table('users')->insert([
            'name' => 'Penguji',
            'email' => 'penguji@penguji.com',
            'password' => Hash::make('1234'),
            'address' => 'Purwokerto',
            'phone_number' => '081222',
            'role' => 'penguji'
        ]);
    }
}
