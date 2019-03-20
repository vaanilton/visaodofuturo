<?php

namespace frontend\controllers;

use Yii;
use frontend\models\User;
use frontend\models\UserSearch;
use frontend\models\SignupForm;
use frontend\models\Fornecedor;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\uploadedFile;
use yii\data\Pagination;
use yii\helpers\Html;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
      $model = new SignupForm();
      $modelProfile = new Profile();

      $searchModel = new UserSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      $modelsUsers=(new \yii\db\Query())
      ->select(['p.nome','username', 'telefone', 'endereco','photo','u.id', 'p.tipo'])
      ->from('user u')
      ->join('join','profile p','p.user_iduser = u.id')
      ->where(['status' => 10]);

      $pages = new Pagination(['totalCount' => $modelsUsers->count(), 'pageSize'=>12]);
      $modelsUsers = $modelsUsers->offset($pages->offset)
          ->limit($pages->limit)
          ->all();

      if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
           Yii::$app->response->format = 'json';
           return ActiveForm::validate($model);
       }

      //create user
      if ($model->load(Yii::$app->request->post()) && $modelProfile->load(Yii::$app->request->post()) ) {

          if ($user = $model->signup()) {
              $modelProfile->user_iduser = $user->id;
              $modelProfile->data_registo = date('Y-m-d');

              $emagem_nome = Yii::$app->security->generateRandomString();
              $caminho = \Yii::$app->params['user'];
              $file = $modelProfile->photo = UploadedFile::getInstance($modelProfile, 'photo');

              if($file){
                   $modelProfile->photo->saveAs($caminho.$emagem_nome.'.'.$modelProfile->photo->extension );
                   $modelProfile->photo = $caminho.$emagem_nome.'.'.$modelProfile->photo->extension ;
                   $modelProfile->estra = $modelProfile->photo;
              }else $modelProfile->photo = $caminho.'utilizador.jpg' ;

              if($modelProfile->save())
                return $this->redirect(['index']);
          }
      }

      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
          'modelsUsers'=>$modelsUsers,
          'pages'=>$pages,
          'model' => $model,
          'modelProfile'=>$modelProfile
      ]);
    }

    public function actionBloquiado(){

      $model = new SignupForm();
      $modelProfile = new Profile();

      $searchModel = new UserSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      $modelsUsers=(new \yii\db\Query())
      ->select(['p.nome','username', 'telefone', 'endereco','photo','u.id', 'p.tipo'])
      ->from('user u')
      ->join('join','profile p','p.user_iduser = u.id')
      ->where(['status' => 0]);

      $pages = new Pagination(['totalCount' => $modelsUsers->count(), 'pageSize'=>12]);
      $modelsUsers = $modelsUsers->offset($pages->offset)
          ->limit($pages->limit)
          ->all();

      return $this->render('bloquiado', [

          'modelsUsers'=>$modelsUsers,
          'pages'=>$pages,
          'model' => $model,
          'modelProfile'=>$modelProfile
      ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
     {
         $model = new SignupForm();
         $modelProfile = new Profile();

         if ($model->load(Yii::$app->request->post()) && $modelProfile->load(Yii::$app->request->post()) ) {

             if ($user = $model->signup()) {

                 $modelProfile->user_iduser = $user->id;
                 $modelProfile->data_registo = date('Y-m-d');

                 $emagem_nome = Yii::$app->security->generateRandomString();
                 $file = $modelProfile->photo = UploadedFile::getInstance($modelProfile, 'photo');
                 $caminho = \Yii::$app->params['user'];
                 if($file){

                      $modelProfile->photo->saveAs($caminho.$emagem_nome.'.'.$modelProfile->photo->extension );
                      $modelProfile->photo = $caminho.$emagem_nome.'.'.$modelProfile->photo->extension ;
                      $modelProfile->estra = $modelProfile->photo;

                 }else $modelProfile->photo = $caminho.'utilizador.jpg' ;

                 if($modelProfile->save()){

                      if($modelProfile->tipo == 'Adiministrador'){

                          $auth = Yii::$app->authManager;
                          $authorRole = $auth->getRole('Adiministrador');
                          $auth->assign($authorRole, $user->id);

                      }else if($modelProfile->tipo == 'Operador'){

                          $auth = Yii::$app->authManager;
                          $authorRole = $auth->getRole('Operador');
                          $auth->assign($authorRole, 42);

                      }elseif($modelProfile->tipo == 'Gestor'){

                          $auth = Yii::$app->authManager;
                          $authorRole = $auth->getRole('Gestor');
                          $auth->assign($authorRole, $user->getId());

                      }else if($modelProfile->tipo == 'Fiel_Armazen'){

                          $auth = Yii::$app->authManager;
                          $authorRole = $auth->getRole('Fiel_Armazen');
                          $auth->assign($authorRole, $user->getId());

                      }
                     return $this->redirect(['view', 'id' => $user->id]);
                 }

             }
             else{
                 return $this->render('create', [
                                 'model' => $model,
                                 'modelProfile'=>$modelProfile
                             ]);
             }

         } else {
             return $this->render('create', [
                 'model' => $model,
                 'modelProfile'=>$modelProfile
             ]);
         }
     }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
     public function actionUpdate($id){
       $this->layout = 'main2';
         $model = User::find()->where(['id'=>$id])->one();
         $profile = Fornecedor::find()->where(['user_iduser'=>$model->id])->one();

         if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
             Yii::$app->response->format = 'json';
             return ActiveForm::validate($model);
         }


         if ($model->load(Yii::$app->request->post())) {

           if($model->password){
               $model->password_hash = Yii::$app->security->generatePasswordHash($model->password);
           }

           if($model->save()){
               Yii::$app->session->setFlash('success', "success");
           }

         }

         if ($profile->load(Yii::$app->request->post())) {

             $emagem_nome = Yii::$app->security->generateRandomString();
             $file = $profile->photo = UploadedFile::getInstance($profile, 'photo');
             $caminho = \Yii::$app->params['user'];

             if($file){

                  $profile->photo->saveAs($caminho.$emagem_nome.'.'.$profile->photo->extension );
                  $profile->photo = $caminho.$emagem_nome.'.'.$profile->photo->extension ;
                  $profile->estra = $profile->photo;

             }else $profile->photo = $profile->estra;

             if($profile->save() ){
                 //Yii::$app->session->setFlash('success', "success");
             }
         }
         return $this->render('update', [
             'model' => $model,
             'profile' => $profile,
         ]);
     }


     public function actionPesquisar($nome){

         $modelsUserss=(new \yii\db\Query())
         ->select(['p.nome','username', 'telefone', 'endereco','photo','u.id', 'p.tipo'])
         ->from('user u')
         ->join('join','profile p','p.user_iduser = u.id')
         ->where(['p.nome' => $nome]);

         $pages = new Pagination(['totalCount' => $modelsUsers->count(), 'pageSize'=>12]);
         $modelsUsers = $modelsUsers->offset($pages->offset)
             ->limit($pages->limit)
             ->all();

         return $this->render('index', [
             'modelsUserss' => $modelsUserss
         ]);
     }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionApagar($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }


    public function actionBloquear($id){

        $model = User::find()->where(['id' => $id])->one();

        if($id == 1){
            Yii::$app->session->setFlash('error', "Nao tens permissão de apagar esta conta!");

        }elseif (Yii::$app->user->identity->id == $id) {
          if($model->status == 10){
              $model->status = 0;
              if($model->save()){
                Html::a('<em class="fa fa-power-off"></em>&nbsp;Logout', ['site/logout'], ['data' => ['method' => 'post']]);
              }
          }
        }else{

            if($model->status == 10){
                $model->status = 0;
                if($model->save()){
                  Html::a('<em class="fa fa-power-off"></em>&nbsp;Logout', ['site/logout'], ['data' => ['method' => 'post']]);
                }
            }
        }
            return $this->redirect(['index']);
    }

    public function actionDesbloquear($id){

        $model = User::find()->where(['id' => $id])->one();

        if($id == 1){
            Yii::$app->session->setFlash('error', "Nao tens permissão de apagar esta conta!");

        }elseif (Yii::$app->user->identity->id == $id) {
          if($model->status == 0){
              $model->status = 10;
              if($model->save()){
                Html::a('<em class="fa fa-power-off"></em>&nbsp;Logout', ['site/logout'], ['data' => ['method' => 'post']]);
              }
          }
        }else{

            if($model->status == 0){
                $model->status = 10;
                if($model->save()){
                  Html::a('<em class="fa fa-power-off"></em>&nbsp;Logout', ['site/logout'], ['data' => ['method' => 'post']]);
                }
            }
        }
            return $this->redirect(['index']);
    }


    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
