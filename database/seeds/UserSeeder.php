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
            'name' => 'Mahasiswa 2',
            'email' => 'mahasiswa2@mahasiswa2.com',
            'phone_number' => '081222',
            'prodi' => 'S1-Informatika',
            'pfp' => 'img/default-user.png',
            'role' => 'mahasiswa',
            'password' => Hash::make('1234')
        ]);
        DB::table('users')->insert([
            'name' => 'Mahasiswa 3',
            'email' => 'mahasiswa3@mahasiswa3.com',
            'phone_number' => '081222',
            'prodi' => 'S1-Sistem Informasi',
            'pfp' => 'img/default-user.png',
            'role' => 'mahasiswa',
            'password' => Hash::make('1234')
        ]);
        DB::table('users')->insert([
            'name' => 'Mahasiswa 4',
            'email' => 'mahasiswa4@mahasiswa4.com',
            'phone_number' => '081222',
            'prodi' => 'S1-Sains Data',
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
            'name' => 'Gugus Tugas 2',
            'email' => 'gugus-tugas2@gugus-tugas2.com',
            'phone_number' => '081222',
            'prodi' => 'S1-Informatika',
            'pfp' => 'img/default-user.png',
            'role' => 'gugus-tugas',
            'password' => Hash::make('1234')
        ]);
        DB::table('users')->insert([
            'name' => 'Gugus Tugas 3',
            'email' => 'gugus-tugas3@gugus-tugas3.com',
            'phone_number' => '081222',
            'prodi' => 'S1-Sistem Informasi',
            'pfp' => 'img/default-user.png',
            'role' => 'gugus-tugas',
            'password' => Hash::make('1234')
        ]);
        DB::table('users')->insert([
            'name' => 'Gugus Tugas 4',
            'email' => 'gugus-tugas4@gugus-tugas4.com',
            'phone_number' => '081222',
            'prodi' => 'S1-Sains Data',
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
            'name' => 'Kelompok Keahlian 2',
            'email' => 'kelompok-keahlian2@kelompok-keahlian2.com',
            'phone_number' => '081222',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'pfp' => 'img/default-user.png',
            'role' => 'kelompok-keahlian',
            'password' => Hash::make('1234')
        ]);
        DB::table('users')->insert([
            'name' => 'Kelompok Keahlian 3',
            'email' => 'kelompok-keahlian3@kelompok-keahlian3.com',
            'phone_number' => '081222',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'pfp' => 'img/default-user.png',
            'role' => 'kelompok-keahlian',
            'password' => Hash::make('1234')
        ]);
        DB::table('users')->insert([
            'name' => 'Kelompok Keahlian 4',
            'email' => 'kelompok-keahlian4@kelompok-keahlian4.com',
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
