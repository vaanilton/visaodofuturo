<?php

namespace backend\controllers;

use yii\web\Controller;

class BackofficeController extends Controller
{
    public function actionIndex(){
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

      return $this->render('index', [
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
