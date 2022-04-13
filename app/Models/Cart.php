<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $fillable=[
        'name',
        'email',
        'title',
        'price',
        'amount'
    ];
    use HasFactory;
}
