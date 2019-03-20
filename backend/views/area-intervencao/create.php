<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AreaIntervencao */

$this->title = 'Create Area Intervencao';
$this->params['breadcrumbs'][] = ['label' => 'Area Intervencaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-intervencao-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
