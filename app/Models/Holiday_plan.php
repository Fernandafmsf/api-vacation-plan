<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday_plan extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        'title',
        'description',
        'date',
        'location'
    ];
}
