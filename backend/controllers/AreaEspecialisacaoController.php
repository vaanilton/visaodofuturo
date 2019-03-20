<?php

namespace backend\controllers;

use Yii;
use backend\models\AreaEspecialisacao;
use backend\models\AreaEspecialisacaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AreaEspecialisacaoController implements the CRUD actions for AreaEspecialisacao model.
 */
class AreaEspecialisacaoController extends Controller
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
     * Lists all AreaEspecialisacao models.
     * @return mixed
     */
    public function actionIndex(){

        $this->layout = 'main_backofice';
        $searchModel = new AreaEspecialisacaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AreaEspecialisacao model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id){

        $this->layout = 'main_backofice';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AreaEspecialisacao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){
        $this->layout = 'main_backofice';
        $model = new AreaEspecialisacao();

        if ($model->load(Yii::$app->request->post())) {
            $model->status = 10;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AreaEspecialisacao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id){

        $this->layout = 'main_backofice';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AreaEspecialisacao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id){

        $this->layout = 'main_backofice';
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AreaEspecialisacao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AreaEspecialisacao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id){

        $this->layout = 'main_backofice';
        if (($model = AreaEspecialisacao::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}