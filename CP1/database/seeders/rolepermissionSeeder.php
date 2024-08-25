<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class rolepermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // UNTUK PERMISSION ADMIN
        Permission::create([
            'name' => 'tambah-users'
        ]);
        Permission::create([
            'name' => 'edit-users'
        ]);
        Permission::create([
            'name' => 'hapus-users'
        ]);
        Permission::create([
            'name' => 'lihat-users'
        ]);

        // UNTUK PERMISSION USERS
        Permission::create([
            'name' => 'tambah-gambar'
        ]);
        Permission::create([
            'name' => 'edit-gambar'
        ]);
        Permission::create([
            'name' => 'hapus-gambar'
        ]);
        Permission::create([
            'name' => 'lihat-gambar'
        ]);

        // UNTUK ROLE
        Role::create([
            'name' => 'superadmin'
        ]);
        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'pengguna'
        ]);

        // permission untuk super admin
        $roleSuper = Role::findByName('superadmin');
        $roleSuper->givePermissionTo('tambah-users');
        $roleSuper->givePermissionTo('edit-users');
        $roleSuper->givePermissionTo('hapus-users');
        $roleSuper->givePermissionTo('lihat-users');

        // permission untuk admin
        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-gambar');
        $roleAdmin->givePermissionTo('edit-gambar');
        $roleAdmin->givePermissionTo('hapus-gambar');
        $roleAdmin->givePermissionTo('lihat-gambar');

        // permission untuk pengguna
        $rolePengguna = Role::findByName('pengguna');
        $rolePengguna->givePermissionTo('lihat-gambar');
    }
}
