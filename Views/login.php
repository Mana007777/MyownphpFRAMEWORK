<h1>Login to your account</h1>
<?php

use app\Core\form\Form;

$form = Form::begin('', 'post') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->password() ?>

<?php Form::end() ?>
<button type="submit" class="btn btn-primary">Submit</button>