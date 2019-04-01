<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Fornecedor;
use backend\models\Regiao;
use backend\models\Gado;
/* @var $this yii\web\View */
/* @var $model backend\models\Gado */

$this->title = 'View';
$this->params['breadcrumbs'][] = ['label' => 'Gados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gado-view">

  <h5 style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
              font-family: Open Sans; letter-spacing:2px;
              vertical-align: baseline; line-height: 32px;
              font-style: negrito ;text-align: justify;"><?= Html::encode($this->title) ?>

    <div class="pull-right">
      <p>
        <?php if($model->quantidade!=0 && $model->status!=0){ ?>

          <?= Html::a('<span class="btn btn-sm btn-success">
                      Baixa <b class=""></b></span>',
                      ['gado/comprar', 'id' => $model['id']]
                      )?>

          <?= Html::a('<span class="btn btn-sm btn-success">
                      Comprar <b class=""></b></span>',
                      ['gado/comprar', 'id' => $model['id']]
                      )?>
        <?= Html::a('<i class="glyphicon glyphicon-refresh"></i> Atualizar Dados', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i> Remover', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>
      </p>
    </div>
  </h5>

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
            'nome',
            'descricao',
            'quantidade',
            'data_registo',
        ],
      ])
    ?>

</div>
