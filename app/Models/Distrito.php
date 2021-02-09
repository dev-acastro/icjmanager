<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_distrito',
        'supervisor',
        'telefono',
        'email',
        'zona_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'zona_id' => 'integer',
    ];


    public function areas()
    {
        return $this->hasMany(\App\Models\Area::class);
    }


    public function zona()
    {
        return $this->belongsTo(\App\Models\Zona::class);
    }

}
