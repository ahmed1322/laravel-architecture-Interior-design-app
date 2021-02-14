<?php
namespace App\Services\Dashboard\ModelActions;

use App\Services\Dashboard\ModelActions\AbstractModelActions;

class StoreInTable extends AbstractModelActions {

    /**
     * save the file
     *
    */
    public function saveFile()
    {
        if( $this->has_file ):

            // Store File
            $file_path = $this->file->store($this->dir);

            $this->data[$this->key_name] = $file_path;

        endif;

        return $this;
    }

    /**
     * Create the instance
     *
     */
    public function create()
    {
        $this->model::create($this->data);

        return $this;
    }

}
