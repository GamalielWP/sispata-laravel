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
        // RPL
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0620039302',
            'kode_dosen' => 'GFA',
            'nama' => 'Gita Fadila Fitriana, S.Kom., M. Kom',
            'email' => 'gita@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0627089101',
            'kode_dosen' => 'RAA',
            'nama' => 'Rifki Adhitama, S.Kom., M.Kom',
            'email' => 'rifki@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0608118902',
            'kode_dosen' => 'AWT',
            'nama' => 'Aditya Wijayanto, S.Kom., M.Cs',
            'email' => 'aditya.wijayanto@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'kelompok-keahlian',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0607079301',
            'kode_dosen' => 'FDA',
            'nama' => 'Faisal Dharma Adhinata, S.Kom., M.Cs',
            'email' => 'faisal@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'gugus-tugas',
        ]);

        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0630069302',
            'kode_dosen' => 'ACW',
            'nama' => 'Ariq Cahya Wardhana, S.Kom., M.Kom',
            'email' => 'ariq@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0630049203',
            'kode_dosen' => 'NAF',
            'nama' => 'Nia Annisa Ferani T., S.Si., M.Sc',
            'email' => 'nia@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0605039201',
            'kode_dosen' => 'AJS',
            'nama' => 'Alon Jala Tirta Segara, S.Kom., M.Kom',
            'email' => 'alon@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0615029601',
            'kode_dosen' => 'NGR',
            'nama' => 'Nur Ghaniaviyanto Ramadhan, S.Kom., M.Kom',
            'email' => 'ghani@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);

        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0604119101',
            'kode_dosen' => 'ARB',
            'nama' => 'Arief Rais Bahtiar, S.Kom., M.Kom',
            'email' => 'ariefbahtiar@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0611018702',
            'kode_dosen' => 'AAH',
            'nama' => 'Arif Amrulloh, S.Kom., M.Kom',
            'email' => 'amrulloh@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0617049001',
            'kode_dosen' => 'CKO',
            'nama' => 'Condro Kartiko, S.Kom., M.T.I',
            'email' => 'condro.kartiko@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Rekayasa Perangkat Lunak',
            'role' => 'pembimbing-penguji',
        ]);


        // IF
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0617098802',
            'kode_dosen' => 'API',
            'nama' => 'Agi Prasetiadi, S.T., M. Eng.',
            'email' => 'agi@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0606118201',
            'kode_dosen' => 'APA',
            'nama' => 'Agus Priyanto, S.Kom., M.Kom.',
            'email' => 'agus_priyanto@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0606019201',
            'kode_dosen' => 'ABA',
            'nama' => 'Amalia Beladinna Arifa, S.Pd., M.Cs',
            'email' => 'amalia@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0601128701',
            'kode_dosen' => 'AGZ',
            'nama' => 'Anggi Zafia, S.T., M.Eng.',
            'email' => 'zafia@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);

        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0607079403',
            'kode_dosen' => 'AUT',
            'nama' => 'Annisaa Utami, S.Kom., M.Cs.',
            'email' => 'annisaa@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0601098701',
            'kode_dosen' => 'AWD',
            'nama' => 'Arif Wirawan Muhammad, S.Kom., M.Kom',
            'email' => 'arif@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0609128902',
            'kode_dosen' => 'ADO',
            'nama' => 'Aulia Desy Nur Utomo, S.Kom., M.Cs.',
            'email' => 'auliautomo@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0630058202',
            'kode_dosen' => 'AAB',
            'nama' => 'Auliya Burhanuddin, S.Si., M. Kom',
            'email' => 'auliya@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);

        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0603089202',
            'kode_dosen' => 'BPZ',
            'nama' => 'Bita Parga Zen, S. Kom., M. Han',
            'email' => 'bita@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0221019002',
            'kode_dosen' => 'CPR',
            'nama' => 'Cahyo Prihantoro, S.Kom., M.Eng.',
            'email' => 'cahyo@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '1026049401',
            'kode_dosen' => 'DSA',
            'nama' => 'Dasril Aldo, S.Kom., M.Kom',
            'email' => 'dasril@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0231108502',
            'kode_dosen' => 'DAP',
            'nama' => 'Dedy Agung Prabowo, S.Kom., M.Kom',
            'email' => 'dedy@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);

        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0618109301',
            'kode_dosen' => 'DCF',
            'nama' => 'Diandra Chika Fransisca, S.Si., M.Sc',
            'email' => 'diandra@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0621128701',
            'kode_dosen' => 'EII',
            'nama' => 'Emi Iryanti, S.ST., M.T.',
            'email' => 'emi_iryanti@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0622018403',
            'kode_dosen' => 'FMW',
            'nama' => 'Fahrudin Mukti Wibowo, S.Kom., M.Eng.',
            'email' => 'fahrudin@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0614048403',
            'kode_dosen' => 'IFA',
            'nama' => 'Ipam Fuaddina Adam, ST., M.Kom.',
            'email' => 'ipam@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);

        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0616068903',
            'kode_dosen' => 'IQA',
            'nama' => 'Iqsyahiro Kresna A, S.T., M.T.',
            'email' => 'hiro@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0614086602',
            'kode_dosen' => 'ISO',
            'nama' => 'Dr. Irwan Susanto, S.T., M.M.',
            'email' => 'irwansusanto_yk@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0611069301',
            'kode_dosen' => 'MPR',
            'nama' => 'Mega Pranata S. Pd., M. Kom.',
            'email' => 'mega@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0612059203',
            'kode_dosen' => 'MWB',
            'nama' => 'Merlinda Wibowo, S.T., M. Phil.',
            'email' => 'merlinda@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);

        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0614089302',
            'kode_dosen' => 'MAG',
            'nama' => 'Muhamad Azrino Gustalika, S. Kom., M. Tr. T',
            'email' => 'azrino@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0630119104',
            'kode_dosen' => 'MAM',
            'nama' => 'Muhammad Afrizal Amrustian, S. Kom., M. Kom',
            'email' => 'afrizal.amru@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0619029102',
            'kode_dosen' => 'MFS',
            'nama' => 'Muhammad Fajar Sidiq, S.T., M.T.',
            'email' => 'fajar@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0421019501',
            'kode_dosen' => 'MLU',
            'nama' => 'Muhammad Lulu Latif Usman, S.Pd., M.Han.',
            'email' => 'lulu@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);

        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0626128801',
            'kode_dosen' => 'MZN',
            'nama' => 'Muhammad Zidny Naf’an, S.Kom., M.Kom.',
            'email' => 'zidny@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => '22940062',
            'nidn' => null,
            'kode_dosen' => 'NEW',
            'nama' => 'Nicolaus Euclides Wahyu Nugroho, S.Kom., M.Cs.',
            'email' => 'nicolaus@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0627119002',
            'kode_dosen' => 'NAS',
            'nama' => 'Novanda Alim Setya Nugraha, S.S., M.Hum.',
            'email' => 'novanda@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0609119103',
            'kode_dosen' => 'NAP',
            'nama' => 'Novian Adi Prasetyo, S.Kom., M.Kom.',
            'email' => 'novian@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);

        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0624059501',
            'kode_dosen' => 'PRD',
            'nama' => 'Paradise, M. Kom',
            'email' => 'paradise@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0602079401',
            'kode_dosen' => 'PAR',
            'nama' => 'Pradana Ananda Raharja, S. Kom., M. Kom',
            'email' => 'pradana@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0625088202',
            'kode_dosen' => 'RWP',
            'nama' => 'Dr. Ridwan Pandiya, S.Si., M.Sc.',
            'email' => 'ridwanpandiya@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0625069201',
            'kode_dosen' => 'SDA',
            'nama' => 'Shintia Dwi Alika, M.Pd',
            'email' => 'shintia@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);

        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0605049301',
            'kode_dosen' => 'SDT',
            'nama' => 'Sudianto, S.Pd., M.Kom',
            'email' => 'sudianto@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0630068202',
            'kode_dosen' => 'TWM',
            'nama' => 'Dr. Tenia Wahyuningrum, S.Kom., M.T.',
            'email' => 'tenia@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0407088502',
            'kode_dosen' => 'TGL',
            'nama' => 'Tri Ginanjar Laksana, S.Kom., M.C.S., M.Kom.',
            'email' => 'anjarlaksana@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0602068902',
            'kode_dosen' => 'THY',
            'nama' => 'Trihastuti Yuniati, S.Kom., M.T.',
            'email' => 'trihastuti@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);

        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0613038503',
            'kode_dosen' => 'WAP',
            'nama' => 'Wahyu Adi Prabowo, S.Kom., M.B.A., M.Kom.',
            'email' => 'wahyuadi@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0628129101',
            'kode_dosen' => 'WAA',
            'nama' => 'Wahyu Andi Saputra, S.Pd., M.Eng',
            'email' => 'andi@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0627099501',
            'kode_dosen' => 'YSR',
            'nama' => 'Yohani Setiya Rafika Nur, S.Kom., M.Kom.',
            'email' => 'yohani@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0615049005',
            'kode_dosen' => 'YAS',
            'nama' => 'Yoso Adi Setyoko, S.T., M.T',
            'email' => 'yoso@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Teknik Informatika',
            'role' => 'pembimbing-penguji',
        ]);


        // SI
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0631078701',
            'kode_dosen' => 'STS',
            'nama' => 'Sisilia Thya Safitri, S.T., M.T',
            'email' => 'sisil@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0617019102',
            'kode_dosen' => 'DMK',
            'nama' => 'Dwi Mustika Kusumawardani, S.Kom., M.Kom',
            'email' => 'dwimustika@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0622017801',
            'kode_dosen' => 'DJA',
            'nama' => 'Dwi Januarita AK., S.T., M.Kom',
            'email' => 'dwijanuarita@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0602129101',
            'kode_dosen' => 'CWA',
            'nama' => 'Citra Wiguna, S.Kom., M.Kom',
            'email' => 'citra@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);

        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0621128902',
            'kode_dosen' => 'YUS',
            'nama' => 'Yudha Saintika, S.T., M.T.I',
            'email' => 'yudha@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0618038404',
            'kode_dosen' => 'DSI',
            'nama' => 'Didi Supriyadi, S.T., M.Kom., ITIL',
            'email' => 'didisupriyadi@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0101088702',
            'kode_dosen' => 'YDO',
            'nama' => 'Yogo Dwi Prasetyo, S.Si., M.Si',
            'email' => 'yogo@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0618048902',
            'kode_dosen' => 'CRI',
            'nama' => 'Cepi Ramdani, S.Kom., M.Eng',
            'email' => 'cepi@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);

        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0610108905',
            'kode_dosen' => 'SAS',
            'nama' => 'Sarah Astiti, S.Kom., M.MT',
            'email' => 'sarah@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0607019401',
            'kode_dosen' => 'DMS',
            'nama' => 'Darmansah,S .Kom., M.Kom',
            'email' => 'darmansah@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0604068901',
            'kode_dosen' => 'HWU',
            'nama' => 'Hari Widi Utomo,S.Pd.,M.Ed',
            'email' => 'hari@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0601099002',
            'kode_dosen' => 'MYF',
            'nama' => 'M. Yoka Fathoni, S.Kom., M.Kom',
            'email' => 'myokafathoni@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);

        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0613109201',
            'kode_dosen' => 'SWJ',
            'nama' => 'Sena Wijayanto,S.Pd.,M.T',
            'email' => 'sena@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0604069301',
            'kode_dosen' => 'RNS',
            'nama' => 'Rona Nisa Sofia Amriza, S.Kom., M.T.I., M.I.M',
            'email' => 'rona@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0618059401',
            'kode_dosen' => 'KMN',
            'nama' => 'Khairun Nisa Meiah, S.Pd., M.Kom',
            'email' => 'nisa@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0620108501',
            'kode_dosen' => 'DYK',
            'nama' => 'Daniel Yeri Kristiyanto, S.Kom., M.Kom., M.Si',
            'email' => 'daniel@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);

        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0307057601',
            'kode_dosen' => 'RSD',
            'nama' => 'Resad Setyadi, S.T., S.Si., MMSI',
            'email' => 'resad@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => '21790003',
            'nidn' => null,
            'kode_dosen' => 'HSD',
            'nama' => 'RR Hutanti Setyodewi, S.T., S.Si., M.MSI.',
            'email' => 'hutanti@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);
        DB::table('real_dosens')->insert([
            'nik' => null,
            'nidn' => '0201099202',
            'kode_dosen' => 'SFR',
            'nama' => 'Sandhy Fernandez, S.Kom., M.Kom.',
            'email' => 'sandhy@ittelkom-pwt.ac.id',
            'tlp' => '000000000000',
            'prodi' => 'S1-Sistem Informasi',
            'role' => 'pembimbing-penguji',
        ]);


        // SD
        // DB::table('real_dosens')->insert([
        //     'nik' => '',
        //     'nidn' => '',
        //     'kode_dosen' => '',
        //     'nama' => '',
        //     'email' => '',
        //     'tlp' => '000000000000',
        //     'prodi' => 'S1-Sains Data',
        //     'role' => 'pembimbing-penguji',
        // ]);
    }
}
