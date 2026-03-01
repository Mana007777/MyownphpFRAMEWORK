<?php

namespace app\Core\Form;
abstract class BaseField
{
    abstract public function renderInput():string;
}