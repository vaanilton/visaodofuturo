<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\IntervensaoSocial */

$this->params['breadcrumbs'][] = ['label' => 'Intervensao Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="intervensao-social-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
