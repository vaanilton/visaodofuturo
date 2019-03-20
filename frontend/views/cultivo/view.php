<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use frontend\models\Fornecedor;
use frontend\models\Regiao;
/* @var $this yii\web\View */
/* @var $model backend\models\Cultivo */
$this->title = 'View';
$this->params['breadcrumbs'][] = ['label' => 'Cultivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cultivo-view">
  <div class="x_panel">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label'=>'Photo',
                'format'=>'html',
                'value'=>function($data){
                  return Html::img(Yii::getAlias('@web').'/'.$data->photo,[
                    'width'=>'480px'
                  ]);
                }
            ],
            [
              'attribute'=>'Fornecedor',
              'value'=>function($data){
                  $fr = Fornecedor::find()->where(['id'=>$data->id_fornecedor, 'status'=>10])->one();
                  return $fr->nome.' '.$fr->sobrenome;
              }
            ],
            [
              'attribute'=>'Regiao',
              'value'=>function($data){
                  $fr = Regiao::find()->where(['id'=>$data->id_regiao])->one();
                  return $fr->localidade;
              }
            ],
            'descricao',
            'tamanho_do_solu',
            'nome_do_planteio',
            'data_do_planteio',
            'tempo_do_cultivo',
            'data_registro',
        ],
    ]) ?>
    </div>
</div>
