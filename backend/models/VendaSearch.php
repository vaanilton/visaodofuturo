<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Venda;

/**
 * VendaSearch represents the model behind the search form of `backend\models\Venda`.
 */
class VendaSearch extends Venda
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_utilizador', 'id_produto', 'id_cliente', 'quantidade', 'preco_total'], 'integer'],
            [['descricao', 'data', 'estado'], 'safe'],
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
        $query = Venda::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
              'pageSize' => 10,
            ],
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
            'id_produto' => $this->id_produto,
            'id_cliente' => $this->id_cliente,
            'quantidade' => $this->quantidade,
            'preco_total' => $this->preco_total,
        ]);

        $query->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
