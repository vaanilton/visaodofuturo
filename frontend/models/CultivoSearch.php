<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Cultivo;
use frontend\models\Fornecedor;

/**
 * CultivoSearch represents the model behind the search form of `backend\models\Cultivo`.
 */
class CultivoSearch extends Cultivo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_fornecedor', 'id_regiao', 'tamanho_do_solu'], 'integer'],
            [['descricao', 'nome_do_planteio', 'data_do_planteio', 'tempo_do_cultivo', 'data_registro'], 'safe'],
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
        //$query = Cultivo::find();
        // add conditions that should always apply here
        $id = Yii::$app->user->identity->id;
        $id_fornecedor = Fornecedor::find()->where(['user_iduser' => $id])->One();

        $query = (new \yii\db\Query())
        ->select(['id', 'id_fornecedor', 'id_regiao', 'descricao', 'tamanho_do_solu', 'nome_do_planteio',
              'data_do_planteio', 'tempo_do_cultivo', 'data_registro','photo', 'status'])
        ->from('Cultivo cl')
        ->where(['cl.status'=>10, 'cl.id_fornecedor' => $id_fornecedor]);

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
            'id_fornecedor' => $this->id_fornecedor,
            'id_regiao' => $this->id_regiao,
            'tamanho_do_solu' => $this->tamanho_do_solu,
        ]);

        $query->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'nome_do_planteio', $this->nome_do_planteio])
            ->andFilterWhere(['like', 'data_do_planteio', $this->data_do_planteio])
            ->andFilterWhere(['like', 'tempo_do_cultivo', $this->tempo_do_cultivo])
            ->andFilterWhere(['like', 'data_registro', $this->data_registro]);

        return $dataProvider;
    }
}
