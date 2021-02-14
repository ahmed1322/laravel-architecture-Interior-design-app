<?php
namespace App\Services\Frontend\ModelAccessor;

use App\Models\Portfolio;

class PortfolioAccessor implements ModelAccessorInterface {

    public static function nextSiblings(object $portfolio)
    {
       return  $portfolio->find($portfolio->where( 'id' , '>', $portfolio->id )->min('id'));
    }

    public static function prevSiblings(object $portfolio)
    {
       return  $portfolio->find($portfolio->where( 'id' , '<', $portfolio->id )->max('id'));

    }

    public static function relatedByCategory( object $portfolio )
    {
        return Portfolio::where( 'category_id' , $portfolio->category->id )->whereNOTIn( 'id', [$portfolio->id] )->get();
    }

}
