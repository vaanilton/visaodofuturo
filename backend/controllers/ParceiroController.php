<?php

namespace backend\controllers;

use Yii;
use backend\models\Parceiro;
use backend\models\Item;
use backend\models\ParceiroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Profile;
use yii\web\uploadedFile;
/**
 * ParceiroController implements the CRUD actions for Parceiro model.
 */
class ParceiroController extends Controller
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
     * Lists all Parceiro models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ParceiroSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Parceiro model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id){
        $modelItem = Item::find()->where(['id_parceiro'=>$id])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelItem' => $modelItem,
        ]);
    }

    /**
     * Creates a new Parceiro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){

        $modelUser = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
        $model = new Parceiro();

        $model->id_utilizador = $modelUser->user_iduser;
        $model->data_registro = date('Y-m-d');

        if ($model->load(Yii::$app->request->post())) {

          $emagem_nome = Yii::$app->security->generateRandomString();
          $file = $model->photo = UploadedFile::getInstance($model, 'photo');
          $caminho = \Yii::$app->params['parceiro'];
          if($file){
               $model->photo->saveAs($caminho.$emagem_nome.'.'.$model->photo->extension );
               $model->photo = $caminho.$emagem_nome.'.'.$model->photo->extension ;
               $model->estra = $model->photo;
          }else $model->photo = $caminho.'parceiro.jpg' ;

          if($model->save()){
              return $this->redirect(['view', 'id' => $model->id]);
          }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Parceiro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

          $emagem_nome = Yii::$app->security->generateRandomString();
          $file = $model->photo = UploadedFile::getInstance($model, 'photo');
          $caminho = \Yii::$app->params['parceiro'];
          if($file){
               $model->photo->saveAs($caminho.$emagem_nome.'.'.$model->photo->extension );
               $model->photo = $caminho.$emagem_nome.'.'.$model->photo->extension ;
               $model->estra = $model->photo;
          }else $model->photo = $caminho.'parceiro.jpg' ;

          if($model->save()){
              //return $this->redirect(['view', 'id' => $model->id]);
              Yii::$app->session->setFlash('success', "success");
          }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Parceiro model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Parceiro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Parceiro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Parceiro::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
