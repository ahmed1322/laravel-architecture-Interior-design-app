<?php

namespace App\Models;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

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

    // protected $is_admin;
    // protected $can_access_dashboard;

    // public function __construct()
    // {
    //     $this->is_admin = $this->status === 1  ? true : false;
    // }

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
     * Get the user role
     */
    public function Current_role_id()
    {
        return DB::table('roles')
            ->select('id')
            ->where('name' , 'reguler_user')->value('id');
    }

    /**
     * Get the user role id
     */
    public function has_role()
    {
        return $this->role_id !== -1;
    }

    /**
     * Get the user role id
     */
    public function role_id()
    {
        if( $this->has_role() ) return $this->role()->id;
    }

    /**
     * Get the user Post Permissions
     */
    public function post_roles()
    {
        return $this->has_role()  ? unserialize($this->role->post_roles) : false;
    }

    public function can_view_posts()
    {
        if ( $this->has_role()  ) return isset($this->post_roles()['r']);
    }

    public function can_create_posts()
    {
        if ( $this->has_role()  ) return isset($this->post_roles()['c']);
    }

    /**
     * Get the user Post Permissions
     */
    public function category_roles()
    {
        if ( $this->has_role()  ) return unserialize($this->role->category_roles);
    }

    /**
     * Get the user Post Permissions
     */
    public function tag_roles()
    {
        if ( $this->has_role()  ) return unserialize($this->role->tag_roles);
    }

    /**
     * Get the user Post Permissions
     */
    public function role_name()
    {
        if ( $this->has_role()  ) return $this->role->name;
    }

    /**
     * Check is user admin
     */
    public function is_admin()
    {
        return $this->status === 1;
    }
}
