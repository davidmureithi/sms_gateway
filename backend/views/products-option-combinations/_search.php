<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SearchProductOptionCombinations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productoptioncombinations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ProductOptionCombinationId') ?>

    <?= $form->field($model, 'ProductId') ?>

    <?= $form->field($model, 'ProductOptionGroupMemberId1') ?>

    <?= $form->field($model, 'ProductOptionGroupMemberId2') ?>

    <?= $form->field($model, 'ProductOptionGroupMemberId3') ?>

    <?php // echo $form->field($model, 'ProductOptionGroupMemberId4') ?>

    <?php // echo $form->field($model, 'ProductOptionGroupMemberId5') ?>

    <?php // echo $form->field($model, 'Barcode') ?>

    <?php // echo $form->field($model, 'Price') ?>

    <?php // echo $form->field($model, 'PriceMarket') ?>

    <?php // echo $form->field($model, 'PriceSupplier') ?>

    <?php // echo $form->field($model, 'CampaignStock') ?>

    <?php // echo $form->field($model, 'ActualStock') ?>

    <?php // echo $form->field($model, 'StockWarningLevel') ?>

    <?php // echo $form->field($model, 'StockUnitId') ?>

    <?php // echo $form->field($model, 'Comment') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'LastUpdatedBy') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
