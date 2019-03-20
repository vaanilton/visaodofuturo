<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Produto */

$this->title = 'Update Produto:';
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="produto-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
