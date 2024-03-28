<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Phân quyền nhân sự
        Permission::create(['name' => 'Xem nhân sự'])->assignRole('admin');
        Permission::create(['name' => 'Thêm nhân sự'])->assignRole('admin');
        Permission::create(['name' => 'Sửa  nhân sự'])->assignRole('admin');
        Permission::create(['name' => 'Xóa nhân sự'])->assignRole('admin');
        //Phân quyền phòng ban
        Permission::create(['name' => 'Xem phòng ban'])->assignRole('admin');
        Permission::create(['name' => 'Thêm phòng ban'])->assignRole('admin');
        Permission::create(['name' => 'Sửa  phòng ban'])->assignRole('admin');
        Permission::create(['name' => 'Xóa phòng ban'])->assignRole('admin');
         //Phân quyền vị trí
        Permission::create(['name' => 'Xem vị trí'])->assignRole('admin');
        Permission::create(['name' => 'Thêm vị trí'])->assignRole('admin');
        Permission::create(['name' => 'Sửa vị trí'])->assignRole('admin');
        Permission::create(['name' => 'Xóa vị trí'])->assignRole('admin');
        //Phân quyền role
        Permission::create(['name' => 'Xem role'])->assignRole('admin');
        Permission::create(['name' => 'Thêm role'])->assignRole('admin');
        Permission::create(['name' => 'Sửa role'])->assignRole('admin');
        Permission::create(['name' => 'Xóa role'])->assignRole('admin');
        //Phân quyền permission
        Permission::create(['name' => 'Xem permission'])->assignRole('admin');
        Permission::create(['name' => 'Thêm permission'])->assignRole('admin');
        Permission::create(['name' => 'Sửa permission'])->assignRole('admin');
        Permission::create(['name' => 'Xóa permission'])->assignRole('admin');
        //Phân quyền
        Permission::create(['name' => 'Xem quyền'])->assignRole('admin');
        Permission::create(['name' => 'Phân quyền'])->assignRole('admin');
        //Phân quyền file mannager
        Permission::create(['name' => 'Xem danh sách tài liệu'])->assignRole('admin');
        Permission::create(['name' => 'Thêm folder'])->assignRole('admin');
        Permission::create(['name' => 'Thêm file'])->assignRole('admin');
        Permission::create(['name' => 'Xóa tài liệu'])->assignRole('admin');

        // Permission::create(['name' => 'Xem '])->assignRole('admin');
        // Permission::create(['name' => 'Thêm '])->assignRole('admin');
        // Permission::create(['name' => 'Sửa  '])->assignRole('admin');
        // Permission::create(['name' => 'Xóa '])->assignRole('admin');

    }
}
