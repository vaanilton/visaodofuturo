<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Profile;

/* @var $this yii\web\View */
/* @var $model backend\models\Producao */

$this->title = 'view';
$this->params['breadcrumbs'][] = ['label' => 'Producaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producao-view">


    <p>

    <?php
        $profile = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
        if($profile){
    ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
            ])
        ?>

      <?php
        }else {
      ?>
          <?= Html::a('Comprar', ['comprar', 'id' => $model->id], [
              'class' => 'btn btn-success',
              'data' => [
                  'confirm' => 'Are you sure you want to delete this item?',
                  'method' => 'post',
              ],
          ]) ?>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php
          }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_cultivo',
            'id_gado',
            'tipo',
            'quantidade_producao',
            'quantidade_perda',
            'data_colheita',
            'preco_kilo',
        ],
    ]) ?>

</div>
