<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Gado */

$this->params['breadcrumbs'][] = ['label' => 'Gados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gado-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
