<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departement extends Model
{
    protected $fillable = ['name', 'description', 'status'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
