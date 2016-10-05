<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Productoptioncombinations */

$this->title = $model->ProductOptionCombinationId;
$this->params['breadcrumbs'][] = ['label' => 'Productoptioncombinations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productoptioncombinations-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ProductOptionCombinationId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ProductOptionCombinationId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ProductOptionCombinationId',
            'ProductId',
            'ProductOptionGroupMemberId1',
            'ProductOptionGroupMemberId2',
            'ProductOptionGroupMemberId3',
            'ProductOptionGroupMemberId4',
            'ProductOptionGroupMemberId5',
            'Barcode',
            'Price',
            'PriceMarket',
            'PriceSupplier',
            'CampaignStock',
            'ActualStock',
            'StockWarningLevel',
            'StockUnitId',
            'Comment:ntext',
            'created_by',
            'LastUpdatedBy',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
