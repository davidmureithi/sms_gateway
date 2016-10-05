<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Productoptioncombinations */

$this->title = 'Create Productoptioncombinations';
$this->params['breadcrumbs'][] = ['label' => 'Productoptioncombinations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productoptioncombinations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
