<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Productoptioncombinations */

$this->title = 'Update Productoptioncombinations: ' . $model->ProductOptionCombinationId;
$this->params['breadcrumbs'][] = ['label' => 'Productoptioncombinations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ProductOptionCombinationId, 'url' => ['view', 'id' => $model->ProductOptionCombinationId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productoptioncombinations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
