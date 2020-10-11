<?php

namespace App\Editor;

use Illuminate\Database\Eloquent\Model;

abstract class Editor {
    protected $model = null;
    protected $data = null;

    /**
     * Open an editor for creating or updating
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return \App\Editor\Editor
     */
    public static function open(Model $model = null) {
        $class = get_called_class();
        $editor = new $class;
        $editor->model = $model;

        return $editor;
    }

    public abstract function save();

    public function setData($data) {
        $this->data = $data;
    }

    public function saveWithData($data) {
        $this->setData($data);
        
        if($this->data != null) {
            $this->save();
        }
    }
}