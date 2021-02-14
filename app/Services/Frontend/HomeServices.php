<?php
namespace App\Services\Frontend;

class HomeServices
{

    public static function getPortfoliosCategories($portfolios)
    {
        $portfolios_categories = [];

        foreach ($portfolios as $portfolio):
            if (!in_array($portfolio->category->name, $portfolios_categories)):
                $portfolios_categories[$portfolio->category->id] = $portfolio->category->name;
            endif;
        endforeach;

        return $portfolios_categories;
    }

}
