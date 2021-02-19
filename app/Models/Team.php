<?php

namespace App\Models;

use App\Scopes\DescScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    // Dir to save Team Members Image
    const TEAM_DIR_PATH = 'site/team';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'role',
        'image',
        'social_media',
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

    public static function TeamSearch($searchServices)
    {
        return $searchServices
                ->setModel(\App\Models\Team::class)
                ->setSearchable('name')
                ->setSearch_key(request()->query('search'))
                ->search();
    }
}
