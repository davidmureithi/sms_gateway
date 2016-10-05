<?php
/* @var $this yii\web\View */

use backend\assets\IndexAsset;
use yii\helpers\Html;

$this->title = 'Enter You Message';

IndexAsset::register($this);
?>

<h3><?= Html::encode($this->title)?></h3>

<textarea><?= Html::encode(['input' => 'text']) ?></textarea>

<p> <?= Html::a('Spotpata', ['Create'], ['class' => 'btn btn-success'])?></p>

