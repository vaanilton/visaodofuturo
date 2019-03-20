<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Regiao */

$this->title = 'Create Regiao';
$this->params['breadcrumbs'][] = ['label' => 'Regiaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regiao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
