<?php

namespace App\Models;
use App\Scopes\DescScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    // Dir to save Service Image in
    CONST SERVICE_DIR_PATH = 'site/service';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "title",
        "description",
        "excerpt",
        "icon",
        "image",
        "visible",
        'criteria',
        'slug'
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


    public static function ServiceSearch($searchServices)
    {
        return $searchServices
                ->setModel(\App\Models\Service::class)
                ->setSearchable('title')
                ->setSearch_key(request()->query('search'))
                ->search();
    }
}
