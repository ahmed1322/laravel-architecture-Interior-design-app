<?php

namespace App\Models;
use App\Scopes\DescScope;
use Illuminate\Database\Eloquent\Model;
use App\Services\Dashboard\SearchServices;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment','post_id','user_id'
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new DescScope);
    }

    public static function authorPostCommentsSearch($searchServices , $posts)
    {
        return $searchServices
                ->setRelationalModel($posts)
                ->setSearchable('title')
                ->setSearch_key(request()->query('search'))
                ->search();
    }

    public static function authorCommentsSearch($searchServices , $posts)
    {
        return $searchServices
                ->setRelationalModel($posts)
                ->setSearchable('comment')
                ->setSearch_key(request()->query('search'))
                ->search();
    }

    /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the replies for the blog post comment.
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
