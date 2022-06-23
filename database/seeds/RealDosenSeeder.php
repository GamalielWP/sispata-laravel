<?php

use Illuminate\Database\Seeder;

class RealDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('real_dosens')->insert([
            'nidn' => '0620039302',
            'kode_dosen' => 'GFA',
            'nama' => 'Gita Fadila Fitriana, S.Kom., M. Kom',
            'email' => 'gita@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nidn' => '0627089101',
            'kode_dosen' => 'RAA',
            'nama' => 'Rifki Adhitama, S.Kom., M.Kom',
            'email' => 'rifki@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nidn' => '0608118902',
            'kode_dosen' => 'AWT',
            'nama' => 'Aditya Wijayanto, S.Kom., M.Cs',
            'email' => 'aditya.wijayanto@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'kelompok-keahlian',
        ]);
        DB::table('real_dosens')->insert([
            'nidn' => '0607079301',
            'kode_dosen' => 'FDA',
            'nama' => 'Faisal Dharma Adhinata, S.Kom., M.Cs',
            'email' => 'faisal@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'gugus-tugas',
        ]);

        DB::table('real_dosens')->insert([
            'nidn' => '0630069302',
            'kode_dosen' => 'ACW',
            'nama' => 'Ariq Cahya Wardhana, S.Kom., M.Kom',
            'email' => 'ariq@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nidn' => '0630049203',
            'kode_dosen' => 'NAF',
            'nama' => 'Nia Annisa Ferani T., S.Si., M.Sc',
            'email' => 'nia@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nidn' => '0605039201',
            'kode_dosen' => 'AJS',
            'nama' => 'Alon Jala Tirta Segara, S.Kom., M.Kom',
            'email' => 'alon@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nidn' => '0615029601',
            'kode_dosen' => 'NGR',
            'nama' => 'Nur Ghaniaviyanto Ramadhan, S.Kom., M.Kom',
            'email' => 'ghani@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);

        DB::table('real_dosens')->insert([
            'nidn' => '0604119101',
            'kode_dosen' => 'ARB',
            'nama' => 'Arief Rais Bahtiar, S.Kom., M.Kom',
            'email' => 'ariefbahtiar@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nidn' => '0611018702',
            'kode_dosen' => 'AAH',
            'nama' => 'Arif Amrulloh, S.Kom., M.Kom',
            'email' => 'amrulloh@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nidn' => '0617049001',
            'kode_dosen' => 'CKO',
            'nama' => 'Condro Kartiko, S.Kom., M.T.I',
            'email' => 'condro.kartiko@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);
    }
}
