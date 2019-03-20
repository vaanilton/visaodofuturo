<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\InformacaoContacto */

$this->params['breadcrumbs'][] = ['label' => 'Informacao Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="informacao-contacto-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
