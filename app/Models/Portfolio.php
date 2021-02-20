<?php

namespace App\Models;

use App\Scopes\DescScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends BaseModel
{
    use HasFactory;

    // Dir to save Portfolio Image
    const PORTFOLIO_DIR_PATH = 'site/portfolio';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'image',
        'link',
        'created_at',
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


    public static function PortfolioSearch($searchServices)
    {
        return $searchServices
                ->setModel(\App\Models\Portfolio::class)
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
    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }
}
