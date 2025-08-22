<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function penalties()
    {
        return $this->hasMany(Penalty::class);
    }

    protected $guarded = [];
}
