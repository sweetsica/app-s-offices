<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    public $timestamps = true;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //    public function children()
    // {
    //     return $this->hasMany(Department::class, 'parent_id', 'id');
    // }

    // public function allDescendants()
    // {
    //     return $this->children()->with('allDescendants');
    // }
    public function daddy()
    {
        return $this->belongsTo(Department::class, 'parent_id');
    }


    public function children()
    {
        return $this->hasMany(Department::class, 'parent_id', 'id');
    }

    // public function descendants()
    // {
    //     return $this->children()->with('descendants');
    // }

    public function getAllDescendantIds()
    {
        $descendantIds = [$this->id];

        foreach ($this->children as $child) {
            $descendantIds = array_merge($descendantIds, $child->getAllDescendantIds());
        }

        return $descendantIds;
    }

    // public static function getDescendants($parentId)
    // {
    //     return self::with('descendants')->find($parentId);
    // }
}
