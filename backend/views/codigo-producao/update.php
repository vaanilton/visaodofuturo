<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CodigoProducao */

$this->title = 'Update Codigo Producao: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Codigo Producaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="codigo-producao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
