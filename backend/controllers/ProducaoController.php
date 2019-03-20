<?php

namespace backend\controllers;

use Yii;
use backend\models\Producao;
use backend\models\Cultivo;
use backend\models\Compra;
use backend\models\Gado;
use backend\models\Produto;
use backend\models\Stock;
use backend\models\Profile;
use backend\models\ProducaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\web\uploadedFile;
/**
 * ProducaoController implements the CRUD actions for Producao model.
 */
class ProducaoController extends Controller
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
     * Lists all Producao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProducaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Producao model.
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
     * Creates a new Producao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){
        $cultivo = new Cultivo();
        $model = new Producao();

        if ($cultivo->load(Yii::$app->request->post())) {

            $cultivo->data_registo = date('Y-m-d');
            if($cultivo->save()){
                //return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        if ($model->load(Yii::$app->request->post())) {

            $model->id_cultivo = $cultivo->id;
            $model->status = 10;
            $model->data_registo = date('Y-m-d');

            if($model->save())
              return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'cultivo' => $cultivo,
            'model' => $model,

        ]);
    }

    public function actionAgricula($id){

        $model = new Producao();
        $cultivo = $id;
        if ($model->load(Yii::$app->request->post())) {

            $model->id_cultivo = $id;

            $model->tipo = 'Agricula';
            $model->data_registo = date('Y-m-d');
            $model->estado = 'Analizar';
            $model->status = 10;

            $emagem_nome = Yii::$app->security->generateRandomString();
            $file = $model->photo = UploadedFile::getInstance($model, 'photo');
            $caminho = \Yii::$app->params['producao'];
            if($file){
                 $model->photo->saveAs($caminho.$emagem_nome.'.'.$model->photo->extension );
                 $model->photo = $caminho.$emagem_nome.'.'.$model->photo->extension ;
                 $model->estra = $model->photo;
            }else $model->photo = $caminho.'producao.jpg' ;

            if($model->save()) {
              return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('_form_agricula', [
            'cultivo'=> $cultivo,
            'model' => $model,
        ]);
    }

    public function actionPecuaria($id){
        $modelgado = Gado::find()->where(['id'=>$id])->One();
        $model = new Producao();
        $gado = $id;

        if ($model->load(Yii::$app->request->post())) {

            $model->id_gado = $id;

            $model->tipo = 'Picuaria';
            $model->data_registo = date('Y-m-d');
            $model->estado = 'Analizar';
            $model->status = 10;

            /*
            if($modelgado){
                $model->photo = $modelgado->photo;
            }*/

            $emagem_nome = Yii::$app->security->generateRandomString();
            $file = $model->photo = UploadedFile::getInstance($model, 'photo');
            $caminho = \Yii::$app->params['producao'];
            if($file){
                 $model->photo->saveAs($caminho.$emagem_nome.'.'.$model->photo->extension );
                 $model->photo = $caminho.$emagem_nome.'.'.$model->photo->extension ;
                 $model->estra = $model->photo;
            }else $model->photo = $caminho.'producao.jpg' ;

            if($model->save()) {
              return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('_form_pecuaria', [
            'gado'=> $gado,
            'model' => $model,
        ]);
    }

    public function actionProducaoagricula(){

        $modelsCultivo=(new \yii\db\Query())
        ->select(['c.id','c.id_fornecedor', 'c.id_regiao', 'descricao','tamanho_do_solu', 'nome_do_planteio','data_do_planteio','tempo_do_cultivo','c.data_registro','c.photo'])
        ->from('Cultivo c')
        ->join('join','fornecedor f','f.id = c.id_fornecedor')
        ->where(['f.status' => 10]);

        $pages = new Pagination(['totalCount' => $modelsCultivo->count(), 'pageSize'=>12]);
        $modelsCultivo = $modelsCultivo->offset($pages->offset)
            ->limit($pages->limit)
            ->all();


        return $this->render('_producao_agricula', [
            'modelsCultivo' => $modelsCultivo,
        ]);
    }

    public function actionProducaopecuria(){

        $modelsGado=(new \yii\db\Query())
        ->select(['c.id','c.id_fornecedor', 'c.id_regiao', 'descricao','c.nome','quantidade','c.data_registo','c.photo'])
        ->from('Gado c')
        ->join('join','fornecedor f','f.id = c.id_fornecedor')
        ->where(['f.status' => 10]);

        $pages = new Pagination(['totalCount' => $modelsGado->count(), 'pageSize'=>12]);
        $modelsGado = $modelsGado->offset($pages->offset)
            ->limit($pages->limit)
            ->all();


        return $this->render('_producao_pecuaria', [
            'modelsgado' => $modelsGado,
        ]);
    }

    public function actionComprar($id){

        $model = $this->findModel($id);
        $compra = new Compra();

        $profile = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
        if($profile){
 
            $model->estado = 'Comprado';

            if($model->save()){

                $compra->id_utilizador = $profile->user_iduser;
                $compra->id_producao = $model->id;

                $quant = $model->quantidade_producao - $model->quantidade_perda;
                $compra->quantidade = $quant;

                $total = $quant * $model->preco_kilo;

                $compra->preco_total = $total;
                $compra->data = date('Y-m-d');
                $compra->estado = 'Em Analise';

                if($compra->save()){

                  return $this->redirect(['compra/view', 'id' => $compra->id]);
                }
            }
        }
    }

    public function actionComprarr($id){

        $model = $this->findModel($id);
        $compra = new Compra();
        $produto = new Produto();
        $stock = new Stock();

        $profile = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();

        if($profile){

            $model->estado = 'Comprado';

            if($model->save()){

                $compra->id_utilizador = $profile->user_iduser;
                $compra->id_producao = $model->id;
                $compra->quantidade = $model->quantidade_producao;

                $total = $model->quantidade_producao * $model->preco_kilo;

                $compra->preco_total = $total;
                $compra->data = date('Y-m-d');
                $compra->estado = 'Em Analise';


                if($compra->save()){
                    $cultivo = Cultivo::find()->where(['id' => $model->id_cultivo])->one();
                    if($cultivo){
                      $produtofind = Produto::find()->where(['nome'=>$cultivo->nome_do_planteio])->One();
                      if($produtofind){

                          $produtofind->photo = $model->photo;
                          $produtofind->data_registo = date('Y-m-d');

                          if($produtofind->save()){

                              $stockfind = Stock::find()->where(['id_produto'=>$produtofind->id])->One();
                              if($stockfind){

                                  $quant = $stockfind->quantidade;
                                  $stockfind->quantidade = $quant + $model->quantidade_producao;

                                  if($stockfind->save()){
                                      return $this->redirect(['compra/index']);
                                  }
                              }
                          }

                      }else {

                          $produto->id_compra = $compra->id;
                          $produto->nome = $model->descricao;
                          $produto->descricao = $model->descricao;
                          $produto->preco = $model->preco_kilo;
                          $produto->photo = $model->photo;
                          $produto->data_registo = date('Y-m-d');
                          $produto->status = 10;

                          if($produto->save()){

                              $stock->id_produto = $produto->id;
                              $stock->id_utilizador = $profile->user_iduser;
                              $stock->quantidade = $model->quantidade_producao;
                              $stock->data_registo = date('Y-m-d');

                              if($stock->save()){
                                  return $this->redirect(['compra/index']);
                              }

                          }

                      }
                    }
                }
            }
        }
    }

    /**
     * Updates an existing Producao model.
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
          $caminho = \Yii::$app->params['producao'];
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

    public function actionConfirmar($id){

        $searchModel = new ProducaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = $this->findModel($id);
        if($model){

            $model->estado = 'Confirmado';
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
       }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing Producao model.
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
     * Finds the Producao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Producao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Producao::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
