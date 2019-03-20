<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AreaEspecialisacao */

$this->params['breadcrumbs'][] = ['label' => 'Area Especialisacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="area-especialisacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
