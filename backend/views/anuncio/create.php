<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Anuncio */

$this->title = 'Create Anuncio';
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anuncio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
