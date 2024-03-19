<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory;

    protected $table = 'verification';

    public $timestamps = false;

    protected $guarded = [];
    // protected $fillable = [
    //     'code',
    //      'time',
    //     'user_id',

    // ];
}
