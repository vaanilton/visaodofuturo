<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Parceiro;

/**
 * ParceiroSearch represents the model behind the search form of `backend\models\Parceiro`.
 */
class ParceiroSearch extends Parceiro
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_utilizador', 'nif', 'status'], 'integer'],
            [['nome', 'endereco', 'data_registro'], 'safe'],
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
        $query = Parceiro::find();

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
            'id_utilizador' => $this->id_utilizador,
            'nif' => $this->nif,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'endereco', $this->endereco])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'data_registro', $this->data_registro]);

        return $dataProvider;
    }
}
