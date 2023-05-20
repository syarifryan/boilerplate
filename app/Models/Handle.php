<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handle extends Model
{
    use HasFactory;
    protected $table = "handles";
    protected $fillable = [
        "id",
        "rentang_1",
        "rentang_2",
        "penanganan",
    ];

}
