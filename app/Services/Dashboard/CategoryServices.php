<?php

namespace App\Services\Dashboard;

use App\Models\Category;

class CategoryServices {

    private $category_count;
    private $msg;

    public function ifNoCategoryFound(){

        // No Category Found
        $this->category_count = Category::count() ?? false;
        return $this;
    }

    public function flashErrorMsg( $msg )
    {

        if ( ! $this->category_count ) session()->flash('error_msg', $msg );

        return $this;
    }

    public function redirectToRoute($route){
        if ( ! $this->category_count ) redirect(route($route));
    }



}
