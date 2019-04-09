<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\profile;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$profile = Profile::find()->where(['user_iduser'=>Yii::$app->user->identity->id, 'tipo'=>'Adiministrador'])->one();
if($profile){
    $this->title = 'View';
    $this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}else {?>
  <br>
<?php
}
?>

<div class="user-view">

    <h5 style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
                font-family: Open Sans; letter-spacing:2px;
                vertical-align: baseline; line-height: 32px;
                font-style: negrito ;text-align: justify;"><?=Html::encode($this->title)?>

      <div class="pull-right">
        <p>
          <?php if(Yii::$app->user->identity->id == $model->user_iduser){?>
            <?= Html::a('<i class="glyphicon glyphicon-refresh"></i> Atualizar Dados', ['update', 'id' => $model->user_iduser], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-trash"></i> Remover', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
          <?php }else { ?>

            <?= Html::a('<i class="glyphicon glyphicon-remove"></i> Bloquear', ['user/bloquear', 'id' => $model->user_iduser], [
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

                if(file_exists($data->photo)){

                  return Html::img(Yii::getAlias('@web').'/'.$data->photo,[
                    'width'=>'400', 'height'=>'450'
                  ]);

                }else {
                  return Html::img('../../img/user/utilizador.jpg',[
                    'width'=>'400', 'height'=>'450'
                  ]);
                }

              }
          ],
          'nome',
          'sobrenome',
          'sexo',
          'telefone',
          'data_nascimento',
          'endereco',
        ],
    ]) ?>

</div>
