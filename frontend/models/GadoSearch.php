<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Gado;

/**
 * GadoSearch represents the model behind the search form of `backend\models\Gado`.
 */
class GadoSearch extends Gado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'quantidade', 'id_fornecedor', 'id_regiao'], 'integer'],
            [['nome', 'descricao', 'data_registo'], 'safe'],
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
        $id = Yii::$app->user->identity->id;
        $id_fornecedor = Fornecedor::find()->where(['user_iduser' => $id])->One();

        $query = (new \yii\db\Query())
        ->select(['id', 'nome', 'descricao', 'id_fornecedor', 'id_regiao', 'descricao',
              'quantidade', 'data_registo', 'photo', 'status'])
        ->from('Gado cl')
        ->where(['cl.status'=>10, 'cl.id_fornecedor' => $id_fornecedor]);

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
            'quantidade' => $this->quantidade,
            'id_fornecedor' => $this->id_fornecedor,
            'id_regiao' => $this->id_regiao,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'data_registo', $this->data_registo]);

        return $dataProvider;
    }
}
