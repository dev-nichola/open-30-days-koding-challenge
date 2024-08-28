<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title','goal','task'
    ];

    public function assignment() {
        return $this->hasMany(Assignment::class, 'task_id','id');
    }
}
