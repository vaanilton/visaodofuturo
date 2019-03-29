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

    <p>
      <?php if(Yii::$app->user->identity->id == $model->user_iduser){?>
        <?= Html::a('Update', ['update', 'id' => $model->user_iduser], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->user_iduser], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
      <?php } ?>
    </p>

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
