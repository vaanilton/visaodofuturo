<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cultivo */

$this->title = 'Criar Cultivo';
$this->params['breadcrumbs'][] = ['label' => 'Cultivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cultivo-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
