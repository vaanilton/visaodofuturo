<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Inscricao;
use frontend\models\InscricaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InscricaoController implements the CRUD actions for Inscricao model.
 */
class InscricaoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors(){

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
     * Lists all Inscricao models.
     * @return mixed
     */
    public function actionIndex(){

        $searchModel = new InscricaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inscricao model.
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
     * Creates a new Inscricao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){


        $model = new Inscricao();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionInscrever($id){

        $model = new Inscricao();
        $model->id_anuncio = $id;
        $model->data_inscrito = date('d/m/y H:i:s');
        if ($model->load(Yii::$app->request->post())) {

            if ($model->save()) {
                  Yii::$app->session->setFlash('success', "Candidadtura Efetuada");
              } else {
                  Yii::$app->session->setFlash('error', "Error");
              }
        }

        return $this->render('inscrever', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Inscricao model.
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

    /**
     * Deletes an existing Inscricao model.
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
     * Finds the Inscricao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inscricao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id){

        if (($model = Inscricao::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
