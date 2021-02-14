<?php
namespace App\Services\Dashboard\ModelActions;

use Illuminate\Support\Facades\Storage;

abstract class AbstractModelActions {

    protected $dir;
    protected $data;
    protected $file;
    protected $model;
    protected $has_file;
    protected $key_name;
    protected $file_to_delete;

    /**
     * Set Model Instance to Update
     *
     */
    public function setModel(object $model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Set Form Validated data
     *
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Set Slug
     *
     */
    public function setSlug(string $slug)
    {
        $this->data['slug'] = $slug;

        return $this;
    }

    /**
     * appended additional data
     *
     */
    public function setAppendToData(array $appended_data)
    {
        $this->data = array_merge( $this->data , $appended_data);

        return $this;
    }

    /**
     * Set If Form has file to store
     *
     */
    public function setHas_file(bool $hasFile)
    {
        $this->has_file = $hasFile;

        return $this;
    }

    /**
     * Set File instance
     *
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Set Directory to Store File in
     *
     */
    public function setDir(string $dir)
    {
        $this->dir = $dir;

        return $this;
    }

    /**
     * Set array key name
     *
     */
    public function setFileToDelete($file_to_delete = null )
    {
        $this->file_to_delete = $file_to_delete;

        return $this;
    }

     /**
     * Set array key name
     *
     */
    public function setKeyName(string $key_name = 'image')
    {
        $this->key_name = $key_name;

        return $this;
    }

    /**
     * delete the file
     *
    */
    public function deleteFile()
    {
        // Delete old File
        Storage::delete( ! $this->file_to_delete ? $this->model->image :  $this->file_to_delete );

        return $this;
    }


    /**
     * save the file
     *
    */
    public function saveFile()
    {
        if( $this->has_file ):

            // Delete old File
            $this->deleteFile();

            // Store File
            $this->data[$this->key_name] = $this->file->store($this->dir);

        endif;

        return $this;
    }

    /**
     * Flash success msg
     *
     */
    public function flashSuccessMsg(string $msg)
    {
        session()->flash('success_msg', $msg );
    }

}
