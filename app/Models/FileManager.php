<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileManager extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'file_manager';

    public $timestamps = true;

    protected $guarded = [];
}
