<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
use Carbon\Carbon;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'code' => 'IT',
            'name' => 'Phòng IT2',
            'parent_id' => null,
            'order' => null,
            'area_id' => random_int(1, 2),
            'user_id' => 1,
            'description' => 'Xây dựng phần mềm DWT, quản lý, sửa lỗi, phát triển',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   
    }
}
