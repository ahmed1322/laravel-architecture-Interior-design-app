<?php

namespace App\Models;

use App\Traits\Dashboard\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Dashboard\PaginationTrait;
use App\Services\Dashboard\SearchServices;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use SearchTrait,PaginationTrait, HasFactory;

    public $search_services;

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
