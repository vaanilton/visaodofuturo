<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Emprestimo;

/**
 * EmprestimoSearch represents the model behind the search form of `backend\models\Emprestimo`.
 */
class EmprestimoSearch extends Emprestimo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_fornecedor', 'id_utilizador', 'quantidade'], 'integer'],
            [['tipo', 'descricao', 'data'], 'safe'],
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
        $query = Emprestimo::find();

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
            'id_fornecedor' => $this->id_fornecedor,
            'id_utilizador' => $this->id_utilizador,
            'quantidade' => $this->quantidade,
        ]);

        $query->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'data', $this->data]);

        return $dataProvider;
    }
}
