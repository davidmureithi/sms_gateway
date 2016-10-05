<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchProductOptionCombinations */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productoptioncombinations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productoptioncombinations-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Productoptioncombinations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ProductOptionCombinationId',
            'ProductId',
            'ProductOptionGroupMemberId1',
            'ProductOptionGroupMemberId2',
            'ProductOptionGroupMemberId3',
            // 'ProductOptionGroupMemberId4',
            // 'ProductOptionGroupMemberId5',
            // 'Barcode',
            // 'Price',
            // 'PriceMarket',
            // 'PriceSupplier',
            // 'CampaignStock',
            // 'ActualStock',
            // 'StockWarningLevel',
            // 'StockUnitId',
            // 'Comment:ntext',
            // 'created_by',
            // 'LastUpdatedBy',
            // 'created_at',
            // 'updated_at',
            // 'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
