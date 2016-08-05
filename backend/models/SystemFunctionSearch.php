<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SystemFunction;

/**
 * SystemFunctionSearch represents the model behind the search form about `backend\models\SystemFunction`.
 */
class SystemFunctionSearch extends SystemFunction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'module_id', 'display_order'], 'integer'],
            [['code', 'func_name', 'display_label', 'des', 'entry_right_name', 'entry_url', 'has_lef', 'create_user', 'create_date', 'update_user', 'update_date'], 'safe'],
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
        $query = SystemFunction::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'module_id' => $this->module_id,
            'display_order' => $this->display_order,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'func_name', $this->func_name])
            ->andFilterWhere(['like', 'display_label', $this->display_label])
            ->andFilterWhere(['like', 'des', $this->des])
            ->andFilterWhere(['like', 'entry_right_name', $this->entry_right_name])
            ->andFilterWhere(['like', 'entry_url', $this->entry_url])
            ->andFilterWhere(['like', 'has_lef', $this->has_lef])
            ->andFilterWhere(['like', 'create_user', $this->create_user])
            ->andFilterWhere(['like', 'update_user', $this->update_user]);

        return $dataProvider;
    }
}
