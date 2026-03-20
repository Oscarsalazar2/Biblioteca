<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    //
    protected $table = 'prestamos';

    protected $fillable = [
        'libro_id',
        'usuario_id',
        'estado',
        'fecha_prestamo',
        'fecha_devolucion',
    ];

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
