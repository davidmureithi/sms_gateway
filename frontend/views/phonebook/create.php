<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ContactOne */

$this->title = 'Create Contact One';
$this->params['breadcrumbs'][] = ['label' => 'Contact Ones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-one-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
