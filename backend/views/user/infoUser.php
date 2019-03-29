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
          Telefone - <?= $profile->telefone; ?><br>
          Email - <?= $model->email; ?><br><br><br>
          Data Cadastrado - <?= $profile->data_registo; ?>
      </h4>
    <?php } ?>

</div>
