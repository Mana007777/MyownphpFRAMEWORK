<h1>Create an account</h1>
<?php

use app\Core\form\Form;

$form = Form::begin('', 'post') ?>
<?php 

$this->title = "Register";

?>  
<?php echo $form->field($model, 'firstname') ?>
<?php echo $form->field($model, 'lastname') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->password() ?>
<?php echo $form->field($model, 'confirm_password')->password() ?>
<?php Form::end() ?>
<button type="submit" class="btn btn-primary">Submit</button>