<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GaleriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Galerias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galeria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Galeria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
              'label'=>'Photo',
              'format'=>'html',
              'value'=>function($data){
                return Html::img(Yii::getAlias('@web').'/'.$data->photo,[
                  'width'=>'60px', 'height'=> '60px'
                ]);
              }
            ],
            //'id',
            //'estra',
            'descricao:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>