<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;
use Carbon\Carbon;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create([
            'code' => 'FE',
            'name' => 'Nhân viên Dev FE',
            'parent_id' => null,
            'department_id' => 1,
            'position_level' => random_int(1, 12),
            'description' => 'Thiết kế giao diện, sửa giao diện, viết logic, làm việc với resful api',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   
    }
}
