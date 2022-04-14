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
            'name' => 'Mahasiswa 1',
            'email' => 'mahasiswa1@mahasiswa1.com',
            'phone_number' => '081222',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'pfp' => 'img/default-user.png',
            'role' => 'mahasiswa',
            'password' => Hash::make('1234')
        ]);

        DB::table('users')->insert([
            'name' => 'Pembimbing & Penguji 1',
            'email' => 'pembimbing-penguji1@pembimbing-penguji1.com',
            'phone_number' => '081222',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'pfp' => 'img/default-user.png',
            'role' => 'pembimbing-penguji',
            'password' => Hash::make('1234')
        ]);
        DB::table('users')->insert([
            'name' => 'Pembimbing & Penguji 2',
            'email' => 'pembimbing-penguji2@pembimbing-penguji2.com',
            'phone_number' => '081222',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'pfp' => 'img/default-user.png',
            'role' => 'pembimbing-penguji',
            'password' => Hash::make('1234')
        ]);
        DB::table('users')->insert([
            'name' => 'Pembimbing & Penguji 3',
            'email' => 'pembimbing-penguji3@pembimbing-penguji3.com',
            'phone_number' => '081222',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'pfp' => 'img/default-user.png',
            'role' => 'pembimbing-penguji',
            'password' => Hash::make('1234')
        ]);

        DB::table('users')->insert([
            'name' => 'Gugus Tugas 1',
            'email' => 'gugus-tugas1@gugus-tugas1.com',
            'phone_number' => '081222',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'pfp' => 'img/default-user.png',
            'role' => 'gugus-tugas',
            'password' => Hash::make('1234')
        ]);

        DB::table('users')->insert([
            'name' => 'Kelompok Keahlian 1',
            'email' => 'kelompok-keahlian1@kelompok-keahlian1.com',
            'phone_number' => '081222',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'pfp' => 'img/default-user.png',
            'role' => 'kelompok-keahlian',
            'password' => Hash::make('1234')
        ]);

        DB::table('users')->insert([
            'name' => 'KK & GG 1',
            'email' => 'kk-gg1@kk-gg1.com',
            'phone_number' => '081222',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'pfp' => 'img/default-user.png',
            'role' => 'kk-gg',
            'password' => Hash::make('1234')
        ]);
    }
}
