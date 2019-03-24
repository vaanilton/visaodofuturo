<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Profile;
use frontend\models\Fornecedor;
use yii\helpers\Url;
use yii\data\Pagination;
use frontend\models\ProducaoSearch;
use frontend\models\Inscricao;
use frontend\models\Contacto;
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
                 'only' => ['logout', 'signup'],
                 'rules' => [
                     [
                         'actions' => ['signup','logout'],
                         'allow' => true,
                         'roles' => ['?'],
                     ],
                     [
                         'actions' => ['logout','index'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
   public function actionInicial(){
       $this->layout = 'main';
       $modelsVisaoPresedente=(new \yii\db\Query())
       ->select(['descricao', 'status', 'id', 'photo', 'nome', 'sobrenome'])
       ->from(' visao_presedente v')
       ->where(['v.status' => 10])
       ->all();

       $modelsAreaIntervensao=(new \yii\db\Query())
       ->select(['id', 'icone','titulo', 'descricao','status'])
       ->from('Area_Intervencao e')
       ->where(['e.status' => 10])
       ->all();

       $modelsEquipa=(new \yii\db\Query())
       ->select(['e.nome as nome', 'e.sobrenome','facebook', 'google','e.photo as photo','e.id', 'e.tipo', 'tweter'])
       ->from('Equipa e')
       ->where(['e.status' => 10])
       ->all();

       $modelsGaleria=(new \yii\db\Query())
       ->select(['id', 'descricao', 'photo'])
       ->from('Galeria')
       ->where(['status' => 10])
       ->all();

       $modelsFornecedor=(new \yii\db\Query())
       ->select(['id', 'nome','sobrenome', 'sexo','endereco', 'contacto as telefone', 'photo','tipo', 'data_registo', 'bi', 'nif', 'numero_agregado','grau_parentesco','id_utilizador'])
       ->from('Fornecedor')
       ->where(['status' => 10])
       ->all();

       $modelsEspecialisasao=(new \yii\db\Query())
       ->select(['id', 'icone','titulo', 'descricao','status'])
       ->from('Area_Especialisacao e')
       ->where(['e.status' => 10])
       ->all();

       $modelsIntervensaoSocial=(new \yii\db\Query())
       ->select(['descricao', 'status', 'id', 'photo', 'nome'])
       ->from('Intervensao_Social v')
       ->where(['v.status' => 10])
       ->all();

       $modelsInformacaoContacto=(new \yii\db\Query())
       ->select(['telefone', 'email', 'localisacao', 'hora_funcionamento', 'id'])
       ->from('Informacao_Contacto v')
       ->where(['v.status' => 10])
       ->limit(4)
       ->all();

       $modelsAnuncio=(new \yii\db\Query())
       ->select(['descricao', 'requisitos','status','data', 'id'])
       ->from('Anuncio v')
       ->where(['v.status' => 10])
       ->all();

       return $this->render('index',[
           'modelsUsers'=>$modelsEquipa,
           'modelsFornecedor'=>$modelsFornecedor,
           'modelsGaleria'=>$modelsGaleria,
           'modelsVisaoPresedente'=>$modelsVisaoPresedente,
           'modelsAreaIntervensao'=>$modelsAreaIntervensao,
           'modelsEspecialisasao' => $modelsEspecialisasao,
           'modelsIntervensaoSocial' => $modelsIntervensaoSocial,
           'modelsInformacaoContacto' => $modelsInformacaoContacto,
           'modelsAnuncio' => $modelsAnuncio,
       ]);
   }


    public function actionIndex(){
        $id = Yii::$app->user->identity['id'];
        $id_fornecedor = Fornecedor::find()->where(['user_iduser' => $id])->One();
        $this->layout = 'main';

        $FornecedorLogado=(new \yii\db\Query())
        ->select(['id', 'nome','sobrenome', 'sexo','endereco', 'contacto as telefone', 'photo','tipo', 'data_registo', 'bi', 'nif', 'numero_agregado','grau_parentesco','id_utilizador'])
        ->from('Fornecedor')
        ->where(['status' => 10,'id'=>$id_fornecedor])
        ->all();

        $modelsAreaIntervensao=(new \yii\db\Query())
        ->select(['id', 'icone','titulo', 'descricao','status'])
        ->from('Area_Intervencao e')
        ->where(['e.status' => 10])
        ->all();


        $modelsVisaoPresedente=(new \yii\db\Query())
        ->select(['descricao', 'status', 'id', 'photo', 'nome', 'sobrenome'])
        ->from(' visao_presedente v')
        ->where(['v.status' => 10])
        ->all();

        $modelsEquipa=(new \yii\db\Query())
        ->select(['e.nome as nome', 'e.sobrenome','facebook', 'google','e.photo as photo','e.id', 'e.tipo', 'tweter'])
        ->from('Equipa e')
        ->where(['e.status' => 10])
        ->all();

        $modelsGaleria=(new \yii\db\Query())
        ->select(['id', 'descricao', 'photo'])
        ->from('Galeria')
        ->where(['status' => 10])
        ->all();

        $modelsFornecedor=(new \yii\db\Query())
        ->select(['id', 'nome','sobrenome', 'sexo','endereco', 'contacto as telefone', 'photo','tipo', 'data_registo', 'bi', 'nif', 'numero_agregado','grau_parentesco','id_utilizador'])
        ->from('Fornecedor')
        ->where(['status' => 10])
        ->all();

        $modelsCultivo = (new \yii\db\Query())
        ->select([
                'cl.id','cl.id_regiao', 'descricao', 'tamanho_do_solu',
                'nome_do_planteio','data_do_planteio', 'tempo_do_cultivo', 'data_registro','cl.photo',
                'id_fornecedor'
              ])
        ->from('cultivo cl')
        ->join('join','Fornecedor fr','cl.id_fornecedor = fr.id')
        ->where(['cl.status'=> 10, 'fr.status'=>10, 'fr.id'=>$id_fornecedor]);

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
        ->where(['gd.status'=> 10, 'fr.status'=>10, 'fr.id'=>$id_fornecedor]);

        $pages = new Pagination(['totalCount' => $modelsGado->count(), 'pageSize'=>12]);
        $modelsGado = $modelsGado->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $modelsEspecialisasao=(new \yii\db\Query())
        ->select(['id', 'icone','titulo', 'descricao','status'])
        ->from('Area_Especialisacao e')
        ->where(['e.status' => 10])
        ->all();

        $modelsIntervensaoSocial=(new \yii\db\Query())
        ->select(['descricao', 'status', 'id', 'photo', 'nome'])
        ->from('Intervensao_Social v')
        ->where(['v.status' => 10])
        ->all();

        $modelsInformacaoContacto=(new \yii\db\Query())
        ->select(['telefone', 'email', 'localisacao', 'hora_funcionamento', 'id'])
        ->from('Informacao_Contacto v')
        ->where(['v.status' => 10])
        ->limit(4)
        ->all();

        $modelsAnuncio=(new \yii\db\Query())
        ->select(['descricao', 'requisitos','status','data', 'id'])
        ->from('Anuncio v')
        ->where(['v.status' => 10])
        ->all();

        $searchModel = new ProducaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'producao');

        if(!Yii::$app->user->isGuest){

            $fornecedor = Fornecedor::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
            if(!$fornecedor){
              /*$profile = Profile::find()->where(['user_iduser'=>Yii::$app->user->identity->id])->one();
              if(!$profile){
                return $this->render('../Fornecedores/index');
              }*/

              Yii::$app->user->logout();
              return Yii::$app->response->redirect(Url::to(['site/login']));

            }else if($fornecedor->tipo == 'Agricultor-Pastor'){
              $this->layout = 'main2';
              return $this->render('../Fornecedores/index',[
                  'modelsCultivo'=>$modelsCultivo,
                  'modelsGado'=>$modelsGado,
                  'FornecedorLogado'=>$FornecedorLogado,
                  'searchModel' => $searchModel,
                  'dataProvider' => $dataProvider,
              ]);
            }else if($fornecedor->tipo == 'Pastor'){
              $this->layout = 'main2';
              return $this->render('../Fornecedores/index',[
                  'modelsCultivo'=>$modelsCultivo,
                  'modelsGado'=>$modelsGado,
                  'FornecedorLogado'=>$FornecedorLogado,
                  'searchModel' => $searchModel,
                  'dataProvider' => $dataProvider,
              ]);
            }
        }


        $model = new Inscricao();

        if ($model->load(Yii::$app->request->post())) {
          if($model->save())
            return $this->redirect(['index']);
        }

        $modelContacto = new Contacto();
        if ($modelContacto->load(Yii::$app->request->post()) && $modelContacto->validate()) {
            if ($modelContacto->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('index',[
            'modelsUsers'=>$modelsEquipa,
            'modelsFornecedor'=>$modelsFornecedor,
            'modelsGaleria'=>$modelsGaleria,
            'modelsVisaoPresedente' => $modelsVisaoPresedente,
            'modelsAreaIntervensao' => $modelsAreaIntervensao,
            'modelsEspecialisasao' => $modelsEspecialisasao,
            'modelsIntervensaoSocial' => $modelsIntervensaoSocial,
            'modelsInformacaoContacto' => $modelsInformacaoContacto,
            'modelsAnuncio' => $modelsAnuncio,
            'model' => $model,
            'modelContacto' => $modelContacto,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin(){
        $this->layout = 'main_login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
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
    public function actionResetPassword($token)
    {

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
}
