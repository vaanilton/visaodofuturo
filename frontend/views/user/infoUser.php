<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

?>
<div class="user-view">

    <?php if($profile){ ?>

      <h4 style="background-color: #E9EBEE;padding: 18px;font-size: 16px;
                  font-family: Open Sans; letter-spacing:2px;
                  vertical-align: baseline; line-height: 32px;
                  font-style: negrito ;text-align: justify;">

          Nome - <?= $profile->nome.' '.$profile->sobrenome; ?>
      </h4>

      <h4 style="background-color: #E9EBEE;padding: 18px;font-size: 16px;
                  font-family: Open Sans; letter-spacing:2px;
                  vertical-align: baseline; line-height: 32px;
                  font-style: negrito ;text-align: justify;">
          Data Nascimento - <?= $profile->data_nascimento; ?><br>
          Genero - <?= $profile->sexo; ?><br>
          Endereço - <?= $profile->endereco; ?><br><br>
          Numero BI - <?= $profile->BI; ?><br>
          Numero NIF - <?= $profile->NIF; ?><br>
          Estado Civil - <?= $profile->estado_civil; ?><br>
          Grau de Parentesco - <?= $profile->grau_parentesco; ?><br>
          Numero Agregado - <?= $profile->numero_agregado; ?>
      </h4>
    <?php } ?>

</div>
