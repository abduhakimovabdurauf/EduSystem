<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
