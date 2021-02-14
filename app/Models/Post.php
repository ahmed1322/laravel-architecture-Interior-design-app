<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'tag_id',
        'slug'
    ];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }


    /**
     * Get the Posts for the category
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'posts_tags');
    }

    public function getTags()
    {
        return implode( ' , ', $this->tags()->pluck('name')->toArray() ) ;
    }

    /**
     * Get the Posts for the category
     */
    public function hasTag($tag_id)
    {
        return in_array( $tag_id, $this->tags->pluck('id')->toArray() );

    }

    /**
     * Get the category that owns the post.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the category that owns the post.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the replies for the blog post.
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
