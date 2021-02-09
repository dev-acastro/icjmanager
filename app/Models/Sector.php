<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_sector',
        'supervisor',
        'telefono',
        'email',
        'area_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'area_id' => 'integer',
    ];


    public function grupos()
    {
        return $this->hasMany(\App\Models\Grupo::class);
    }


    public function area()
    {
        return $this->belongsTo(\App\Models\Area::class);
    }
}
