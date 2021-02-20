<?php

namespace App\Models;
use App\Scopes\DescScope;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use App\Traits\Dashboard\SearchTrait;
use Illuminate\Notifications\Notifiable;
use App\Traits\Dashboard\PaginationTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use SearchTrait, PaginationTrait, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'status'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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

    /**
     * Get the phone associated with the user.
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get the comments for the blog post.
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    /**
     * Get the replies for the blog post.
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerifyUserEmail);
    }

    /**
     * Get the user role
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * Check is user admin
     */
    public function is_admin()
    {
        return $this->role->name === 'admin';
    }

    /**
     * Check is user admin
     */
    public function canAccessDashboard()
    {
        return $this->status === 1;
    }

    /**
     * Get the user role
     */
    public function current_role_id()
    {
        return $this->role_id;
    }

    /**
     * Get the user role id
     */
    public function has_role()
    {
        return $this->status;
    }

    /**
     * Get the user Post Permissions
     */
    public function role_name()
    {
        if ( $this->has_role()  ) return $this->role->name;
    }

    /**
     * Get the Post Permissions
     */
    public function post_roles()
    {
        return unserialize($this->role->post_roles);
    }

    public function has_post_roles()
    {
        return ! empty(unserialize($this->role->post_roles));
    }

    public function can_view_posts()
    {
        return array_key_exists( 'r', $this->post_roles());
    }

    public function can_create_posts()
    {
        return array_key_exists( 'c' , $this->post_roles() );
    }

    /**
     * Get the Category Permissions
     */
    public function category_roles()
    {
        return unserialize($this->role->category_roles);
    }

    public function has_category_roles()
    {
        return ! empty(unserialize($this->role->category_roles));
    }

    public function can_view_categories()
    {
        return array_key_exists( 'r', $this->category_roles() );
    }

    public function can_create_category()
    {
        return array_key_exists( 'c', $this->category_roles() );
    }

    /**
     * Get the tag Permissions
    */
    public function tag_roles()
    {
        return unserialize($this->role->tag_roles);
    }

    public function has_tag_roles()
    {
        return ! empty( unserialize($this->role->tag_roles) );
    }

    public function can_view_tags()
    {
        return array_key_exists( 'r', $this->tag_roles() );
    }

    public function can_create_tag()
    {
        return array_key_exists ( 'c' , $this->tag_roles() );
    }
}
