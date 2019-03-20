<?php

namespace backend\controllers;

use Yii;
use backend\models\Emprestimo;
use backend\models\EmprestimoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Profile;
use backend\models\Producao;

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

        $searchModel = new EmprestimoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Emprestimo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id){

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Emprestimo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){

        $modelUser = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
        $model = new Emprestimo();

        if ($model->load(Yii::$app->request->post())) {

            $model->id_utilizador = $modelUser->user_iduser;
            $model->data = date('Y-m-d');

            if($model->save()){
              return $this->redirect(['view', 'id' => $model->id]);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Emprestimo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id){

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionFecho(){
      $producao = Producao::find()->where(['estado' => 'Comprado'])->all();
      if($producao) {
        foreach ($producao as $key => $value) {
          //$value['estado'] ='Pago';
          $value->save();
        }

          return $this->redirect(['fornecedor/index']);

      }

    }

    public function actionLiquidar($id){

        if ($model = $this->findModel($id)) {
          $model->estado ='Pago';

          if($model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
          }
        }
    }

    /**
     * Deletes an existing Emprestimo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id){

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Emprestimo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Emprestimo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Emprestimo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
