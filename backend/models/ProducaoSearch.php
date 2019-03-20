<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Producao;

/**
 * ProducaoSearch represents the model behind the search form of `backend\models\Producao`.
 */
class ProducaoSearch extends Producao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_cultivo', 'id_gado', 'quantidade_producao', 'quantidade_perda', 'preco_kilo'], 'integer'],
            [['tipo', 'data_colheita','estado', 'codigo_producao_id', 'designacao'], 'safe'],
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

        $profile = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();

        if($profile->tipo == 'Adiministrador'){

          $query = (new \yii\db\Query())
          ->select(['pr.id', 'id_cultivo', 'id_gado', 'tipo', 'quantidade_producao', 'quantidade_perda',
                    'data_colheita', 'preco_kilo', 'data_registo', 'pr.photo', 'estado', 'codigo_producao_id', 'pr.status', 'designacao'])
          ->from('Producao pr')
          ->where(['pr.status'=>10]);

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
              'id_cultivo' => $this->id_cultivo,
              'id_gado' => $this->id_gado,
              'quantidade_producao' => $this->quantidade_producao,
              'quantidade_perda' => $this->quantidade_perda,
              'preco_kilo' => $this->preco_kilo,
          ]);

          $query->andFilterWhere(['like', 'tipo', $this->tipo])
              ->andFilterWhere(['like', 'estado', $this->estado])
              ->andFilterWhere(['like', 'data_colheita', $this->data_colheita])
              ->andFilterWhere(['like', 'estado', $this->estado])
              ->andFilterWhere(['like', 'codigo_producao_id', $this->codigo_producao_id])
              ->andFilterWhere(['like', 'designacao', $this->designacao]);

          return $dataProvider;

        }else if($profile->tipo == 'Gestor'){

          $query = (new \yii\db\Query())
          ->select(['pr.id', 'id_cultivo', 'id_gado', 'tipo', 'quantidade_producao', 'quantidade_perda',
                    'data_colheita', 'preco_kilo', 'data_registo', 'pr.photo', 'estado', 'codigo_producao_id', 'pr.status'])
          ->from('Producao pr')
          ->join('join','Cultivo cl','pr.id_cultivo = cl.id')
          ->where(['pr.status'=>10]);

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
              'id_cultivo' => $this->id_cultivo,
              'id_gado' => $this->id_gado,
              'quantidade_producao' => $this->quantidade_producao,
              'quantidade_perda' => $this->quantidade_perda,
              'preco_kilo' => $this->preco_kilo,
          ]);

          $query->andFilterWhere(['like', 'tipo', $this->tipo])
              ->andFilterWhere(['like', 'estado', $this->estado])
              ->andFilterWhere(['like', 'data_colheita', $this->data_colheita])
              ->andFilterWhere(['like', 'estado', $this->estado])
              ->andFilterWhere(['like', 'codigo_producao_id', $this->codigo_producao_id]);

          return $dataProvider;

        }else if($profile->tipo == "Operador"){

            $query = (new \yii\db\Query())
            ->select(['pr.id', 'id_cultivo', 'id_gado', 'tipo', 'quantidade_producao', 'quantidade_perda',
                      'data_colheita', 'preco_kilo', 'pr.data_registo', 'pr.photo', 'estado', 'codigo_producao_id', 'pr.status'])
            ->from('Producao pr')
            ->where(['pr.status'=>10, 'pr.estado' => 'Analizar']);

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
                'id_cultivo' => $this->id_cultivo,
                'id_gado' => $this->id_gado,
                'quantidade_producao' => $this->quantidade_producao,
                'quantidade_perda' => $this->quantidade_perda,
                'preco_kilo' => $this->preco_kilo,
            ]);

            $query->andFilterWhere(['like', 'tipo', $this->tipo])
                ->andFilterWhere(['like', 'estado', $this->estado])
                ->andFilterWhere(['like', 'data_colheita', $this->data_colheita])
                ->andFilterWhere(['like', 'estado', $this->estado])
                ->andFilterWhere(['like', 'codigo_producao_id', $this->codigo_producao_id]);

            return $dataProvider;

        }else if($profile->tipo == 'Fiel_armazen'){

            $query = (new \yii\db\Query())
            ->select(['pr.id', 'id_cultivo', 'id_gado', 'tipo', 'quantidade_producao', 'quantidade_perda',
                      'data_colheita', 'preco_kilo', 'data_registo', 'pr.photo', 'estado', 'codigo_producao_id', 'pr.status'])
            ->from('Producao pr')
            ->join('join','Cultivo cl','pr.id_cultivo = cl.id')
            ->where(['pr.status'=>10]);

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
                'id_cultivo' => $this->id_cultivo,
                'id_gado' => $this->id_gado,
                'quantidade_producao' => $this->quantidade_producao,
                'quantidade_perda' => $this->quantidade_perda,
                'preco_kilo' => $this->preco_kilo,
            ]);

            $query->andFilterWhere(['like', 'tipo', $this->tipo])
                ->andFilterWhere(['like', 'estado', $this->estado])
                ->andFilterWhere(['like', 'data_colheita', $this->data_colheita])
                ->andFilterWhere(['like', 'estado', $this->estado])
                ->andFilterWhere(['like', 'codigo_producao_id', $this->codigo_producao_id]);

            return $dataProvider;

        }

        $query = (new \yii\db\Query())
        ->select(['pr.id', 'id_cultivo', 'id_gado', 'tipo', 'quantidade_producao', 'quantidade_perda',
                  'data_colheita', 'preco_kilo', 'data_registo', 'pr.photo', 'estado', 'codigo_producao_id', 'pr.status'])
        ->from('Producao pr')
        ->join('join','Cultivo cl','pr.id_cultivo = cl.id')
        ->where(['pr.status'=>10]);

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
            'id_cultivo' => $this->id_cultivo,
            'id_gado' => $this->id_gado,
            'quantidade_producao' => $this->quantidade_producao,
            'quantidade_perda' => $this->quantidade_perda,
            'preco_kilo' => $this->preco_kilo,
        ]);

        $query->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'data_colheita', $this->data_colheita])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'codigo_producao_id', $this->codigo_producao_id]);

        return $dataProvider;
    }
}
