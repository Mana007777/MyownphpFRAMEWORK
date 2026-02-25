<?php

namespace app\Core\form;

use app\Core\Model;

class Field{

  public const TYPE_TEXT = "text";
  public const TYPE_TEXTAREA = "textarea";
  public const TYPE_RADIO = "radio";
  public const TYPE_CHECKBOX = "checkbox";
  public const PASSWORD = "password";

   public string $type;
   public Model $model;
   public string $attribute;


   public function __construct(Model $model, string $attribute){
    $this->type = self::TYPE_TEXT;
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
     $this->type,
     $this->model->{$this->attribute},
     $this->model->hasError($this->attribute) ? ' is-invalid' : '',
     $this->model->getFirstErrors($this->attribute));



   }


   public function password(){
    return $this->type = self::PASSWORD;
    return $this; 
   }
}