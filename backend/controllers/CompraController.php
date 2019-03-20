<?php

namespace backend\controllers;

use Yii;
use backend\models\Compra;
use backend\models\Produto;
use backend\models\Stock;
use backend\models\Cultivo;
use backend\models\Producao;
use backend\models\CompraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompraController implements the CRUD actions for Compra model.
 */
class CompraController extends Controller
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
     * Lists all Compra models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Compra model.
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

    /**
     * Creates a new Compra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Compra();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionFinalizarcompra($id){

        $produto = new Produto();
        $stock = new Stock();
        $model = $this->findModel($id);

        $producao = Producao::find()->where(['id'=>$model->id_producao])->One();
        if($producao){

                $produtofind = Produto::find()->where(['codigo_producao_id'=>$producao->codigo_producao_id])->One();
                if($produtofind){

                    $produtofind->photo = $producao->photo;
                    $produtofind->data_registo = date('Y-m-d');

                    if($produtofind->save()){

                        $stockfind = Stock::find()->where(['id_produto'=>$produtofind->id])->One();
                        if($stockfind){

                            $quant_stock = $stockfind->quantidade;
                            $quant_producao = $producao->quantidade_producao - $producao->quantidade_perda;
                            $stockfind->quantidade = $quant_stock + $quant_producao;

                            if($stockfind->save()){
                                return $this->redirect(['compra/index']);
                            }
                        }
                    }
                }else {

                    $produto->id_compra = $model->id;
                    $produto->nome = $producao->designacao;
                    $produto->descricao = $producao->designacao;
                    $produto->preco = $producao->preco_kilo;
                    $produto->photo = $producao->photo;
                    $produto->data_registo = date('Y-m-d');
                    $produto->status = 10;
                    $produto->codigo_producao_id = $producao->codigo_producao_id;

                    if($produto->save()){

                        $stock->id_produto = $produto->id;
                        $stock->id_utilizador = Yii::$app->user->identity->id;

                        $quant_producao = $producao->quantidade_producao - $producao->quantidade_perda;

                        $stock->quantidade = $quant_producao;
                        $stock->data_registo = date('Y-m-d');

                        if($stock->save()){
                            return $this->redirect(['compra/index']);
                        }

                    }

                }

        }
    }

    /**
     * Updates an existing Compra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Compra model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id){

        $compra = Compra::find()->where(['id'=> $id])->One();
        if($compra){
            $producao = Producao::find()->where(['id'=>$compra->id_producao])->One();
            if($producao){
                $producao->estado = 'Confirmado';
                $producao->save();
            }
        }

        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Compra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Compra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Compra::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
