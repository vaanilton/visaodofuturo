<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Fornecedor;
use backend\models\Regiao;
use backend\models\Gado;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\Gado */

$this->title = 'View';
$this->params['breadcrumbs'][] = ['label' => 'Gados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gado-view">

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
    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($compra, 'quantidade')->textInput() ?>

      <?= $form->field($compra, 'preco_total')->textInput() ?>
      <div class="form-group">
          <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
      </div>
    <?php ActiveForm::end(); ?>

</div>
