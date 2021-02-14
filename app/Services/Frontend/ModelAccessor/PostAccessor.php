<?php
namespace App\Services\Frontend\ModelAccessor;

use App\Models\Post;

class PostAccessor implements ModelAccessorInterface {

    public static function nextSiblings(object $post)
    {
       return  $post->find($post->where( 'id' , '>', $post->id )->min('id'));
    }

    public static function prevSiblings(object $post)
    {
       return  $post->find($post->where( 'id' , '<', $post->id )->max('id'));

    }

    public static function relatedByCategory( object $post )
    {
        return Post::where( 'category_id' , $post->category->id )->whereNOTIn( 'id', [$post->id] )->get();
    }

}
