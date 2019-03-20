<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Fornecedor */

$this->title = 'Cadastrar Fornecedor';
$this->params['breadcrumbs'][] = ['label' => 'Fornecedors', 'url' => ['fornecedor/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornecedor-create">

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>

</div>
