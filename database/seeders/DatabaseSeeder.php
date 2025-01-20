<?php

namespace Database\Seeders;

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

        User::create([
            'name' => 'Site Manager',
            'email' => 'sitemanager@kkp.com',
            'password' => bcrypt('12345678'),
            'jabatan' => 'Manager',
            'divisi' => 'Site Management',
            'alamat' => '123 Site St, City, Country',
            'telepon' => '1234567890',
            'role' => 'SITE_MANAGER',
        ]);

        User::create([
            'name' => 'Admin Project',
            'email' => 'adminproject@kkp.com',
            'password' => bcrypt('12345678'),
            'jabatan' => 'Admin',
            'divisi' => 'Project Management',
            'alamat' => '456 Project Rd, City, Country',
            'telepon' => '0987654321',
            'role' => 'ADMIN_PROJECT',
        ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@kkp.com',
            'password' => bcrypt('12345678'),
            'jabatan' => 'Administrator',
            'divisi' => 'Administration',
            'alamat' => '789 Admin Ave, City, Country',
            'telepon' => '1122334455',
            'role' => 'SUPER_ADMIN',
        ]);

        User::create([
            'name' => 'Manager Project',
            'email' => 'managerproject@kkp.com',
            'password' => bcrypt('12345678'),
            'jabatan' => 'Manager',
            'divisi' => 'Project Management',
            'alamat' => '321 Manager Blvd, City, Country',
            'telepon' => '6677889900',
            'role' => 'MANAGER_PROJECT',
        ]);

        User::create([
            'name' => 'Logistik',
            'email' => 'logistik@kkp.com',
            'password' => bcrypt('12345678'),
            'jabatan' => 'Logistics',
            'divisi' => 'Logistics',
            'alamat' => '654 Logistics Ln, City, Country',
            'telepon' => '4455667788',
            'role' => 'LOGISTIK',
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
