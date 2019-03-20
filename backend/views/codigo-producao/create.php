<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CodigoProducao */

$this->title = 'Create Codigo Producao';
$this->params['breadcrumbs'][] = ['label' => 'Codigo Producaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codigo-producao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
