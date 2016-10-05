<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'My First API';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Ndekere David</h1>

        <p class="lead">This is my first API.</p>

        <p>
                <?= Html::a('Post Data', ['api/create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('View One id', ['api/view/?id=1'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('View All', ['api/apiget'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Patch id', ['api/patch'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Delete id', ['api/delete'], ['class' => 'btn btn-success']) ?>
        </p>

    </div>

    <div class="body-content">
        <center>
            We can Post, Get, Put, Patch, Delete Data - in Json Format.
        </center>
    </div>
</div>
