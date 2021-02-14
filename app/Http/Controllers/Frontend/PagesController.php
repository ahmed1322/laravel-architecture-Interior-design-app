<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __invoke($page)
    {
        return view( 'frontend.' . $page, [ 'meta_title' => $page ] );
    }
}
