<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends BaseModel
{
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the Posts for the category
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_tags');
    }

}
