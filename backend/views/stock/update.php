<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Stock */

$this->title = 'Update Stock: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
