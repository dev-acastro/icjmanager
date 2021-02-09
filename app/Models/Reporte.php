<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'grupo_id',
        'codigo_grupo',
        'asistencia_adultos',
        'invitados_inconversos',
        'conversiones',
        'integrados_ccdl',
        'integrados_biblico',
        'fecha',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'grupo_id' => 'integer',
        'fecha' => 'date',
    ];


    public function grupo()
    {
        return $this->belongsTo(\App\Models\Grupo::class);
    }


}
