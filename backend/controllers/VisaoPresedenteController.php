<?php

namespace backend\controllers;

use Yii;
use backend\models\VisaoPresedente;
use backend\models\VisaoPresedenteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\web\uploadedFile;
/**
 * VisaoPresedenteController implements the CRUD actions for VisaoPresedente model.
 */
class VisaoPresedenteController extends Controller
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
     * Lists all VisaoPresedente models.
     * @return mixed
     */
    public function actionIndex(){

        $this->layout = 'main_backofice';
        $searchModel = new VisaoPresedenteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VisaoPresedente model.
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
     * Creates a new VisaoPresedente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){
        $this->layout = 'main_backofice';
        $model = new VisaoPresedente();

        if ($model->load(Yii::$app->request->post())) {

          $model->status = 10;
          $emagem_nome = Yii::$app->security->generateRandomString();
          $file = $model->photo = UploadedFile::getInstance($model, 'photo');
          $caminho = \Yii::$app->params['visao'];
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
     * Updates an existing VisaoPresedente model.
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
          $caminho = \Yii::$app->params['visao'];
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
     * Deletes an existing VisaoPresedente model.
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
     * Finds the VisaoPresedente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VisaoPresedente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VisaoPresedente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
