<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kommentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'score',
        'content'
    ];
}
