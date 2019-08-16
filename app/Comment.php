<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $id_post
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

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $timestamps = false;
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
