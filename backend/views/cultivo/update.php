<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cultivo */

$this->params['breadcrumbs'][] = ['label' => 'Cultivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cultivo-update">

  <div class="x_panel">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

  </div>
</div>
