<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends BaseModel
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

    public function reguler_user_role_id()
    {
        return $this->where( 'name' , 'reguler_user' )->value('id');
    }
}
