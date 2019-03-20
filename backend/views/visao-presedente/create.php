<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\VisaoPresedente */

$this->title = 'Create Visao Presedente';
$this->params['breadcrumbs'][] = ['label' => 'Visao Presedentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visao-presedente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
