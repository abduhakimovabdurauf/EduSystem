<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
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
