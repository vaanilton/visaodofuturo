<?php

namespace frontend\models;
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
            [['tipo', 'data'], 'safe'],
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
    public function search($params, $dados){

      $id = Yii::$app->user->identity['id'];
      $id_fornecedor = Fornecedor::find()->where(['user_iduser' => $id])->One();

      if($dados=='estrato'){

          $query = (new \yii\db\Query())
          ->select(['pr.id', 'id_fornecedor', 'id_utilizador', 'tipo', 'nome', 'quantidade', 'data',
                    'data_devolucao', 'quantidade_monetario', 'estado', 'pr.status'])
          ->from('Emprestimo pr')
          ->where(['pr.status' => 10, 'pr.estado'=>'Pago' , 'id_fornecedor' => $id_fornecedor]);

      }else if($dados=='pendente'){

        $query = (new \yii\db\Query())
        ->select(['pr.id', 'id_fornecedor', 'id_utilizador', 'tipo', 'nome', 'quantidade', 'data',
                  'data_devolucao', 'quantidade_monetario', 'estado', 'pr.status'])
        ->from('Emprestimo pr')
        ->where(['pr.status' => 10, 'pr.estado'=>'Debito' , 'id_fornecedor' => $id_fornecedor]);

      }else {
        $query = (new \yii\db\Query())
        ->select(['pr.id', 'id_fornecedor', 'id_utilizador', 'tipo', 'nome', 'quantidade', 'data',
                  'data_devolucao', 'quantidade_monetario', 'estado', 'pr.status'])
        ->from('Emprestimo pr')
        ->where(['pr.status' => 10, 'id_fornecedor' => $id_fornecedor]);
      }

      $dataProvider = new ActiveDataProvider([
          'query' => $query,
      ]);

      // add conditions that should always apply here
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
          ->andFilterWhere(['like', 'data', $this->data]);

      return $dataProvider;
    }
}
