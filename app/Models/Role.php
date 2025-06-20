<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    
}
