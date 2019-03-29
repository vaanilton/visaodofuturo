<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Emprestimo;
use frontend\models\EmprestimoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Profile;
use frontend\models\Fornecedor;
use yii\data\Pagination;
/**
 * EmprestimoController implements the CRUD actions for Emprestimo model.
 */
class EmprestimoController extends Controller
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
     * Lists all Emprestimo models.
     * @return mixed
     */
    public function actionIndex(){
      $this->layout = 'main2';
      $id = Yii::$app->user->identity->id;
      $id_fornecedor = Fornecedor::find()->where(['user_iduser' => $id])->One();

      $modelsemprestimo=(new \yii\db\Query())
      ->select(['id', 'id_fornecedor','tipo', 'nome', 'quantidade', 'data','data_devolucao', 'quantidade_monetario'])
      ->from('Emprestimo')
      ->where(['id_fornecedor' =>$id_fornecedor]);

      $pages = new Pagination(['totalCount' => $modelsemprestimo->count(), 'pageSize'=>10]);
      $modelsemprestimo = $modelsemprestimo->offset($pages->offset)
          ->limit($pages->limit)
          ->all();

      $searchModel = new EmprestimoSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'estrato');

      return $this->render('index', [
          'modelsemprestimo' => $modelsemprestimo,
          'pages' => $pages,
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
    }

    public function actionPendentes(){
      $this->layout = 'main2';
      $id = Yii::$app->user->identity->id;
      $id_fornecedor = Fornecedor::find()->where(['user_iduser' => $id])->One();

      $modelsemprestimo=(new \yii\db\Query())
      ->select(['id', 'id_fornecedor','tipo', 'nome', 'quantidade', 'data','data_devolucao', 'quantidade_monetario'])
      ->from('Emprestimo')
      ->where(['id_fornecedor' =>$id_fornecedor, 'estado'=> 'Debito']);

      $pages = new Pagination(['totalCount' => $modelsemprestimo->count(), 'pageSize'=>10]);
      $modelsemprestimo = $modelsemprestimo->offset($pages->offset)
          ->limit($pages->limit)
          ->all();

      $searchModel = new EmprestimoSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'pendente');

      return $this->render('pendentes', [
          'modelsemprestimo' => $modelsemprestimo,
          'pages' => $pages,
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
    }

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

}
