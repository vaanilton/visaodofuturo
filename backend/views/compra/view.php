<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Producao;
use backend\models\Cultivo;
use backend\models\Fornecedor;
/* @var $this yii\web\View */
/* @var $model backend\models\Compra */
$this->title = 'View';
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];

?>
<div class="compra-view">
  <h5 style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
              font-family: Open Sans; letter-spacing:2px;
              vertical-align: baseline; line-height: 32px;
              font-style: negrito ;text-align: justify;"><?= Html::encode($this->title) ?>

    <div class="pull-right">
      <p>
        <?= Html::a('Finalizar Compra', ['finalizarcompra', 'id' => $model->id], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => 'Tem certeza que Pretende Finalizar a Compra?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Nao Comprar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Pretende Cancelar a Compra?',
                'method' => 'post',
            ],
        ]) ?>
      </p>
    </div>
  </h5>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
                'label'=>'Photo Produto',
                'format'=>'html',
                'value'=>function($data){
                  $producao = Producao::find()->where(['id'=>$data->id_producao])->One();
                  if($producao){
                    return Html::img(Yii::getAlias('@web').'/'.$producao->photo,[
                      'width'=>'480px'
                    ]);
                  }

                }
            ],
            [
              'attribute'=>'Nome Agricultor',
              'value'=>function($data){
                  $producao = Producao::find()->where(['id'=>$data->id_producao])->One();
                  if($producao){
                    $cultivo = Cultivo::find()->where(['id'=>$producao->id_cultivo])->One();
                    if($cultivo){
                      $fr = Fornecedor::find()->where(['id'=>$cultivo->id_fornecedor])->one();
                      return $fr->nome.' '.$fr->sobrenome;
                    }
                  }
              }
            ],
            [
              'attribute'=>'Nome Produto',
              'value'=>function($data){
                  $producao = Producao::find()->where(['id'=>$data->id_producao])->One();
                  if($producao){
                    $cultivo = Cultivo::find()->where(['id'=>$producao->id_cultivo])->One();
                    if($cultivo){
                      return $cultivo->nome_do_planteio;
                    }else return $producao->designacao;
                  }else {
                    $gado = Gado::find()->where(['id'=>$data->id_gado])->One();
                    if($gado){
                      return $gado->nome;
                    }
                  }
              }
            ],
            'quantidade',
            [
              'attribute'=>'Preco Total',
              'value'=>function($data){
                  return $data->preco_total.' $00';
              }
            ],
            'data',
        ],
    ]) ?>
</div>
