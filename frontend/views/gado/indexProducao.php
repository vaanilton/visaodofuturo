<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\Cultivo;
use backend\models\Gado;
use backend\models\Profile;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProducaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Producao';
?>

<div class="producao-index">

    <?= Html::encode($this->title) ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php /*
    <div>
    <p>
        <?= Html::a('Create Producao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    </div>
    */?>

      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'showPageSummary' => true,
          'columns' => [

            //'quantidade_producao',
            [
                'class' => 'kartik\grid\FormulaColumn',
                'header' => 'Total Produzido',
                'value' => 'quantidade_producao',
                'format' => ['decimal', 2],
                'pageSummary' => true,
            ],
            //'quantidade_perda',
            [
                'class' => 'kartik\grid\FormulaColumn',
                'header' => 'Quantidade Perda',
                'value' => 'quantidade_perda',
                'format' => ['decimal', 2],
                'pageSummary' => true,
            ],
            [
                'class' => 'kartik\grid\FormulaColumn',
                'header' => 'Preco/Unidade',
                'value' => 'preco_kilo',
                'format' => ['decimal', 2],
                'pageSummary' => true,
            ],
            [
                'class' => 'kartik\grid\FormulaColumn',
                'header' => 'Total Produzida(QP - Qp)',
                'vAlign' => 'middle',
                'hAlign' => 'right',
                'width' => '7%',
                'value' => function ($model, $key, $index, $widget) {
                    $p = compact('model', 'key', 'index');
                    return $widget->col(0, $p) - $widget->col(1, $p);
                },
                'format' => ['decimal', 2],
                'headerOptions' => ['class' => 'kartik-sheet-style'],
                'mergeHeader' => true,
                //'pageSummary' => true,
                'pageSummaryFunc' => GridView::F_AVG,
                'footer' => true
            ],
          ],
        ]);
    ?>
</div>
