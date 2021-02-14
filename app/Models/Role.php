<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'post_roles',
        'category_roles',
        'tag_roles',
    ];

    /**
     * Get the users for the Role.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
