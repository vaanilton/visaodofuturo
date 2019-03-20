<?php

namespace backend\controllers;

use Yii;
use backend\models\Gado;
use backend\models\Compra;
use backend\models\Produto;
use backend\models\Stock;
use backend\models\Profile;
use backend\models\GadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\uploadedFile;
use yii\data\Pagination;
/**
 * GadoController implements the CRUD actions for Gado model.
 */
class GadoController extends Controller
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
     * Lists all Gado models.
     * @return mixed
     */
    public function actionIndex(){

        Yii::$app->params['bsVersion'];
        $searchModel = new GadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $modelsgado=(new \yii\db\Query())
        ->select(['id', 'id_fornecedor','id_regiao', 'descricao', 'nome','quantidade', 'data_registo','photo'])
        ->from('Gado')
        ->where(['status'=>10]);

        $pages = new Pagination(['totalCount' => $modelsgado->count(), 'pageSize'=>12]);
        $modelsgado = $modelsgado->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelsgado' => $modelsgado,
            'pages' => $pages,
        ]);
    }

    /**
     * Displays a single Gado model.
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
     * Creates a new Gado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){

        $model = new Gado();

        if ($model->load(Yii::$app->request->post())) {

            $model->status = 10;
            $model->data_registo = date('Y-m-d');

            $emagem_nome = Yii::$app->security->generateRandomString();
            $file = $model->photo = UploadedFile::getInstance($model, 'photo');
            $caminho = \Yii::$app->params['gado'];
            if($file){
                 $model->photo->saveAs($caminho.$emagem_nome.'.'.$model->photo->extension );
                 $model->photo = $caminho.$emagem_nome.'.'.$model->photo->extension ;
                 $model->estra = $model->photo;
            }else $model->photo = $caminho.'gado.jpg' ;

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Gado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id){

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $emagem_nome = Yii::$app->security->generateRandomString();
            $file = $model->photo = UploadedFile::getInstance($model, 'photo');
            $caminho = \Yii::$app->params['gado'];
            if($file){
                 $model->photo->saveAs($caminho.$emagem_nome.'.'.$model->photo->extension );
                 $model->photo = $caminho.$emagem_nome.'.'.$model->photo->extension ;
                 $model->estra = $model->photo;
            }else $model->photo = $model->estra;

            if($model->save()){
                //return $this->redirect(['view', 'id' => $model->id]);
                Yii::$app->session->setFlash('success', "success");
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionComprar($id){
        $model = $this->findModel($id);

        $compra = new Compra();

        $profile = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
        if($profile){

          if ($compra->load(Yii::$app->request->post())) {

              $compra->id_utilizador = $profile->user_iduser;
              $compra->quantidade = $compra->quantidade;
              $compra->id_gado = $model->id;

              $compra->data = date('Y-m-d');
              $compra->estado = 'Em Analise';

              if($compra->save()){
                $quant = $model->quantidade;
                $model->quantidade = $quant - $compra->quantidade;
                $model->estado = 'Comprado';
                $model->save();
                if($model->quantidade == 0){
                  $model->status = 0;
                  $model->save();
                }
                return $this->redirect(['compra/index']);
              }
          }
      }

        return $this->render('viewCompra', [
            'model' => $model,
            'compra' => $compra,
        ]);
    }

    /**
     * Deletes an existing Gado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

     public function actionApagar($id){

         $model = Gado::find()->where(['id' => $id])->one();

         if($model->status == 10){
             $model->status = 0;
             $model->save();
         }

         return $this->redirect(['index']);

     }

    public function actionDelete($id){

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Gado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gado::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
