<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Regiao */

$this->params['breadcrumbs'][] = ['label' => 'Regiaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="regiao-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
