<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $kategori
 * @property Post[] $posts
 */
class Kategori extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['kategori'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post', 'id_kategori');
    }
}
