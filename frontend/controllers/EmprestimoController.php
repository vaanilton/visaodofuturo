<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Emprestimo;
use app\models\EmprestimoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Profile;
use frontend\models\Fornecedor;
use yii\data\Pagination;
/**
 * EmprestimoController implements the CRUD actions for Emprestimo model.
 */
class EmprestimoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Emprestimo models.
     * @return mixed
     */
    public function actionIndex(){
      $this->layout = 'main2';
      $id = Yii::$app->user->identity->id;
      $id_fornecedor = Fornecedor::find()->where(['user_iduser' => $id])->One();

      $modelsemprestimo=(new \yii\db\Query())
      ->select(['id', 'id_fornecedor','tipo', 'nome', 'quantidade', 'data','data_devolucao', 'quantidade_monetario'])
      ->from('Emprestimo')
      ->where(['id_fornecedor' =>$id_fornecedor]);

      $pages = new Pagination(['totalCount' => $modelsemprestimo->count(), 'pageSize'=>10]);
      $modelsemprestimo = $modelsemprestimo->offset($pages->offset)
          ->limit($pages->limit)
          ->all();

      return $this->render('index', [
          'modelsemprestimo' => $modelsemprestimo,
          'pages' => $pages,
      ]);
    }

    public function actionPendentes(){
      $this->layout = 'main2';
      $id = Yii::$app->user->identity->id;
      $id_fornecedor = Fornecedor::find()->where(['user_iduser' => $id])->One();

      $modelsemprestimo=(new \yii\db\Query())
      ->select(['id', 'id_fornecedor','tipo', 'nome', 'quantidade', 'data','data_devolucao', 'quantidade_monetario'])
      ->from('Emprestimo')
      ->where(['id_fornecedor' =>$id_fornecedor, 'estado'=> 'Debito']);

      $pages = new Pagination(['totalCount' => $modelsemprestimo->count(), 'pageSize'=>10]);
      $modelsemprestimo = $modelsemprestimo->offset($pages->offset)
          ->limit($pages->limit)
          ->all();

      return $this->render('pendentes', [
          'modelsemprestimo' => $modelsemprestimo,
          'pages' => $pages,
      ]);
    }

}
