<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\Anuncio;
use kop\y2sp\ScrollPager;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\InscricaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inscricaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscricao-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nome',
            'morada',
            //'sexo',
            'data_nascimento',
            'escolaridade',
            //'BI',
            //'NIF',
            'telefone',
            'email:email',
            'data_inscrito',
            //'status',
            //'id_anuncio',
            [
              'attribute'=>'Anuncio',
              'value'=>function($model) {

                  $GetAnuncio = Anuncio::find()->where(['status'=>10, 'id'=> $model->id_anuncio])->One();
                  if($GetAnuncio){
                      $string =$GetAnuncio['descricao'];
                      $string = strip_tags($string);
                      $i = 20;
                      while ($i < strlen($string)) {
                          if ($string[$i] == ' ') {
                              $string = substr($string, 0, $i) . "...";
                              return $string;
                          }
                          $i++;
                      }
                      return $string;
                  }
               }
            ],

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => [
                  'view' => function($url, $model) {
            	         return Html::a('<span class="btn btn-sm btn-default"><b class="glyphicon glyphicon-eye-open"></b></span>', ['view', 'id' => $model['id']], ['title' => 'View', 'id' => 'modal-btn-view']);
            	     },
            	     'update' => function($id, $model) {
            	        return Html::a('<span class="btn btn-sm btn-default"><b class="fa fa-pencil"></b></span>', ['update', 'id' => $model['id']], ['title' => 'Update', 'id' => 'modal-btn-view']);
            	     },
            	     'delete' => function($url, $model) {
            	         return Html::a(
                         '<span class="btn btn-sm btn-danger"><b class="fa fa-trash"></b></span>',
                         [
                           'delete', 'id' => $model['id']
                         ],
                         [
                           'title' => 'Delete',
                           'class' => '',
                           'data' => [
                             'confirm' => 'Tem certeza que pretende esta Inscrição.',
                             'method' => 'post',
                             'data-pjax' => false
                           ],
                         ]
                       );
            	     }
                ]
            ],
        ],
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-font"></i> Inscrições</h3>',
            'type'=>'success',
            'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            'footer'=>true
        ],
        'pager' => [
            'class'     => ScrollPager::className(),
            'container' => '.grid-view tbody',
            'item'      => 'tr',
            'paginationSelector' => '.grid-view .pagination',
            'triggerTemplate' => '<tr class="ias-trigger"><td colspan="100%" style="text-align: center"><a style="cursor: pointer">{text}</a></td></tr>',
            'enabledExtensions'  => [
                ScrollPager::EXTENSION_SPINNER,
                //ScrollPager::EXTENSION_NONE_LEFT,
                ScrollPager::EXTENSION_PAGING,
            ],
        ],
    ]); ?>
</div>
