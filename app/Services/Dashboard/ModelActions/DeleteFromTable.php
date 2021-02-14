<?php
namespace App\Services\Dashboard\ModelActions;
use Illuminate\Support\Facades\Storage;
use App\Services\Dashboard\ModelActions\AbstractModelActions;

class DeleteFromTable extends AbstractModelActions {

    /**
     * Delete the instance
     *
     */
    public function delete()
    {
        $this->model->delete();

        return $this;
    }


}
