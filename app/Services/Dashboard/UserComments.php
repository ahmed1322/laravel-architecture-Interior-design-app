<?php

namespace App\Services\Dashboard;

class UserComments{

    public function userPostsComments()
    {
        $user_posts_comments = [];

        foreach( auth()->user()->posts as $post ):
            $user_posts_comments['comment_data_'.$post->id] =
            [
                'post_title' => $post->title,
                'post_id' => $post->id,
                'comments_count' => $post->comments->count()
            ];
        endforeach;
        return $user_posts_comments;
    }

}
