
<?php
use yii\helpers\Url;
?>

<div class="x_panel col-md-6 col-sm-6 col-xs-12">
  <div class="fixed_height_260">
    <div class="x_title">
      <h2>Cultivos</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <?php

      if($modelsCultivo){
        foreach ($modelsCultivo as $key => $cultivo) {

      ?>
      <div class="col-md-55">
        <div class="thumbnail">
          <div class="image view view-first">
            <img style="width: 100%; display: block;" src="<?php echo Yii::getAlias('@web').'/'.$cultivo['photo'] ?>" alt="image">
            <div class="mask">
              <p><?php echo $cultivo['nome_do_planteio'] ?></p>
              <div class="tools tools-bottom">
                <a href="<?= Url::to(['cultivo/view', 'id' => $cultivo['id']]) ?>"><i class="fa fa-eye"></i></a>
              </div>
            </div>
          </div>
          <div class="caption">
            <p>
              <strong>
                <?php echo $cultivo['nome_do_planteio'] ?>
              </strong>
            </p>
            <p>
              <strong>
                data: <?php echo $cultivo['data_do_planteio'] ?>
              </strong>
            </p>
          </div>
        </div>
      </div>

      <?php
          }
        }
      ?>

    </div>
  </div>
</div>
