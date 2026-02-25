<?php

namespace app\Core;

abstract class Model
{
    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if(property_exists($this, $key)){
                $this->{$key} = $value;
            }
        }
        
    }

    public function validate(){}
} 