<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Fornecedor */

$this->title = 'Update Fornecedor:';
$this->params['breadcrumbs'][] = ['label' => 'Fornecedors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fornecedor-update">

      <div class="col-md-12">

          <div class="panel-body tabs">
            <ul class="nav nav-tabs">
              <li class="active" role="presentation">
                <a href="#details-account" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="true">Dados da Fornecedor</a>
              </li>
              <li class="" role="presentation">
                <a href="#profile-details" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="false">Dados Login</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade active in" id="details-account">
                <?= $this->render('_form_dados', [
                  'model' => $model,
                ]) ?>
              </div>
              <div class="tab-pane fade" id="profile-details">
                <?= $this->render('_form_foto', [
                  'user' => $user,
                ]) ?>
              </div>
            </div>
          </div>

      </div>


  <?php /*

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    */
  ?>

</div>
