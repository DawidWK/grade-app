<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'email', 'class']; 

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
