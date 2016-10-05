<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Contact Form';

?>

<h1><?= Html::encode($this->title) ?></h1>
<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

<div class="row">
   <div class="col-lg-5">
       <div class="panel panel-default">
           <div class="panel-heading">Message Sent</div>
           <div class="panel-body">
               <p><b>Name:</b> <?=$model->name?> </p>
               <p><b>Email:</b> <?=$model->email?> </p>
               <p><b>Message:</b> <?=$model->message?> </p>
           </div>
       </div>
       <div class="alert alert-success">
           Thank you for contacting us. We will respond to you as soon as possible.
       </div>
   </div>
</div>
   <?php else: ?>
<div class="row">
           <div class="col-lg-5">
               <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                   <?= $form->field($model, 'name') ?>
                   <?= $form->field($model, 'email') ?>
                   <?= $form->field($model, 'message')->textArea(['rows' => 6]) ?>
                  <div class="form-group">
                       <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                   </div>
               <?php ActiveForm::end(); ?>
           </div>
       </div>
<?php endif; ?>