<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poppings extends Model
{
    use HasFactory;

    protected $table = 'poppings';
    protected $primaryKey = 'id';
    protected $fillable = ['flavor', 'description'];
}
