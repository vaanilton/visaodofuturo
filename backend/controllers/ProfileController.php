<?php

namespace backend\controllers;

class ProfileController extends Controller{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionApagar($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

}
