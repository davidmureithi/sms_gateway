<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Productoptioncombinations;

/**
 * SearchProductOptionCombinations represents the model behind the search form about `common\models\Productoptioncombinations`.
 */
class SearchProductOptionCombinations extends Productoptioncombinations
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ProductOptionCombinationId', 'ProductId', 'ProductOptionGroupMemberId1', 'ProductOptionGroupMemberId2', 'ProductOptionGroupMemberId3', 'ProductOptionGroupMemberId4', 'ProductOptionGroupMemberId5', 'StockUnitId', 'created_by', 'LastUpdatedBy', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['Barcode', 'Comment'], 'safe'],
            [['Price', 'PriceMarket', 'PriceSupplier', 'CampaignStock', 'ActualStock', 'StockWarningLevel'], 'number'],
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
        $query = Productoptioncombinations::find();

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
            'ProductOptionCombinationId' => $this->ProductOptionCombinationId,
            'ProductId' => $this->ProductId,
            'ProductOptionGroupMemberId1' => $this->ProductOptionGroupMemberId1,
            'ProductOptionGroupMemberId2' => $this->ProductOptionGroupMemberId2,
            'ProductOptionGroupMemberId3' => $this->ProductOptionGroupMemberId3,
            'ProductOptionGroupMemberId4' => $this->ProductOptionGroupMemberId4,
            'ProductOptionGroupMemberId5' => $this->ProductOptionGroupMemberId5,
            'Price' => $this->Price,
            'PriceMarket' => $this->PriceMarket,
            'PriceSupplier' => $this->PriceSupplier,
            'CampaignStock' => $this->CampaignStock,
            'ActualStock' => $this->ActualStock,
            'StockWarningLevel' => $this->StockWarningLevel,
            'StockUnitId' => $this->StockUnitId,
            'created_by' => $this->created_by,
            'LastUpdatedBy' => $this->LastUpdatedBy,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'Barcode', $this->Barcode])
            ->andFilterWhere(['like', 'Comment', $this->Comment]);

        return $dataProvider;
    }
}
