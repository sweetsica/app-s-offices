<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('code')->nullable();
            $table->bigInteger('position_id')->nullable()->comment('id vị trí');
            $table->bigInteger('department_id')->nullable()->comment('id phòng ban');
            $table->tinyInteger('status')->nullable()->comment('0:đang làm việc, 1:Ngừng làm việc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
