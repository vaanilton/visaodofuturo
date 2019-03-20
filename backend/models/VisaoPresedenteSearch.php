<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\VisaoPresedente;

/**
 * VisaoPresedenteSearch represents the model behind the search form of `backend\models\VisaoPresedente`.
 */
class VisaoPresedenteSearch extends VisaoPresedente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['descricao','nome', 'sobrenome', 'photo',], 'safe'],
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
        $query = VisaoPresedente::find();

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
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'descricao', $this->descricao])
        ->andFilterWhere(['like', 'nome', $this->nome])
        ->andFilterWhere(['like', 'sobrenome', $this->sobrenome])
        ->andFilterWhere(['like', 'photo', $this->photo]);

        return $dataProvider;
    }
}
