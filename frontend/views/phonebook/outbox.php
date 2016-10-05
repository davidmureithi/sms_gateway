<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ContactOneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sent Messages';
?>
<div class="contact-one-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'message',
            'contact',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>
