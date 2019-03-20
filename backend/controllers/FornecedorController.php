<?php

namespace backend\controllers;

use Yii;
use backend\models\Profile;
use backend\models\Fornecedor;
use backend\models\SignupForm;
use backend\models\FornecedorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\uploadedFile;
use yii\data\Pagination;
use backend\models\CultivoSearch;
use backend\models\GadoSearch;
use backend\models\EmprestimoSearch;
use backend\models\Emprestimo;
use backend\models\User;
use yii\data\ActiveDataProvider;
use kartik\mpdf\Pdf;
use backend\models\Producao;
/**
 * FornecedorController implements the CRUD actions for Fornecedor model.
 */
class FornecedorController extends Controller
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
     * Lists all Fornecedor models.
     * @return mixed
     */
    public function actionIndex(){
        //$this->layout = 'main1';
        $model = new Fornecedor();

        $searchModel = new FornecedorSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $modelsFornecedor=(new \yii\db\Query())
        ->select(['id', 'nome','sobrenome', 'sexo','endereco', 'contacto as telefone', 'photo','id', 'tipo', 'data_registo', 'bi', 'nif', 'numero_agregado','grau_parentesco','id_utilizador'])
        ->from('Fornecedor')
        ->where(['status' => 10]);

        $pages = new Pagination(['totalCount' => $modelsFornecedor->count(), 'pageSize'=>4]);
        $modelsFornecedor = $modelsFornecedor->offset($pages->offset)
            ->limit($pages->limit)
            ->all();



        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelsFornecedor'=>$modelsFornecedor,
            'pages'=>$pages,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Fornecedor model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id){

        $query = (new \yii\db\Query())
        ->select(['pr.id', 'id_cultivo', 'id_gado', 'tipo', 'quantidade_producao', 'quantidade_perda',
                  'data_colheita', 'preco_kilo', 'pr.data_registo', 'pr.photo', 'pr.estado', 'pr.designacao',
                  'pr.status'])
        ->from('Producao pr')
        ->join('join','Gado cl','pr.id_gado = cl.id')
        ->where(['pr.status'=>10, 'cl.id_fornecedor' => $id, 'cl.status'=>10]);

        $producaoQuery = (new \yii\db\Query())
        ->select(['pr.id', 'id_cultivo', 'id_gado', 'tipo', 'quantidade_producao', 'quantidade_perda',
                  'data_colheita', 'preco_kilo', 'pr.data_registo', 'pr.photo', 'pr.estado', 'pr.designacao',
                  'pr.status'])
        ->from('Producao pr')
        ->join('join','Cultivo cl','pr.id_cultivo = cl.id')
        ->where(['pr.status'=>10, 'cl.id_fornecedor' => $id, 'cl.status'=>10]);

        $total = $query->union($producaoQuery);

        $dataProviderProducao = new ActiveDataProvider([
            'query' => $total,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $searchModelCultivo = new CultivoSearch();
        $searchModelCultivo->id_fornecedor = $id;
        $dataProviderCultivo = $searchModelCultivo->search(Yii::$app->request->queryParams);

        $searchModelGado = new GadoSearch();
        $searchModelGado->id_fornecedor = $id;
        $dataProviderGado = $searchModelGado->search(Yii::$app->request->queryParams);

        $searchModelEmprestimo = new EmprestimoSearch();
        $searchModelEmprestimo->id_fornecedor = $id;
        $dataProviderEmprestimo = $searchModelEmprestimo->search(Yii::$app->request->queryParams);

        $modelsCultivo = (new \yii\db\Query())
        ->select([
                'cl.id','cl.id_regiao', 'descricao', 'tamanho_do_solu',
                'nome_do_planteio','data_do_planteio', 'tempo_do_cultivo', 'data_registro','cl.photo',
                'id_fornecedor'
              ])
        ->from('cultivo cl')
        ->join('join','Fornecedor fr','cl.id_fornecedor = fr.id')
        ->where(['cl.status'=> 10, 'fr.status'=>10, 'fr.id'=>$id]);

        $pages = new Pagination(['totalCount' => $modelsCultivo->count(), 'pageSize'=>12]);
        $modelsCultivo = $modelsCultivo->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $modelsGado=(new \yii\db\Query())
        ->select(['gd.id', 'id_fornecedor','gd.id_regiao', 'descricao', 'gd.nome','quantidade',
              'gd.data_registo','gd.photo'
            ])
        ->from('Gado gd')
        ->join('join','Fornecedor fr','gd.id_fornecedor = fr.id')
        ->where(['gd.status'=> 10, 'fr.status'=>10, 'fr.id'=>$id]);

        $pages = new Pagination(['totalCount' => $modelsGado->count(), 'pageSize'=>12]);
        $modelsGado = $modelsGado->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $modelCreditoG = (new \yii\db\Query())
        ->select(['pr.id', 'id_cultivo', 'id_gado', 'tipo', 'quantidade_producao', 'quantidade_perda',
                  'data_colheita', 'preco_kilo', 'pr.data_registo', 'pr.photo', 'pr.estado', 'pr.status', 'designacao'])
        ->from('Producao pr')
        ->join('join','Gado cl','pr.id_gado = cl.id')
        ->where(['pr.status'=>10, 'cl.id_fornecedor' => $id, 'cl.status'=>10]);

        $modelCredito = (new \yii\db\Query())
        ->select(['pr.id', 'id_cultivo', 'id_gado', 'tipo', 'quantidade_producao', 'quantidade_perda',
                  'data_colheita', 'preco_kilo', 'pr.data_registo', 'pr.photo', 'pr.estado', 'pr.status', 'designacao'])
        ->from('Producao pr')
        ->join('join','Cultivo cl','pr.id_cultivo = cl.id')
        ->where(['pr.status'=>10, 'cl.id_fornecedor' => $id, 'cl.status'=>10]);

        $modelCredito->union($modelCreditoG);

        $pages = new Pagination(['totalCount' => $modelCreditoG->count(), 'pageSize'=>12]);
        $modelCreditoG = $modelCreditoG->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $pages = new Pagination(['totalCount' => $modelCredito->count(), 'pageSize'=>12]);
        $modelCredito = $modelCredito->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $modelsemprestimo=(new \yii\db\Query())
        ->select(['id', 'id_fornecedor','tipo', 'nome', 'quantidade', 'data','data_devolucao', 'quantidade_monetario'])
        ->from('Emprestimo')
        ->where(['id_fornecedor' =>$id, 'estado'=> 'Debito']);

        $pages = new Pagination(['totalCount' => $modelsemprestimo->count(), 'pageSize'=>10]);
        $modelsemprestimo = $modelsemprestimo->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelsCultivo'=> $modelsCultivo,
            'modelsGado'=> $modelsGado,
            'pages'=>$pages,
            'searchModelCultivo'=> $searchModelCultivo,
            'dataProviderCultivo'=> $dataProviderCultivo,
            'searchModelGado'=> $searchModelGado,
            'dataProviderGado'=> $dataProviderGado,
            'searchModelEmprestimo'=> $searchModelEmprestimo,
            'dataProviderEmprestimo'=> $dataProviderEmprestimo,
            'modelCredito' => $modelCredito,
            'modelsemprestimo' => $modelsemprestimo,
            'dataProviderProducao' => $dataProviderProducao,
        ]);
    }

    /**
     * Creates a new Fornecedor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){

        $modelUser = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
        $model = new Fornecedor();
        $user = new SignupForm();

        if ($user->load(Yii::$app->request->post()) && $model->load(Yii::$app->request->post())){

          if ($model2 = $user->signup()) {
              $model->id_utilizador = $modelUser->user_iduser;
              $model->user_iduser = $model2->id;
              $model->data_registo = date('Y-m-d');

              $emagem_nome = Yii::$app->security->generateRandomString();
              $file = $model->photo = UploadedFile::getInstance($model, 'photo');
              $caminho = \Yii::$app->params['fornecedor'];
              if($file){
                   $model->photo->saveAs($caminho.$emagem_nome.'.'.$model->photo->extension );
                   $model->photo = $caminho.$emagem_nome.'.'.$model->photo->extension ;
                   $model->estra = $model->photo;
              }else $model->photo = $caminho.'utilizador.jpg' ;

              if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
              }
          }

        }

        return $this->render('create', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    // IMPRIMIR EMPRESTIMOS

    public function actionImprimiremprestimo($id = null){

        $plano = Emprestimo::find()
          ->where('id = :id', [':id' => $id])
          ->one();

        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('imprimirEmprestimo', [
          'model' => $plano,

        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8  ,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER  ,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssFile' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js',
            'cssInline' => '.teste-input{float:left;height: 76px;color:#0099ac;border:1px solid #c90}',
            // any css to be embedded if required
//            'cssInline' => '.kv-heading-1{font-size:18px}',
             // set mPDF properties on the fly
            'options' => ['title' => 'Visao do Futuro'],
             // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['<div><img src="../../img//logotipo.jpg" class="img-responsive zoom-img" alt="" width="100px" height="100px"><br></div>'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    // IMPRIMIR PRODUCAO

    public function actionImprimirproducao($id = null){

        $plano = Producao::find()
          ->where('id = :id', [':id' => $id])
          ->one();

        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('imprimirProducao', [
          'model' => $plano,

        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8  ,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER  ,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssFile' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js',
            'cssInline' => '.teste-input{float:left;height: 76px;color:#0099ac;border:1px solid #c90}',
            // any css to be embedded if required
//            'cssInline' => '.kv-heading-1{font-size:18px}',
             // set mPDF properties on the fly
            'options' => ['title' => 'Visao do Futuro'],
             // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['<div><img src="../../img//logotipo.jpg" class="img-responsive zoom-img" alt="" width="100px" height="100px"><br></div>'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }



    public function actionAgricultor(){

      $modelUser = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
      $model = new Fornecedor();
      $user = new SignupForm();

      if ($user->load(Yii::$app->request->post()) && $model->load(Yii::$app->request->post())){

        if ($model2 = $user->signup()) {
            $model->id_utilizador = $modelUser->user_iduser;
            $model->user_iduser = $model2->id;
            $model->data_registo = date('Y-m-d');
            $model->tipo = "Agricultor";

            $emagem_nome = Yii::$app->security->generateRandomString();
            $file = $model->photo = UploadedFile::getInstance($model, 'photo');
            $caminho = \Yii::$app->params['fornecedor'];
            if($file){
                 $model->photo->saveAs($caminho.$emagem_nome.'.'.$model->photo->extension );
                 $model->photo = $caminho.$emagem_nome.'.'.$model->photo->extension ;
                 $model->estra = $model->photo;
            }else $model->photo = $caminho.'utilizador.jpg' ;

            if($model->save()) {
              return $this->redirect(['view', 'id' => $model->id]);
            }
        }

      }
        return $this->render('agricultor', [
          'model' => $model,
          'user' => $user,
        ]);
    }

    public function actionListaragricultor(){

        $model = new Fornecedor();

        $searchModel = new FornecedorSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modelsFornecedor=(new \yii\db\Query())
        ->select(['nome','sobrenome', 'sexo','endereco', 'contacto as telefone', 'photo','id', 'tipo', 'data_registo', 'bi', 'nif'])
        ->from('Fornecedor')
        ->where(['status' => 10, 'tipo'=>'Agricultor-Pastor']);

        $pages = new Pagination(['totalCount' => $modelsFornecedor->count(), 'pageSize'=>12]);
        $modelsFornecedor = $modelsFornecedor->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
             Yii::$app->response->format = 'json';
             return ActiveForm::validate($model);
         }

        //create Agricultor
        $modelUser = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
        $model = new Fornecedor();

        if ($model->load(Yii::$app->request->post())){

          $model->id_utilizador = $modelUser->user_iduser;
          $model->tipo = "Agricultor";
          $model->data_registo = date('Y-m-d');

          $emagem_nome = Yii::$app->security->generateRandomString();
          $file = $model->photo = UploadedFile::getInstance($model, 'photo');
          $caminho = \Yii::$app->params['fornecedor'];
          if($file){
               $model->photo->saveAs($caminho.$emagem_nome.'.'.$model->photo->extension );
               $model->photo = $caminho.$emagem_nome.'.'.$model->photo->extension ;
               $model->estra = $model->photo;
          }else $model->photo = $caminho.'utilizador.jpg' ;

          if($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
          }

        }

        return $this->render('listaragricultor', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelsFornecedor'=>$modelsFornecedor,
            'pages'=>$pages,
            'model' => $model,
        ]);

    }

//Pastor

    public function actionPastor(){

      $modelUser = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
      $model = new Fornecedor();
      $user = new SignupForm();

      if ($user->load(Yii::$app->request->post()) && $model->load(Yii::$app->request->post())){

        if ($model2 = $user->signup()) {
            $model->id_utilizador = $modelUser->user_iduser;
            $model->user_iduser = $model2->id;
            $model->data_registo = date('Y-m-d');
            $model->tipo = "Pastor";

            $emagem_nome = Yii::$app->security->generateRandomString();
            $file = $model->photo = UploadedFile::getInstance($model, 'photo');
            $caminho = \Yii::$app->params['fornecedor'];
            if($file){
                 $model->photo->saveAs($caminho.$emagem_nome.'.'.$model->photo->extension );
                 $model->photo = $caminho.$emagem_nome.'.'.$model->photo->extension ;
                 $model->estra = $model->photo;
            }else $model->photo = $caminho.'utilizador.jpg' ;

            if($model->save()) {
              return $this->redirect(['view', 'id' => $model->id]);
            }
        }

      }
        return $this->render('pastor', [
          'model' => $model,
          'user' => $user,
        ]);
    }

    public function actionListarpastor(){

        $model = new Fornecedor();

        $searchModel = new FornecedorSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modelsFornecedor=(new \yii\db\Query())
        ->select(['nome','sobrenome','sexo','endereco', 'contacto as telefone','photo','id', 'tipo', 'data_registo', 'bi', 'nif'])
        ->from('Fornecedor')
        ->where(['status' => 10, 'tipo'=>'Pastor']);

        $pages = new Pagination(['totalCount' => $modelsFornecedor->count(), 'pageSize'=>12]);
        $modelsFornecedor = $modelsFornecedor->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
             Yii::$app->response->format = 'json';
             return ActiveForm::validate($model);
         }

        //create Pastor
        $modelUser = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
        $model = new Fornecedor();

        if ($model->load(Yii::$app->request->post())){

          $model->id_utilizador = $modelUser->user_iduser;
          $model->tipo = "Agricultor-Pastor";
          $model->data_registo = date('Y-m-d');

          $emagem_nome = Yii::$app->security->generateRandomString();
          $file = $model->photo = UploadedFile::getInstance($model, 'photo');
          $caminho = \Yii::$app->params['fornecedor'];
          if($file){
               $model->photo->saveAs($caminho.$emagem_nome.'.'.$model->photo->extension );
               $model->photo = $caminho.$emagem_nome.'.'.$model->photo->extension ;
               $model->estra = $model->photo;
          }else $model->photo = $caminho.'utilizador.jpg' ;

          if($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
          }

        }

        return $this->render('listarpastor', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelsFornecedor'=>$modelsFornecedor,
            'pages'=>$pages,
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing Fornecedor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id){

        $model = $this->findModel($id);
        $user = User::find()->where(['id'=>$model->user_iduser])->one();

        $model = $this->findModel($id);
        $user = User::find()->where(['id'=>$model->user_iduser])->one();

        if ($user->load(Yii::$app->request->post())) {
            if($user->password){
                //$model->password_hash = Yii::$app->security->generatePasswordHash($model->password);
            }
            if($user->save()){
                Yii::$app->session->setFlash('success', "success");
            }
        }
        if ($model->load(Yii::$app->request->post())) {

            $emagem_nome = Yii::$app->security->generateRandomString();
            $file = $model->photo = UploadedFile::getInstance($model, 'photo');
            $caminho = \Yii::$app->params['user'];

            if($file){

                 $model->photo->saveAs($caminho.$emagem_nome.'.'.$model->photo->extension );
                 $model->photo = $caminho.$emagem_nome.'.'.$model->photo->extension ;
                 $model->estra = $model->photo;

            }else $model->photo = $model->estra;

            if($model->save() ){
                Yii::$app->session->setFlash('success', "success");
            }
        }

        return $this->render('update', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Deletes an existing Fornecedor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionApagar($id){

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionBloquear($id){

        $model = Fornecedor::find()->where(['id' => $id])->one();

        if($model->status == 10){
            $model->status = 0;
            $model->save();
        }

        return $this->redirect(['index']);

    }

    /**
     * Finds the Fornecedor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fornecedor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id){
        if (($model = Fornecedor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
