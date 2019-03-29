<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Cultivo;
use frontend\models\Producao;
use frontend\models\Fornecedor;
use frontend\models\CultivoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\web\uploadedFile;
/**
 * CultivoController implements the CRUD actions for Cultivo model.
 */
class CultivoController extends Controller
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
     * Lists all Cultivo models.
     * @return mixed
     */
    public function actionIndex(){

        $this->layout = 'main2';
        $id = Yii::$app->user->identity->id;
        $id_fornecedor = Fornecedor::find()->where(['user_iduser' => $id])->One();

        $searchModel = new CultivoSearch();
        $searchModel->id_fornecedor = $id_fornecedor;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        $modelscultivo=(new \yii\db\Query())
        ->select(['id', 'id_fornecedor','id_regiao', 'descricao', 'tamanho_do_solu',
                'nome_do_planteio','data_do_planteio',
                'tempo_do_cultivo', 'data_registro','photo'])
        ->from('Cultivo')
        ->where(['id_fornecedor' =>$id_fornecedor, 'status'=>10]);

        $pages = new Pagination(['totalCount' => $modelscultivo->count(), 'pageSize'=>10]);
        $modelscultivo = $modelscultivo->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelscultivo' => $modelscultivo,
            'pages' => $pages,
        ]);
    }

    /**
     * Displays a single Cultivo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id){
      $this->layout = 'main2';
      $producao = new Producao();
      if ($producao->load(Yii::$app->request->post())) {

          $producao->id_cultivo = $id;
          $producao->data_registo = date('Y-m-d');

          if($producao->save()){

             //return $this->redirect(['../producao/view', 'id' => $producao->id]);
          }

      }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'producao' => $producao,
        ]);
    }

    /**
     * Creates a new Cultivo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){

        $model = new Cultivo();

        if ($model->load(Yii::$app->request->post())) {

            $model->data_registro = date('Y-m-d');
            $model->status = 10;

            $emagem_nome = Yii::$app->security->generateRandomString();
            $file = $model->photo = UploadedFile::getInstance($model, 'photo');
            $caminho = \Yii::$app->params['cultivo'];
            if($file){
                 $model->photo->saveAs($caminho.$emagem_nome.'.'.$model->photo->extension );
                 $model->photo = $caminho.$emagem_nome.'.'.$model->photo->extension ;
                 $model->estra = $model->photo;
            }else $model->photo = $caminho.'cultivo.jpg' ;

            if ($model->save()) {

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,

        ]);
    }

    /**
     * Updates an existing Cultivo model.
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
            $caminho = \Yii::$app->params['cultivo'];
            if($file){
                 $model->photo->saveAs($caminho.$emagem_nome.'.'.$model->photo->extension );
                 $model->photo = $caminho.$emagem_nome.'.'.$model->photo->extension ;
                 $model->estra = $model->photo;
            }else $model->photo = $model->estra;

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cultivo model.
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

    public function actionApagar($id)
    {

        $model = Cultivo::find()->where(['id' => $id])->one();

        if($model->status == 10){
            $model->status = 0;
            $model->save();
        }

        return $this->redirect(['index']);

    }

    /**
     * Finds the Cultivo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cultivo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cultivo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
