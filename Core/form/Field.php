<?php

namespace app\Core\form;

use app\Core\Model;

class Field{

   public Model $model;
   public string $attribute;


   public function __construct(Model $model, string $attribute){
    $this->model = $model;
    $this->attribute = $attribute;
   }

   public function __toString()
   {
     return sprintf('
       <div class="mb-3">
    <label class="form-label">%s</label>
    <input type="text" class="form-control" name="%s">
    <div class="invalid-feedback">
      %s
    </div>
     ', $this->attribute, 
     $this->attribute,
     $this->model->{$this->attribute},
     $this->model->hasError($this->attribute) ? ' is-invalid' : '',
     $this->model->getFirstErrors($this->attribute));
   }
}