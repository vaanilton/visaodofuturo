<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Fornecedor */

$this->title = 'Cadastrar Fornecedor';
$this->params['breadcrumbs'][] = ['label' => 'Fornecedors', 'url' => ['fornecedor/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornecedor-create">

  <h1 style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
              font-family: Open Sans; letter-spacing:2px;
              vertical-align: baseline; line-height: 32px;
              font-style: negrito ;text-align: justify;">
              <?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>

</div>
