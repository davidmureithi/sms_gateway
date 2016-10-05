<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ContactOne */

$this->title = 'Update Contact One: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Contact Ones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contact-one-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
