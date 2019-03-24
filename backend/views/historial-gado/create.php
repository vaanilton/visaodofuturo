<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\HistorialGado */

$this->title = 'Create Historial Gado';
$this->params['breadcrumbs'][] = ['label' => 'Historial Gados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historial-gado-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
