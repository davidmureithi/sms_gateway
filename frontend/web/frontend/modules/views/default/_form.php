<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'UserTypeId')->textInput() ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Names')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PreferredName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Birthday')->textInput() ?>

    <?= $form->field($model, 'Website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FacebookId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TwitterId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IsLikedFanPage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PhotoUrl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IsPersonal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdentityNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TaxNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TaxOffice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'role')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'lastLogin')->textInput() ?>

    <?= $form->field($model, 'previousLogin')->textInput() ?>

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
