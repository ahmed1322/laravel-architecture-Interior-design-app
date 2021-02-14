<?php
namespace App\Services\Dashboard\ModelActions;
use Illuminate\Support\Facades\Storage;
use App\Services\Dashboard\ModelActions\AbstractModelActions;

class UpdateTable extends AbstractModelActions {

    /**
     * update the instance
     *
     */
    public function update()
    {
        $this->model->update($this->data);

        return $this;
    }


}
