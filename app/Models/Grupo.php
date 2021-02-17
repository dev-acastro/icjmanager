<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_grupo',
        'lider',
        'telefono',
        'email',
        'sector_id',
        'departamento',
        'municipio',
        'direccion'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sector_id' => 'integer',
    ];


    public function sector()
    {
        return $this->belongsTo(\App\Models\Sector::class);
    }


    public function reportes()
    {
        return $this->hasMany(\App\Models\Reporte::class);
    }
}
