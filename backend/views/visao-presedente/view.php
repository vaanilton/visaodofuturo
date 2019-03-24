<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\VisaoPresedente */

$this->title = 'View';
$this->params['breadcrumbs'][] = ['label' => 'Visao Presedentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visao-presedente-view">

    <p>
        <?= Html::a('<span class="btn btn-sm btn-primary">
                      <b class="fa fa-pencil"></b>
                    </span>',
                    ['update', 'id' => $model['id']],
                    ['title' => 'Update', 'id' => 'modal-btn-view']) ?>

        <?= Html::a('<span class="btn btn-sm btn-danger"><b class="fa fa-trash"></b></span>',
                      [
                        'delete', 'id' => $model['id']
                      ],
                      [
                        'title' => 'Delete',
                        'class' => '',
                        'data' => [
                          'confirm' => 'Tem certeza que pretende eliminar esta producao.',
                          'method' => 'post',
                          'data-pjax' => false
                        ],
                      ]
        ) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'descricao:ntext',
            'status',
        ],
    ]) ?>

</div>
