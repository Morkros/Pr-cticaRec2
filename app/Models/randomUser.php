<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class randomUser extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "location",
        "gender"
    ];
}
