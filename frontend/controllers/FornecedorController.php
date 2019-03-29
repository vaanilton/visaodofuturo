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
use frontend\models\Producao;
use yii\helpers\Url;
use kartik\mpdf\Pdf;
use frontend\models\Emprestimo;
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

        $query = Producao::find()->where(['status'=>0]);

        $dataProvideProducao = new ActiveDataProvider([
          'query' => $query,
          'Pagination' =>[
            'pageSize' => 3
          ],
          'sort'=> [
            'defaultOrder' => ['name' => SORT_ASC]
          ]
        ]);


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
            }else if($profile->tipo == 'Agricultor-Pastor'){
              $this->layout = 'main2';
              return $this->render('../Fornecedores/index',[
                  'dataProvide'=>$dataProvideProducao,
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
}
