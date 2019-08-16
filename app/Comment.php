<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_post
 * @property int $id_user
 * @property string $komen
 * @property Post $post
 * @property User $user
 */
class Comment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id_post', 'id_user', 'komen'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public static function createComment($id_post, $id_user, $komen)
    {
        $komen = Comment::create([
            'id_post' => $id_post,
            'id_user' => $id_user,
            'komen' => $komen
        ]);
        return $komen;
    }

    public function post()
    {
        return $this->belongsTo('App\Post', 'id_post');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
