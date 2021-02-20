<?php

namespace App\Services\Dashboard;


class SearchServices {

    public $search_key;
    public $searchable;
    public $model;

    /**
     * Set the value of search_key
     *
     * @return  self
     */
    public function setSearch_key($search_key)
    {
        $this->search_key = $search_key;

        return $this;
    }

    /**
     * Set the value of searchable
     *
     * @return  self
     */
    public function setSearchable($searchable)
    {
        $this->searchable = $searchable;

        return $this;
    }

    /**
     * Set the value of model
     *
     * @return  self
     */
    public function setModel($model)
    {
        if( is_object($model) ){

            $this->useObject( $model );

        }elseif( is_string($model) ){

           $this->initObject( $model );

        }

        return $this;
    }

    public function initObject( string $object_name )
    {
        $this->model = new $object_name;
    }

    public function useObject( object $object )
    {
        $this->model = $object;
    }

    /**
     * Set the value of model
     *
     * @return  self
     */
    public function setRelationalModel($model)
    {
        $this->model = $model;
        return $this;
    }

    public function search()
    {
        return $this->model->where( $this->searchable , 'LIKE', "%$this->search_key%" );
    }
}
