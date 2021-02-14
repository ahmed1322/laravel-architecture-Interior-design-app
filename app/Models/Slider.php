<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
