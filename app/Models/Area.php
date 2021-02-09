<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_area',
        'supervisor',
        'telefono',
        'email',
        'distrito_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'distrito_id' => 'integer',
    ];


    public function sectors()
    {
        return $this->hasMany(\App\Models\Sector::class);
    }


    public function distrito()
    {
        return $this->belongsTo(\App\Models\Distrito::class);
    }

}
