<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Equipa */

$this->title = 'Create Equipa';
$this->params['breadcrumbs'][] = ['label' => 'Equipas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipa-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
