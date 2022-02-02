<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    use HasFactory;
    protected $table = 'prizes';
    protected $primaryKey = 'id';
    protected $attributes = [ 
        'Valor' => 0,
        'Descripcion' => '' 
    ]; 
}
