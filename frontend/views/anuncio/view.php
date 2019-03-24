<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\models\Anuncio */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>
  <a href="<?= Url::to(['site/index']); ?>">
    <img src="../../img//logotipo.jpg" class="img-responsive zoom-img" alt="" width="150px" height="350px"/>
  </a>
</h1>
<div class="anuncio-view">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="tittle">
          <span>Detalhes do Anuncio</span>
        </h3>
        <?php /*
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        */ ?>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'descricao:ntext',
                'requisitos:ntext',
                //'data',
                //'status',
            ],
        ]) ?>
        <h3 class="tittle">
          <span><a href="<?= Url::to(['inscricao/inscrever', 'id'=>$model['id']]); ?>" data-toggle="modal" data-target="" class="life-buttons">Inscrever</a></span>
        </h3>
      </div>
    </div>
  </div>
</div>
