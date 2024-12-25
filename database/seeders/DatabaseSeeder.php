<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Hajid Al Akhtar',
            'email' => 'hajidalakhtar@gmail.com',
            'password' => bcrypt('12345678'),
        ]);


        Karyawan::create([
            'nama' => 'John Doe',
            'email' => 'johndoe@example.com',
            'telepon' => '1234567890',
            'jabatan' => 'Manager',
            'divisi' => 'Marketing',
            'alamat' => '123 Main St, Anytown, USA',
        ]);

        Karyawan::create([
            'nama' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'telepon' => '0987654321',
            'jabatan' => 'Supervisor',
            'divisi' => 'Sales',
            'alamat' => '456 Elm St, Othertown, USA',
        ]);

        DB::table('projects')->insert([
            [
                'nama' => 'Projek Membangun IKN',
                'deskripsi' => 'Deskripsi Projek Membangun IKN',
                'tanggal_mulai' => '2024-02-20',
                'tanggal_selesai' => '2024-12-21',
                'document_spk_owner' => 'spk_owner_1.pdf',
                'document_invoice_tagihan' => 'invoice_tagihan_1.pdf',
                'document_laporan_progress' => 'laporan_progress_1.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Projek Pembangunan Jembatan',
                'deskripsi' => 'Deskripsi Projek Pembangunan Jembatan',
                'tanggal_mulai' => '2024-03-01',
                'tanggal_selesai' => '2024-10-31',
                'document_spk_owner' => 'spk_owner_2.pdf',
                'document_invoice_tagihan' => 'invoice_tagihan_2.pdf',
                'document_laporan_progress' => 'laporan_progress_2.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Projek Renovasi Gedung',
                'deskripsi' => 'Deskripsi Projek Renovasi Gedung',
                'tanggal_mulai' => '2024-03-15',
                'tanggal_selesai' => '2024-09-30',
                'document_spk_owner' => 'spk_owner_3.pdf',
                'document_invoice_tagihan' => 'invoice_tagihan_3.pdf',
                'document_laporan_progress' => 'laporan_progress_3.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Projek Perluasan Bandara',
                'deskripsi' => 'Deskripsi Projek Perluasan Bandara',
                'tanggal_mulai' => '2024-04-10',
                'tanggal_selesai' => '2024-11-15',
                'document_spk_owner' => 'spk_owner_4.pdf',
                'document_invoice_tagihan' => 'invoice_tagihan_4.pdf',
                'document_laporan_progress' => 'laporan_progress_4.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Projek Pengembangan Jalan Tol',
                'deskripsi' => 'Deskripsi Projek Pengembangan Jalan Tol',
                'tanggal_mulai' => '2024-05-25',
                'tanggal_selesai' => '2024-12-31',
                'document_spk_owner' => 'spk_owner_5.pdf',
                'document_invoice_tagihan' => 'invoice_tagihan_5.pdf',
                'document_laporan_progress' => 'laporan_progress_5.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Projek Restorasi Kawasan Wisata',
                'deskripsi' => 'Deskripsi Projek Restorasi Kawasan Wisata',
                'tanggal_mulai' => '2024-06-15',
                'tanggal_selesai' => '2024-12-15',
                'document_spk_owner' => 'spk_owner_6.pdf',
                'document_invoice_tagihan' => 'invoice_tagihan_6.pdf',
                'document_laporan_progress' => 'laporan_progress_6.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
