<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable=[
        'title',
        'pictures',
        'amount',
        'price',
        'description'
    ];
    use HasFactory;
}

