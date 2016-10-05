<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Products;

/**
 * SerachProducts represents the model behind the search form about `common\models\Products`.
 */
class SerachProducts extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ProductId', 'ProductCategoryId', 'SupplierId', 'BrandId', 'ProductTypeId', 'DiscountPercent', 'CommissionPercent', 'MaximumPurchaseCount', 'VoteCount', 'created_by', 'LastUpdatedBy', 'PublishedOn', 'UpdateOn', 'created_at', 'deleted_at'], 'integer'],
            [['Gender', 'Name', 'SupplierDescription', 'Description', 'ShortDescriptioon', 'HtmlDescription', 'UrlName', 'Comment'], 'safe'],
            [['TaxPercent', 'Price', 'PriceMarket', 'PriceSupplier'], 'number'],
            [['IsActive', 'IsFeatured', 'IsOnVote'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Products::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ProductId' => $this->ProductId,
            'ProductCategoryId' => $this->ProductCategoryId,
            'SupplierId' => $this->SupplierId,
            'BrandId' => $this->BrandId,
            'ProductTypeId' => $this->ProductTypeId,
            'DiscountPercent' => $this->DiscountPercent,
            'CommissionPercent' => $this->CommissionPercent,
            'TaxPercent' => $this->TaxPercent,
            'Price' => $this->Price,
            'PriceMarket' => $this->PriceMarket,
            'PriceSupplier' => $this->PriceSupplier,
            'MaximumPurchaseCount' => $this->MaximumPurchaseCount,
            'IsActive' => $this->IsActive,
            'IsFeatured' => $this->IsFeatured,
            'IsOnVote' => $this->IsOnVote,
            'VoteCount' => $this->VoteCount,
            'created_by' => $this->created_by,
            'LastUpdatedBy' => $this->LastUpdatedBy,
            'PublishedOn' => $this->PublishedOn,
            'UpdateOn' => $this->UpdateOn,
            'created_at' => $this->created_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'Gender', $this->Gender])
            ->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'SupplierDescription', $this->SupplierDescription])
            ->andFilterWhere(['like', 'Description', $this->Description])
            ->andFilterWhere(['like', 'ShortDescriptioon', $this->ShortDescriptioon])
            ->andFilterWhere(['like', 'HtmlDescription', $this->HtmlDescription])
            ->andFilterWhere(['like', 'UrlName', $this->UrlName])
            ->andFilterWhere(['like', 'Comment', $this->Comment]);

        return $dataProvider;
    }
}
