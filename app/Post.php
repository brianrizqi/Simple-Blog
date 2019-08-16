<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property int $id_user
 * @property int $id_kategori
 * @property string $judul
 * @property string $artikel
 * @property string $tanggal
 * @property string $tag1
 * @property string $tag2
 * @property string $tag3
 * @property string $img
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property User $user
 * @property Kategori $kategori
 * @property Comment[] $comments
 */
class Post extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['id', 'id_user', 'id_kategori', 'judul', 'artikel', 'tanggal', 'tag1', 'tag2', 'tag3', 'img', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public static function createPost($id, $id_user, $id_kategori, $judul, $artikel, $tanggal,
                                      $tag1, $tag2, $tag3, $img)
    {
        $post = Post::create([
            'id' => $id,
            'id_user' => $id_user,
            'id_kategori' => $id_kategori,
            'judul' => $judul,
            'artikel' => $artikel,
            'tanggal' => $tanggal,
            'tag1' => $tag1,
            'tag2' => $tag2,
            'tag3' => $tag3,
            'img' => $img
        ]);
        return $post;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'id_kategori');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'id_post');
    }
}
