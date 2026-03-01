<?php

use app\Core\form\Form;

$this->title = "Contact";

?>  

<?php $form = Form::begin('','post') ?>
<?php echo $form->field($model,'subject') ?>
<?php echo $form->field($model,'email') ?>
<?php echo $form->field($model,'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>
