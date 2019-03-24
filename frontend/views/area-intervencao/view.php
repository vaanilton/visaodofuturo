<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use frontend\models\Anuncio;
/* @var $this yii\web\View */
/* @var $model backend\models\AreaIntervencao */

  function shortdata($string, $len) {
    $string = strip_tags($string);
    $i = $len;
    while ($i < strlen($string)) {
        if ($string[$i] == ' ') {
            $string = substr($string, 0, $i) . "...";
            return $string;
        }
        $i++;
    }
    return $string;
 }

?>

  <h1>
    <a href="<?= Url::to(['site/index']); ?>">
      <img src="../../img//logotipo.jpg" class="img-responsive zoom-img" alt="" width="150px" height="350px"/>
    </a>
  </h1>

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <a href="<?= Url::to(['site/index']); ?>">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </a>
      </div>
      <div class="modal-body modal-body-sub_nature">
        <div class="main-mailposi">
          <span class="fa fa-envelope-o" aria-hidden="true"></span>
        </div>
        <div class="modal_body_left modal_body_left1">

          <?php if($model->titulo=='Emprego & Anúncios '){ ?>

            <h3 class="tittle">
              <span>Emprego</span>
            </h3>

            <h4 style="background-color: #E9EBEE;padding: 18px;text-align: center;font-size: 16px;
                      font-family: Open Sans; letter-spacing:2px; vertical-align: baseline;
                      line-height: 32px; font-style: negrito">

                <?php echo $model->descricao ;?>

            </h4>

            <div class="clearfix"></div>

            <h3 class="tittle">
              <span>Anúncio</span>
            </h3>

            <h4 style="background-color: #E9EBEE;padding: 18px;font-size: 16px;
                      font-family: Open Sans; letter-spacing:2px; vertical-align: baseline;
                      line-height: 32px; font-style: negrito">

                <?php $pegar = Anuncio::find()->where(['status'=>10])->all()?>
                <?php if($pegar){ ?>
                  <?php foreach ($pegar as $key => $value) { ?>
                    <?php echo ($key+1).' - '.shortdata($value['descricao'], 40).''.Html::a(
                      '<span class="btn btn-sm btn-success">
                        <b class="glyphicon glyphicon-plus"></b>
                      </span>',
                      ['anuncio/view', 'id' => $value['id']]).'<br>';
                  }
                }?>

            </h4>

          <?php }else { ?>

             <h3 class="tittle">
               <span><?php echo $model->titulo;?> </span>
             </h3>

             <div class="clearfix"></div>

             <h4 style="background-color: #E9EBEE;padding: 18px;text-align: center;font-size: 16px;
                        font-family: Open Sans; letter-spacing:2px; vertical-align: baseline;
                        line-height: 32px; font-style: negrito">

                <?php echo $model->descricao ; ?>

             </h4>

           <?php } ?>

          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

<?php /*
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'icone',
            'titulo',
            'descricao:ntext',
            'status',
        ],
    ]) ?>
*/?>
