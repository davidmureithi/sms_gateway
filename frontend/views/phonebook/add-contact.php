<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model frontend\models\ContactOne */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-one-form">
   
    <?php if (Yii::$app->session->hasFlash('success')): ?>
      <div class="alert alert-success alert-dismissable">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <h4><i class="icon fa fa-check"></i>Saved!</h4>
          <?= Yii::$app->session->getFlash('success') ?>
      </div>
    <?php endif; ?>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

     <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Add Contact' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>