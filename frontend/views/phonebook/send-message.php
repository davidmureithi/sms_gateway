<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\Alert;
use yii\grid\GridView;
use frontend\models\ContactOne;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Msgqueue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-one-form">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
      <div class="alert alert-success alert-dismissable">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <h4><i class="icon fa fa-check"></i>Saved!</h4>
          <?= Yii::$app->session->getFlash('success') ?>
      </div>
      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sent_by',
            'contact',
            'note',
            'message',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php endif; ?>

    <?php $form = ActiveForm::begin(); ?>
      <div class="form-inline col-md-3">
        <?= $form->field($model, 'contact')->textInput() ?>
      </div>

       <div class="form-inline col-md-3">
        <?= $form->field($model, 'contact')->dropDownList(
            ArrayHelper::map(ContactOne::find()->all(),'contact','contact'),
            ['prompt'=>'Pick a Contact']
        )?>
      </div>

      <div class="col-md-4">
          <?= $form->field($model, 'note')->textArea(['maxlength' => true]) ?>
      </div>

      <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? 'Send Message' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
    <?php ActiveForm::end();?>
</div>