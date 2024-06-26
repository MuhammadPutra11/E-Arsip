<?php

namespace Database\Seeders;

use App\Models\Foto;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Dokumen;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'id' => '1',
            'username' => 'teo',
            'password' => 'teo',
            'no_hp' => '082252001327',
        ]);

        User::create([
            'id' => '2',
            'username' => 'putra',
            'password' => 'putra',
            'no_hp' => '085390511405',
        ]);

        Dokumen::create([
            'id' => '1',
            'user_id' => '1',
            'nama_dokumen' => 'Lakip',
            'tanggal_dokumen' => '31 mei',
            'pengedit_dokumen' => 'putra',
            'status' => 'selesai',
            'catatan' => 'ea ea ea ea',
            'file_dokumen' => 'asldas90d8uyap9a'
        ]);

        Dokumen::create([
            'id' => '2',
            'user_id' => '2',
            'nama_dokumen' => 'Renstra',
            'tanggal_dokumen' => '31 mei',
            'pengedit_dokumen' => 'putra2',
            'status' => 'proses',
            'catatan' => 'eae eae eae eae',
            'file_dokumen' => 'bvsd34d8uyap9a'
        ]);

        Foto::create([
            'id' => '1',
            'user_id' => '1',
            'nama_foto' => 'dokumentasi',
            'tanggal_foto' => '31 januari',
            'catatan' => 'ea ea ea ea',
            'file_foto' => 'vbnas90d8uyap9a'
        ]);

        Foto::create([
            'id' => '2',
            'user_id' => '2',
            'nama_foto' => 'Kegiatan asd',
            'tanggal_foto' => '23 mei',
            'catatan' => 'ea ea ea ea',
            'file_foto' => 'asldas90d8uyap9a'
        ]);

        SuratKeluar::create([
            'id' => '1',
            'user_id' => '1',
            'nama_suratkeluar' => 'surat bapeda',
            'tanggal_suratkeluar' => '31 januari',
            'pengirim' => 'putra',
            'catatan' => 'ea ea ea ea',
            'file_suratkeluar' => 'vbnas90d8uyap9a'
        ]);

        SuratKeluar::create([
            'id' => '2',
            'user_id' => '2',
            'nama_suratkeluar' => 'surat rapat',
            'tanggal_suratkeluar' => '31 januari',
            'pengirim' => 'putra',
            'catatan' => 'ea ea ea ea',
            'file_suratkeluar' => 'asdad8uyap9a'
        ]);

        SuratMasuk::create([
            'id' => '1',
            'user_id' => '1',
            'nama_suratmasuk' => 'sur324 bapeda',
            'tanggal_suratmasuk' => '31 januari',
            'pengirim' => 'putra',
            'catatan' => 'ea ea ea ea',
            'file_suratmasuk' => 'vbnas90d8uyap9a'
        ]);

        SuratMasuk::create([
            'id' => '2',
            'user_id' => '2',
            'nama_suratmasuk' => '879324 bapeda',
            'tanggal_suratmasuk' => '31 januari',
            'pengirim' => 'putra',
            'catatan' => 'ea ea ea ea',
            'file_suratmasuk' => 'vbnas90d8uyap9a'
        ]);

    }
}
