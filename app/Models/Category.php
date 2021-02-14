<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'visible',
        'slug'
    ];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    /**
     * Get the Posts for the category
     */
    public function posts()
    {
        return $this->hasMany(Post::class,'category_id');
    }

    /**
     * Get the Posts for the category
     */
    public function sliders()
    {
        return $this->hasMany(\App\Models\Site\Slider::class);
    }

    /**
     * Get the Posts for the category
     */
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}
