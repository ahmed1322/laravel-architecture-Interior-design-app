<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    // Dir to save App Image
    const SETTING_DIR_PATH = 'app';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'site_name' ,
        'site_email' ,
        'site_logo_dark' ,
        'site_logo_light' ,
        'site_phone' ,
        'site_location' ,
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
