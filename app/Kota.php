<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_prov
 * @property string $kota
 * @property Provinsi $provinsi
 * @property User[] $users
 */
class Kota extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id_prov', 'kota'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provinsi()
    {
        return $this->belongsTo('App\Provinsi', 'id_prov');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User', 'id_kota');
    }
}
