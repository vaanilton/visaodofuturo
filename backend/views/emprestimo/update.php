<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Emprestimo */

$this->title = 'Update Emprestimo:';
$this->params['breadcrumbs'][] = ['label' => 'Emprestimos', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emprestimo-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
