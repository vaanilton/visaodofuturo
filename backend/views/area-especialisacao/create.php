<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AreaEspecialisacao */

$this->title = 'Create Area Especialisacao';
$this->params['breadcrumbs'][] = ['label' => 'Area Especialisacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-especialisacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
