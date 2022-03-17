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
            'name' => 'Mahasiswa 2',
            'email' => 'mahasiswa2@mahasiswa2.com',
            'password' => Hash::make('1234'),
            'address' => 'Purwokerto',
            'phone_number' => '081222',
            'role' => 'mahasiswa'
        ]);

        DB::table('users')->insert([
            'name' => 'Gugus Tugas 2',
            'email' => 'gugus-tugas2@gugus-tugas2.com',
            'password' => Hash::make('1234'),
            'address' => 'Purwokerto',
            'phone_number' => '081222',
            'role' => 'gugus-tugas'
        ]);

        DB::table('users')->insert([
            'name' => 'Kelompok Keahlian2',
            'email' => 'kelompok-keahlian2@kelompok-keahlian2.com',
            'password' => Hash::make('1234'),
            'address' => 'Purwokerto',
            'phone_number' => '081222',
            'role' => 'kelompok-keahlian'
        ]);

        DB::table('users')->insert([
            'name' => 'Pembimbing & Penguji 2',
            'email' => 'pembimbing-penguji2@pembimbing-penguji2.com',
            'password' => Hash::make('1234'),
            'address' => 'Purwokerto',
            'phone_number' => '081222',
            'role' => 'pembimbing-penguji'
        ]);
    }
}
