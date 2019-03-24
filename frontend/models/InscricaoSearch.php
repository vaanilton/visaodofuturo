<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Inscricao;

/**
 * InscricaoSearch represents the model behind the search form of `backend\models\Inscricao`.
 */
class InscricaoSearch extends Inscricao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'BI', 'NIF', 'telefone', 'status', 'id_anuncio'], 'integer'],
            [['nome', 'morada', 'sexo', 'data_nascimento', 'escolaridade', 'email'], 'safe'],
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
        $query = Inscricao::find();

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
            'BI' => $this->BI,
            'NIF' => $this->NIF,
            'telefone' => $this->telefone,
            'status' => $this->status,
            'id_anuncio' => $this->id_anuncio,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'morada', $this->morada])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'data_nascimento', $this->data_nascimento])
            ->andFilterWhere(['like', 'escolaridade', $this->escolaridade])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
