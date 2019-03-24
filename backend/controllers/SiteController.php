<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\SignupForm;
use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\uploadedFile;
use app\models\UploadForm;
use common\models\User;
use backend\models\profile;
use backend\models\Estado;
use abhimanyu\systemInfo\SystemInfo;
use yii\helpers\Url;
use backend\models\Fornecedor;
use backend\models\Stock;
use backend\models\StockSearch;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
      return [
          'access' => [
              'class' => AccessControl::className(),
              'rules' => [
                  [
                      'actions' => ['login', 'error', 'request-password-reset','signup','create'],
                      'allow' => true,
                  ],
                  [
                      'actions' => ['logout', 'index', 'signup','header','left', 'change_password','registrar','file','upload_file','backofice','dashboard','init','create','cultivo'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],

              ],
          ],
          'verbs' => [
              'class' => VerbFilter::className(),
              'actions' => [
                  'logout' => ['post'],
              ],
          ],
      ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    public function actionError()
    {
        if($error = Yii::app()->errorHandler->error){
            if(Yii::app()->request->isAjaxRequest)
              echo $error['message'];
            else
              $this->render('error',$error);
        }
        return $this->render('index');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */



    public function actionIndex(){

        $Utilizador_masculino = (new \yii\db\Query())
        ->select(['count(us.id) as total'])
        ->from('Profile pr')
        ->join('join','User us','pr.user_iduser = us.id')
        ->where(['pr.sexo'=>'Masculino'])
        ->count();

        $Utilizador_feminino = (new \yii\db\Query())
        ->select(['count(us.id) as total'])
        ->from('Profile pr ')
        ->join('join','User us','pr.user_iduser = us.id')
        ->where(['pr.sexo'=>'Feminino'])
        ->count();


        $query_producao_gado = (new \yii\db\Query())
        ->select(['COUNT(prd.id)'])
        ->from('producao prd')
        ->where('prd.id_gado = gd.id AND prd.tipo = "Picuaria"');
        $modelsProducaoGado = (new \yii\db\Query())
        ->select([
                'producao' => $query_producao_gado,
                'count(gd.id)as top', 'gd.quantidade',
                'fr.id', 'fr.nome', 'fr.sobrenome', 'fr.photo'
              ])
        ->from('gado gd')
        ->join('join','Fornecedor fr','gd.id_fornecedor = fr.id')
        ->where(['gd.status'=> 10, 'fr.status'=>10, 'fr.tipo'=>"Agricultor-Pastor"])
        ->groupBy(['fr.id'])
        ->orderBy(['top' => SORT_DESC])
        ->limit(10)->all();


        $query_producao_cultivo = (new \yii\db\Query())
        ->select(['COUNT(prd.id)'])
        ->from('producao prd')
        ->where('prd.id_cultivo = cl.id AND prd.tipo = "Agricula"');
        $modelsProducaoAgricula = (new \yii\db\Query())
        ->select([
                'producao' => $query_producao_cultivo,
                'count(cl.id)as top',
                'fr.id', 'fr.nome', 'fr.sobrenome', 'fr.photo'
              ])
        ->from('cultivo cl')
        ->join('join','Fornecedor fr','cl.id_fornecedor = fr.id')
        ->where(['cl.status'=> 10, 'fr.status'=>10, 'fr.tipo'=>"Agricultor-Pastor"])
        ->groupBy(['fr.id'])
        ->orderBy(['top' => SORT_DESC])
        ->limit(10)->all();

        $modelsCultivo = (new \yii\db\Query())
        ->select([
                'count(cl.id)as top','nome_do_planteio','data_do_planteio', 'id_fornecedor'
              ])
        ->from('cultivo cl')
        ->where(['cl.status'=> 10])
        ->groupBy(['cl.nome_do_planteio'])
        ->limit(10)->all();

        $modelsGado = (new \yii\db\Query())
        ->select([
                'count(cl.id)as top','nome', 'id_fornecedor' , 'quantidade'
              ])
        ->from('Gado cl')
        ->where(['cl.status'=> 10])
        ->groupBy(['cl.nome'])
        ->limit(10)->all();

        $modelsTotalUtilizador = (new \yii\db\Query())
        ->select([
                'count(p.user_iduser) as total'
              ])
        ->from('profile p')
        ->join('join','User u','p.user_iduser = u.id')
        ->count();;

        /*echo "<pre>";
        print_r($Utilizador_feminino);
        die;
        /*$modelsCompra = (new \yii\db\Query())
        ->select([
                'count(cp.id)as total'
              ])
        ->from('compra cp')
        ->join('join','Producao prd','cp.id_producao = prd.id');

        $modelsTotalCompra = (new \yii\db\Query())
        ->select([
                'compra' => $modelsCompra,
                'count(prd.id)as top',
                'fr.id', 'fr.nome', 'fr.sobrenome', 'fr.photo'
              ])
        ->from('Producao prd', 'Cultivo cl')
        ->join('join','Fornecedor fr','cl.id_fornecedor = fr.id', 'prd.id_cultivo = cl.id')
        ->where(['prd.status'=> 10, 'fr.status'=>10])
        ->groupBy(['fr.id'])
        ->orderBy(['top' => SORT_DESC])
        ->limit(10)->all();

        echo "<pre>";
        print_r($modelsTotalCompra);
        die;*/

        if(!Yii::$app->user->isGuest){

            $profile = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
            if(!$profile){
              Yii::$app->user->logout();
              return Yii::$app->response->redirect(Url::to(['site/login']));

              //Caso for Adiministrador
            }else if($profile->tipo === 'Adiministrador'){

              return $this->render('index_admin',[
                'Utilizador_masculino'=>$Utilizador_masculino,
                'Utilizador_feminino'=>$Utilizador_feminino,
                'modelsProducaoAgricula'=>$modelsProducaoAgricula,
                'modelsProducaoGado'=>$modelsProducaoGado,
                'modelsCultivo'=>$modelsCultivo,
                'modelsGado'=>$modelsGado,
                'modelsTotalUtilizador' => $modelsTotalUtilizador,
              ]);

            }else if($profile->tipo === 'Gestor'){

              return $this->render('index_admin',[
                'Utilizador_masculino'=>$Utilizador_masculino,
                'Utilizador_feminino'=>$Utilizador_feminino,
                'modelsProducaoAgricula'=>$modelsProducaoAgricula,
                'modelsProducaoGado'=>$modelsProducaoGado,
                'modelsCultivo'=>$modelsCultivo,
                'modelsGado'=>$modelsGado,
                'modelsTotalUtilizador' => $modelsTotalUtilizador,
              ]);

            }else if($profile->tipo === 'Operador'){

              $model = new Fornecedor();
              $user = new SignupForm();

              return $this->render('../fornecedor/create', [
                  'model' => $model,
                  'user' => $user,
              ]);

            }else if($profile->tipo === 'Fiel_armazen'){

              $searchModel = new StockSearch();
              $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

              return $this->render('../stock/index', [
                  'searchModel' => $searchModel,
                  'dataProvider' => $dataProvider,
              ]);

            }else if($profile->tipo === 'Fornecedores'){

              return $this->render('index_fornecedores');

            }else if($profile->tipo === 'Backoffice'){

              $this->layout = 'main_backofice';

              $modelsEquipa=(new \yii\db\Query())
              ->select(['e.nome as nome', 'e.sobrenome','facebook', 'google','e.photo as photo','e.id', 'e.tipo', 'tweter'])
              ->from('Equipa e')
              ->where(['e.status' => 10])
              ->limit(3)
              ->all();

              $modelsVisaoPresedente=(new \yii\db\Query())
              ->select(['descricao', 'status', 'id', 'photo', 'nome', 'sobrenome'])
              ->from(' visao_presedente v')
              ->where(['v.status' => 10])
              ->limit(3)
              ->all();

              $modelsAreaIntervensao=(new \yii\db\Query())
              ->select(['id', 'icone','titulo', 'descricao','status'])
              ->from('Area_Intervencao e')
              ->where(['e.status' => 10])
              ->limit(3)
              ->all();

              $modelsEspecialisasao=(new \yii\db\Query())
              ->select(['id', 'icone','titulo', 'descricao','status'])
              ->from('Area_Especialisacao e')
              ->where(['e.status' => 10])
              ->limit(3)
              ->all();

              $modelsGaleria=(new \yii\db\Query())
              ->select(['id','e.descricao', 'e.photo as photo'])
              ->from('Galeria e')
              ->where(['e.status' => 10])
              ->limit(3)
              ->all();

              $modelsIntervensaoSocial=(new \yii\db\Query())
              ->select(['descricao', 'status', 'id', 'photo', 'nome'])
              ->from('Intervensao_Social v')
              ->where(['v.status' => 10])
              ->limit(3)
              ->all();

              $modelsInformacaoContacto=(new \yii\db\Query())
              ->select(['telefone', 'email', 'localisacao', 'hora_funcionamento', 'id'])
              ->from('Informacao_Contacto v')
              ->where(['v.status' => 10])
              ->limit(3)
              ->all();

              return $this->render('../Backoffice/index', [
                  'modelsEquipa' => $modelsEquipa,
                  'modelsVisaoPresedente' => $modelsVisaoPresedente,
                  'modelsAreaIntervensao' => $modelsAreaIntervensao,
                  'modelsEspecialisasao' => $modelsEspecialisasao,
                  'modelsGaleria' => $modelsGaleria,
                  'modelsIntervensaoSocial' => $modelsIntervensaoSocial,
                  'modelsInformacaoContacto' => $modelsInformacaoContacto,
              ]);

            }
        }

    }


    public function actionDashboard(){
        return $this->render('index_dashboard');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin(){

        $this->layout = 'main_login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {

          $profile = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
          $modeEstado = new Estado();
          if($profile){

              //$modeEstado->user_iduser = $profile->user_iduser;
              //$modeEstado->data_hr_inicio = date('Y-m-d H:i:s');

              //$modeEstado->data = date('Y-m-d');

              $profile->estado='oline';
              $profile->save();
              //$modeEstado->save();
          }

          return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login1', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout(){

        $estado = array();
        $profile = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
        $modeEstado = Estado::find()->where(['user_iduser' => $profile->user_iduser])->all();

        if($profile){

            $profile->estado='offline';
            $profile->save();

            if($modeEstado){

                foreach ($modeEstado as $key => $dados) {
                  $estado = $dados['id'];
                }
                  $modeEstado2 = Estado::find()->where(['id'=> $estado,'user_iduser' => $profile->user_iduser])->one();
                  $modeEstado2->data_hr_fim = date('Y-m-d H:i:s');

                  $modeEstado2->save();
            }

            Yii::$app->user->logout();

            return $this->goHome();
        }
    }

    /*public function actionSignup(){
        $model = new registrar();

        if ($model->load(Yii::$app->request->post())) {
          if($model->validate()){
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;

            $user->username = $this->username;
            $user->email = $this->email;

            $emagem_nome = $model->username;
            $model->photo = uploadedFile::getInstance($model,'photo');
            $model->photo->saveAs('images/'.$emagem_nome.'.'.$model->photo->extension );

            $model->photo = 'images/'.$emagem_nome.'.'.$model->photo->extension ;

            $user->setPassword($this->password);
            $user->generateAuthKey();

            if($model->save()){
              Yii::$app->session->setFlash('success', 'Tou have successfully signup user.');
              return $this->refresh();
            }
          }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
  }*/

    public function actionBackofice(){
        $this->layout = 'main_backofice';

        $modelsEquipa=(new \yii\db\Query())
        ->select(['e.nome as nome', 'e.sobrenome','facebook', 'google','e.photo as photo','e.id', 'e.tipo', 'tweter'])
        ->from('Equipa e')
        ->where(['e.status' => 10])
        ->limit(3)
        ->all();

        $modelsVisaoPresedente=(new \yii\db\Query())
        ->select(['descricao', 'status', 'id', 'photo', 'nome', 'sobrenome'])
        ->from(' visao_presedente v')
        ->where(['v.status' => 10])
        ->limit(3)
        ->all();

        $modelsAreaIntervensao=(new \yii\db\Query())
        ->select(['id', 'icone','titulo', 'descricao','status'])
        ->from('Area_Intervencao e')
        ->where(['e.status' => 10])
        ->limit(3)
        ->all();

        $modelsEspecialisasao=(new \yii\db\Query())
        ->select(['id', 'icone','titulo', 'descricao','status'])
        ->from('Area_Especialisacao e')
        ->where(['e.status' => 10])
        ->limit(3)
        ->all();

        $modelsGaleria=(new \yii\db\Query())
        ->select(['id','e.descricao', 'e.photo as photo'])
        ->from('Galeria e')
        ->where(['e.status' => 10])
        ->limit(3)
        ->all();

        $modelsIntervensaoSocial=(new \yii\db\Query())
        ->select(['descricao', 'status', 'id', 'photo', 'nome'])
        ->from('Intervensao_Social v')
        ->where(['v.status' => 10])
        ->limit(3)
        ->all();

        $modelsInformacaoContacto=(new \yii\db\Query())
        ->select(['telefone', 'email', 'localisacao', 'hora_funcionamento', 'id'])
        ->from('Informacao_Contacto v')
        ->where(['v.status' => 10])
        ->limit(3)
        ->all();

        return $this->render('backofice', [
            'modelsEquipa' => $modelsEquipa,
            'modelsVisaoPresedente' => $modelsVisaoPresedente,
            'modelsAreaIntervensao' => $modelsAreaIntervensao,
            'modelsEspecialisasao' => $modelsEspecialisasao,
            'modelsGaleria' => $modelsGaleria,
            'modelsIntervensaoSocial' => $modelsIntervensaoSocial,
            'modelsInformacaoContacto' => $modelsInformacaoContacto,
        ]);

    }

    public function actionRequestPasswordReset(){

        $this->layout = 'main_login';
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token){

        $this->layout = 'main_login';
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


    public function actionProfile(){

       if (Yii::$app->user->isGuest) {
           return $this->goHome();
       }
       $id = Yii::$app->user->id;

       $model = SignupForm::findModel($id);

       if ($model->load(Yii::$app->request->post())) {

           $model->save();

           return $this->redirect(['/event/index']);
       } else {
           return $this->redirect(['user/view/?id='.$id]);

       }
    }
}
