<?php
use yii\helpers\Url;
?>

<div class="x_panel col-md-6 col-sm-6 col-xs-12">
  <div class="fixed_height_260">
    <div class="x_title">
      <h2>Gados</h2>
    
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <?php
      if($modelsGado){
        foreach ($modelsGado as $key => $gado) {
      ?>
      <div class="col-md-55">
        <div class="thumbnail">
          <div class="image view view-first">
            <img style="width: 100%; display: block;" src="<?php echo Yii::getAlias('@web').'/'.$gado['photo'] ?>" alt="image">
            <div class="mask">
              <p><?php echo $gado['nome'] ?></p>
              <div class="tools tools-bottom">
                <a href="<?= Url::to(['gado/view', 'id' => $gado['id']]) ?>"><i class="fa fa-eye"></i></a>
              </div>
            </div>
          </div>
          <div class="caption">
            <p>
              <strong>
                <?php echo $gado['nome'] ?>
              </strong>
            </p>
            <p>
              <strong>
                data: <?php echo $gado['data_registo'] ?>
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
