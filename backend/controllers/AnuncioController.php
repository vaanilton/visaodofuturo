<?php

namespace backend\controllers;

use Yii;
use backend\models\Anuncio;
use backend\models\AnuncioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnuncioController implements the CRUD actions for Anuncio model.
 */
class AnuncioController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors(){

        $this->layout = 'main_backofice';
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
     * Lists all Anuncio models.
     * @return mixed
     */
    public function actionIndex(){

        $this->layout = 'main_backofice';
        $searchModel = new AnuncioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Anuncio model.
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
     * Creates a new Anuncio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){

        $this->layout = 'main_backofice';
        $model = new Anuncio();
        $model->data = date('Y-m-d');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Anuncio model.
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
     * Deletes an existing Anuncio model.
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
     * Finds the Anuncio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Anuncio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id){

        $this->layout = 'main_backofice';
        if (($model = Anuncio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
