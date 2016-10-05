<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ContactOne */

$this->title ='My Phone Book';
?>
<div class="contact-one-view">

     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'contact',
            'email:email',
            'note',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
