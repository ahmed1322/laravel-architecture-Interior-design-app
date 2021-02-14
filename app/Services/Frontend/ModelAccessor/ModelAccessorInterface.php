<?php
namespace App\Services\Frontend\ModelAccessor;

interface ModelAccessorInterface{

    public static function nextSiblings(object $model);

    public static function prevSiblings(object $model);

    public static function relatedByCategory( object $model );

}
