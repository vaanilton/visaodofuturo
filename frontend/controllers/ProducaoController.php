<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Fornecedor;
use frontend\models\Producao;
use frontend\models\Cultivo;
use frontend\models\Compra;
use frontend\models\Gado;
use frontend\models\Produto;
use frontend\models\Stock;
use frontend\models\Profile;
use frontend\models\ProducaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\web\uploadedFile;
use yii\data\ActiveDataProvider;
/**
 * ProducaoController implements the CRUD actions for Producao model.
 */
class ProducaoController extends Controller
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
     * Lists all Producao models.
     * @return mixed
     */
    public function actionIndex(){
      $this->layout = 'main2';

      $id = Yii::$app->user->identity->id;
      $id_fornecedor = Fornecedor::find()->where(['user_iduser' => $id])->One();

      $searchModel = new ProducaoSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'producao');
      $queryy = (new \yii\db\Query())
      ->select(['id', 'id_cultivo', 'id_gado', 'tipo', 'quantidade_producao', 'quantidade_perda',
                'data_colheita', 'preco_kilo', 'data_registo', 'photo', 'pr.estado', 'status'])
      ->from('Producao pr')
      ->join('join','Cultivo cl','pr.id_cultivo = cl.id')
      ->where(['pr.status'=>10, 'cl.id_fornecedor' => $id_fornecedor]);

      $query = Producao::find()->where(['status'=>0]);

      $dataProvide = new ActiveDataProvider([
        'query' => $query,
        'Pagination' =>[
          'pageSize' => 3
        ],
        'sort'=> [
          'defaultOrder' => ['name' => SORT_ASC]
        ]
      ]);

      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
    }

    /**
     * Displays a single Producao model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

}
