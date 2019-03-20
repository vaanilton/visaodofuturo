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

/**
 * Site controller
 */
class FornecedorController extends Controller
{
    /**
     * {@inheritdoc}
     */
     public function behaviors(){
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
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex(){

        $id = Yii::$app->user->identity['id'];
        $id_fornecedor = Fornecedor::find()->where(['user_iduser' => $id])->One();

        $modelsFornecedor=(new \yii\db\Query())
        ->select(['id', 'nome','sobrenome', 'sexo','endereco', 'contacto as telefone', 'photo','tipo', 'data_registo', 'bi', 'nif', 'numero_agregado','grau_parentesco','id_utilizador'])
        ->from('Fornecedor')
        ->where(['status' => 10,'id'=>$id_fornecedor])
        ->One();

        $modelsUsers=(new \yii\db\Query())
        ->select(['p.nome as nome', 'p.sobrenome','telefone', 'endereco','p.photo as photo','u.id', 'p.tipo'])
        ->from('user u')
        ->join('join','profile p','p.user_iduser = u.id')
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


        if(!Yii::$app->user->isGuest){

            $profile = Fornecedor::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
            if(!$profile){
              Yii::$app->user->logout();
              return Yii::$app->response->redirect(Url::to(['site/login']));
            }else if($profile->tipo == 'Agricultor'){
              $this->layout = 'main2';
              return $this->render('../Fornecedores/index',[
                  'modelsCultivo'=>$modelsCultivo,
                  'modelsGado'=>$modelsGado,
              ]);
            }else if($profile->tipo == 'Pastor'){
              $this->layout = 'main2';
              return $this->render('../Fornecedores/index',[
                  'modelsCultivo'=>$modelsCultivo,
                  'modelsGado'=>$modelsGado,
              ]);
            }
        }

        return $this->render('index',[
            'modelsUsers'=>$modelsUsers
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
    public function actionInicial(){

        $this->layout = 'main';
        return $this->goHome();
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
