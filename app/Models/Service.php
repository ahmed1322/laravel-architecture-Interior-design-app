<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, SoftDeletes;

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
        "visible",
        'criteria',
        'slug'
    ];
}
