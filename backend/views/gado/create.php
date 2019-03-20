<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Gado */

$this->title = 'Create Gado';
$this->params['breadcrumbs'][] = ['label' => 'Gados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gado-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
