<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Item;

/**
 * ItemSearch represents the model behind the search form of `backend\models\Item`.
 */
class ItemSearch extends Item
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_utilizador', 'id_parceiro', 'iva', 'unidade_caixa', 'unidade_caixa_iva', 'preco_caixa_iva', 'preco_item', 'status'], 'integer'],
            [['codigo', 'nome', 'data_registrado'], 'safe'],
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
        $query = Item::find();

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
            'id_parceiro' => $this->id_parceiro,
            'iva' => $this->iva,
            'unidade_caixa' => $this->unidade_caixa,
            'unidade_caixa_iva' => $this->unidade_caixa_iva,
            'preco_caixa_iva' => $this->preco_caixa_iva,
            'preco_item' => $this->preco_item,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'data_registrado', $this->data_registrado]);

        return $dataProvider;
    }
}
