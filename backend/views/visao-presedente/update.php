<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\VisaoPresedente */

$this->title = 'Update Visao Presedente:';
$this->params['breadcrumbs'][] = ['label' => 'Visao Presedentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="visao-presedente-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
