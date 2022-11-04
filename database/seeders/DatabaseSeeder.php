<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Keterangan;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'id_status' => '1',
            'status' => 'Diterima'
        ]);

        Status::create([
            'id_status' => '2',
            'status' => 'Menunggu'
        ]);

        Status::create([
            'id_status' => '3',
            'status' => 'Ditolak'
        ]);

        Role::create([
            'roles_id' => '1',
            'nama_role' => 'Ortu'
        ]);

        Role::create([
            'roles_id' => '2',
            'nama_role' => 'Siswa'
        ]);

        Role::create([
            'roles_id' => '99',
            'nama_role' => 'Admin'
        ]);

        Keterangan::create([
            'id_keterangan' => '1',
            'keterangan' => 'Hadir'
        ]);

        Keterangan::create([
            'id_keterangan' => '2',
            'keterangan' => 'Terlambat'
        ]);

        Keterangan::create([
            'id_keterangan' => '3',
            'keterangan' => 'Tidak Hadir'
        ]);
    }
}
