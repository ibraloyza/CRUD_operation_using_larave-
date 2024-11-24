<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    use HasFactory; 

    protected $table = 'items'; // Table-kaaga
    protected $fillable = ['name']; // Columns-ka aad u oggol tahay
}
