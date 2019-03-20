<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Equipa */

$this->title = 'Update Equipa:';
$this->params['breadcrumbs'][] = ['label' => 'Equipas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="equipa-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
