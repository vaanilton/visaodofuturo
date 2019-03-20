<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CodigoProducaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Codigo Producaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codigo-producao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Codigo Producao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'codigo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
