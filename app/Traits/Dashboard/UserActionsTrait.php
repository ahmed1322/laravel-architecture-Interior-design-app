<?php

namespace App\Traits\Dashboard;

trait UserActionsTrait {

    public function authAuthorPosts($data){

        $this->model = auth()->user()->posts()->create($data);

        return $this;
    }

}
