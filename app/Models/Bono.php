<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bono extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_bono';
    protected $table = 'bonos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'Tipo_bono',
        'Descripcion',
        'Valor',
        'Fecha',

    ];
}
