<h1>Create an account</h1>
<?php

use app\Core\form\Form;

 echo Form::begin('', 'post') ?>

  <?php echo $form->field($model, 'firstname') ?>
  <?php echo $form->field($model, 'lastname') ?>
  <?php echo $form->field($model, 'email') ?>
  <?php echo $form->field($model, 'password') ?>
  <?php echo $form->field($model, 'confirm_password') ?>
 <?php \app\Core\form\Form::end() ?>
<button type="submit" class="btn btn-primary">Submit</button>

<!-- <form method="post" action="">
  <div class="mb-3">
    <label class="form-label">Firstname</label>
    <input type="text" class="form-control" name="firstname">
  </div>
  <div class="mb-3">
    <label class="form-label">Lastname</label>
    <input type="text" class="form-control" name="lastname">
  </div>
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email">
    <div class="invalid-feedback">
      
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="mb-3">
    <label class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="confirm_password">
  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->