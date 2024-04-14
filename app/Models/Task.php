<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin',
        'case_number',
        'comment',
        'task_status',
        'date',
        'priority'
    ];
    public $timestamp = true;
}
