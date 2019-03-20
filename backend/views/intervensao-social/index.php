<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\IntervensaoSocialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Intervensao Social';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intervensao-social-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Intervensao Social', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'photo',
            [
                'label'=>'Photo',
                'format'=>'html',
                'value'=>function($data){
                    return Html::img(Yii::getAlias('@web').'/'.$data['photo'],[
                      'width'=>'70px'
                    ]);
                },
                'contentOptions' => [
                      'class' => 'text-center'
                ]
            ],
            'nome',
            'descricao:ntext',
            'status',
            //'estra',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
