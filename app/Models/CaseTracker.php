<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseTracker extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'count_per_day'
    ];

    public $timrstamp = true;
}
