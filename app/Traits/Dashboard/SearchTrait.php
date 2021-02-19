<?php

namespace App\Traits\Dashboard;
use App\Scopes\DescScope;
use App\Services\Dashboard\SearchServices;

trait SearchTrait {

    public $searchServices;

    public function search($search_column_name)
    {
        $this->setSearchServices();

        return $this->searchServices
                ->setModel('\App\\Models\\'. class_basename($this))
                ->setSearchable($search_column_name)
                ->setSearch_key(request()->query('search'))
                ->search();
    }


    /**
     * Set the value of searchServices
     *
     * @return  self
     */
    public function setSearchServices()
    {
        $this->searchServices = new SearchServices;

        return $this;
    }

}
