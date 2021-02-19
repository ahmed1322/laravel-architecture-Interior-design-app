<?php

namespace App\Models;

use App\Scopes\DescScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;

    // Dir to save Slider Image
    const SLIDER_DIR_PATH = 'site/slider';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'portfolio_id',
        'visible',
        'image'
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

    public static function SliderSearch($searchServices)
    {
        return $searchServices
                ->setModel(\App\Models\Slider::class)
                ->setSearchable('title')
                ->setSearch_key(request()->query('search'))
                ->search();
    }


    /**
     * Get the post that owns the comment.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the post that owns the comment.
     */
    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
