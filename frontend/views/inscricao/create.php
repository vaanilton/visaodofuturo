<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Inscricao */

$this->title = 'Create Inscricao';
$this->params['breadcrumbs'][] = ['label' => 'Inscricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscricao-create">
    <br>
    <h1>
      <a href="<?= Url::to(['site/index']); ?>">
        <img src="../../img//logotipo.jpg" class="img-responsive zoom-img" alt="" width="150px" height="350px"/>
      </a>
    </h1>
    <h3 class="tittle">
      <span>Formulario de Inscrição</span>
    </h3>
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
