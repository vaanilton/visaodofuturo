<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Fornecedor;

/**
 * FornecedorSearch represents the model behind the search form of `backend\models\Fornecedor`.
 */
class FornecedorSearch extends Fornecedor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_utilizador', 'id_regiao', 'data_nascimento', 'contacto', 'numero_agregado', 'status'], 'integer'],
            [['nome', 'sobrenome', 'estado_civil', 'sexo', 'endereco', 'grau_parentesco', 'tipo', 'photo', 'NIF', 'BI', 'data_registo'], 'safe'],
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
        $query = Fornecedor::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
              'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'nome' => SORT_ASC,
                ]
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
            'id_regiao' => $this->id_regiao,
            'data_nascimento' => $this->data_nascimento,
            'contacto' => $this->contacto,
            'numero_agregado' => $this->numero_agregado,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'sobrenome', $this->sobrenome])
            ->andFilterWhere(['like', 'estado_civil', $this->estado_civil])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'endereco', $this->endereco])
            ->andFilterWhere(['like', 'grau_parentesco', $this->grau_parentesco])
            ->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'NIF', $this->NIF])
            ->andFilterWhere(['like', 'BI', $this->BI])
            ->andFilterWhere(['like', 'data_registo', $this->data_registo]);

        return $dataProvider;
    }
}
