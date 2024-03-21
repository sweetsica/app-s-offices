<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = 'positions';

    public $timestamps = true;

    protected $guarded = [];

    public function departement()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
