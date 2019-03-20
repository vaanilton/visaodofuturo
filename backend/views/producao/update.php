<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Producao */
$this->params['breadcrumbs'][] = ['label' => 'Producaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="producao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
      if($model->tipo === 'Agricula'){
      ?>
        <?= $this->render('_formAgricula', [
            'model' => $model,
        ]) ?>
    <?php
      }else {
    ?>
        <?= $this->render('_formPicuaria', [
            'model' => $model,
        ]) ?>
    <?php
      }
    ?>

</div>
