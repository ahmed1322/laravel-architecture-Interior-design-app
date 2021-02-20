<?php

namespace App\Traits\Dashboard;
use App\Scopes\DescScope;
use App\Services\Dashboard\SearchServices;

trait SearchTrait {

    public static $searchServices;
    public static $model;

    public static function search($search_column_name, $model = NULL)
    {
        self::setSearchServices();

        return self::$searchServices
                ->setModel(self::setModel($model))
                ->setSearchable($search_column_name)
                ->setSearch_key(request()->query('search'))
                ->search();
    }

    /**
     * Set the value of model
     *
     * @return  self
     */
    public static function setModel($model)
    {
        return ! is_null($model) ? $model : '\App\\Models\\'. class_basename(static::class);
    }


    /**
     * Set the value of searchServices
     *
     * @return  self
     */
    public static function setSearchServices()
    {
        self::$searchServices = new SearchServices;
    }

}
