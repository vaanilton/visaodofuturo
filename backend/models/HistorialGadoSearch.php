<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HistorialGado;

/**
 * HistorialGadoSearch represents the model behind the search form of `backend\models\HistorialGado`.
 */
class HistorialGadoSearch extends HistorialGado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_gado', 'quantidade'], 'integer'],
            [['obs', 'data'], 'safe'],
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
        $query = HistorialGado::find();

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
            'id' => $this->id,
            'id_gado' => $this->id_gado,
            'quantidade' => $this->quantidade,
        ]);

        $query->andFilterWhere(['like', 'obs', $this->obs])
            ->andFilterWhere(['like', 'data', $this->data]);

        return $dataProvider;
    }
}
