<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AreaIntervencao */

$this->title = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'Area Intervencaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="area-intervencao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
