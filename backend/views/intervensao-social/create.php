<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IntervensaoSocial */

$this->title = 'Create Intervensao Social';
$this->params['breadcrumbs'][] = ['label' => 'Intervensao Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intervensao-social-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
