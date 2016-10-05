<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'UserTypeId',
            'username',
            'auth_key',
            'password_hash',
            // 'password_reset_token',
            // 'email:email',
            // 'Names',
            // 'PreferredName',
            // 'Surname',
            // 'Gender',
            // 'Birthday',
            // 'Website',
            // 'FacebookId',
            // 'TwitterId',
            // 'IsLikedFanPage',
            // 'PhotoUrl:url',
            // 'IsPersonal',
            // 'IdentityNumber',
            // 'TaxNumber',
            // 'TaxOffice',
            // 'Comment:ntext',
            // 'role',
            // 'status',
            // 'lastLogin',
            // 'previousLogin',
            // 'created_by',
            // 'LastUpdatedBy',
            // 'created_at',
            // 'updated_at',
            // 'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
