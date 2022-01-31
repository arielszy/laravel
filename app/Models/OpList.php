<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpList extends Model
{
    use HasFactory;
    protected $table = 'op_list';
    protected $primaryKey = 'id';
    protected $attributes = [ 
        'Puntos' => '0',
        'Importe' => '0' 
    ]; 
}
