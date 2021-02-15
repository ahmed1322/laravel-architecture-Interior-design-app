<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        // Check User can View to posts
        if( ! $user->can_view_posts()  ) return false;

        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        if( ! array_key_exists( 'u' , $user->post_roles() ) ) return false;

        return $post->author->id !== $user->id ? false : true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // Check User can View to posts
        if( ! $user->can_create_posts()  ) return false;

        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        if( ! array_key_exists( 'u' , $user->post_roles() ) ) return false;

        return $post->author->id !== $user->id ? false : true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        if( ! array_key_exists( 'd' , $user->post_roles() ) ) return false;

        return $post->author->id !== $user->id ? false : true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        return $post->author->id !== $user->id ? false : true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        if( ! array_key_exists( 'd' , $user->post_roles() ) ) return false;

        return $post->author->id !== $user->id ? false : true;
    }
}
