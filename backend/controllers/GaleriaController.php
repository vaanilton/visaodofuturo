<?php

namespace backend\controllers;

use Yii;
use backend\models\Galeria;
use backend\models\GaleriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\uploadedFile;
/**
 * GaleriaController implements the CRUD actions for Galeria model.
 */
class GaleriaController extends Controller
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
     * Lists all Galeria models.
     * @return mixed
     */
    public function actionIndex(){
        $this->layout = 'main_backofice';
        $searchModel = new GaleriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Galeria model.
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
     * Creates a new Galeria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){
        $this->layout = 'main_backofice';
        $model = new Galeria();

        if ($model->load(Yii::$app->request->post())) {
          $model->status = 10;

          $emagem_nome = Yii::$app->security->generateRandomString();
          $file = $model->photo = UploadedFile::getInstance($model, 'photo');
          $caminho = \Yii::$app->params['galeria'];
          if($file){
               $model->photo->saveAs($caminho.$emagem_nome.'.'.$model->photo->extension );
               $model->photo = $caminho.$emagem_nome.'.'.$model->photo->extension ;
               $model->estra = $model->photo;
          }else $model->photo = $caminho.'utilizador.jpg' ;

          if ($model->save()) {
              return $this->redirect(['view', 'id' => $model->id]);
          }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Galeria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id){

        $this->layout = 'main_backofice';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
          $emagem_nome = Yii::$app->security->generateRandomString();
          $file = $model->photo = UploadedFile::getInstance($model, 'photo');
          $caminho = \Yii::$app->params['galeria'];
          if($file){
               $model->photo->saveAs($caminho.$emagem_nome.'.'.$model->photo->extension );
               $model->photo = $caminho.$emagem_nome.'.'.$model->photo->extension ;
               $model->estra = $model->photo;
          }else $model->photo = $model->estra;

          if ($model->save()) {
              return $this->redirect(['view', 'id' => $model->id]);
          }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Galeria model.
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
     * Finds the Galeria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Galeria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Galeria::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
