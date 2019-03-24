<?php

namespace backend\controllers;

use Yii;
use backend\models\HistorialGado;
use backend\models\HistorialGadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Gado;

/**
 * HistorialGadoController implements the CRUD actions for HistorialGado model.
 */
class HistorialGadoController extends Controller
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
     * Lists all HistorialGado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HistorialGadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HistorialGado model.
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
     * Creates a new HistorialGado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HistorialGado();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionAumentar($id){

        $model = new HistorialGado();
        $modelGado = Gado::find()->where(['id'=>$id])->One();

        $model->id_gado = $id;
        $model->data = date('d/m/y H:i:s');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $quant = $modelGado->quantidade + $model->quantidade;

            if($modelGado){
                $modelGado->quantidade = $quant;
                if($modelGado->save()){
                    return $this->redirect(['gado/index']);
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDiminuir($id){

        $model = new HistorialGado();
        $modelGado = Gado::find()->where(['id'=>$id])->One();

        $model->id_gado = $id;
        $model->data = date('d/m/y H:i:s');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $quant = $modelGado->quantidade - $model->quantidade;

            if($modelGado){
                $modelGado->quantidade = $quant;
                if($modelGado->save()){
                    return $this->redirect(['gado/index']);
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing HistorialGado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing HistorialGado model.
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

    /**
     * Finds the HistorialGado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HistorialGado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HistorialGado::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
