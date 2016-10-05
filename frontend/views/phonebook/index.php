<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ContactOneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contact Ones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-one-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Contact', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Send Message', ['send'], ['class' => 'btn btn-success']) ?>
    </p>
    
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'note',
            'contact',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>
