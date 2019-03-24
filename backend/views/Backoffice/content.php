<?php
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
//<div class="right_col scrollmenu" >
?>

<div class="right_col scrollmenu" role="main">

  <div class="container">
      <?= Breadcrumbs::widget([
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
      <?= Alert::widget() ?>
      <?= $content ?>
  </div>

</div>
