<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commands extends Model
{
    use HasFactory;

    protected $table = 'commands';
    protected $primaryKey = 'id';
    protected $fillable = ['command_number', 'total_price', 'etat'];
}
