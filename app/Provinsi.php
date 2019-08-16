<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $provinsi
 * @property Kota[] $kotas
 */
class Provinsi extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['provinsi'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kotas()
    {
        return $this->hasMany('App\Kota', 'id_prov');
    }
}
