<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Productoptioncombinations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productoptioncombinations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ProductId')->textInput() ?>

    <?= $form->field($model, 'ProductOptionGroupMemberId1')->textInput() ?>

    <?= $form->field($model, 'ProductOptionGroupMemberId2')->textInput() ?>

    <?= $form->field($model, 'ProductOptionGroupMemberId3')->textInput() ?>

    <?= $form->field($model, 'ProductOptionGroupMemberId4')->textInput() ?>

    <?= $form->field($model, 'ProductOptionGroupMemberId5')->textInput() ?>

    <?= $form->field($model, 'Barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PriceMarket')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PriceSupplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CampaignStock')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ActualStock')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StockWarningLevel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StockUnitId')->textInput() ?>

    <?= $form->field($model, 'Comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'LastUpdatedBy')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
