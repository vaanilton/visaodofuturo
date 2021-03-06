<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Parceiro */

$this->title = 'Atualizar dados Parceiro';
$this->params['breadcrumbs'][] = ['label' => 'Parceiros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parceiro-update">

    <h5 style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
                font-family: Open Sans; letter-spacing:2px;
                vertical-align: baseline; line-height: 32px;
                font-style: negrito ;text-align: justify;"><?= Html::encode($this->title) ?></h5>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
