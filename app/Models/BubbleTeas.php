<?php

namespace App\Models;

// use App\Models\BubbleTeas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BubbleTeas extends Model
{
    use HasFactory;
    
    protected $table = 'bubbleTeas';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'price', 'temperature', 'description', 'quantity', 'sugar_quantity', 'img'];
}
