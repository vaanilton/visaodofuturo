<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<br>
 <div class="x_panel col-md-6 col-sm-6 col-xs-12" style="background-color: #D0DCE0;padding: 5px;font-size: 14px;
             font-family: Open Sans; letter-spacing:2px;
             vertical-align: baseline; line-height: 32px;
             font-style: negrito ;text-align: justify;">
   <div class="fixed_height_260" >
     <div class="x_title" >
       <h2>Parceiros Loja Online Visão do Futuro</h2>
       <div class="clearfix"></div>
     </div>
     <div class="x_content">

       <?php

       if($modelsParceiro){
         foreach ($modelsParceiro as $key => $parceiro) {

       ?>
       <div class="col-md-55">
         <div class="thumbnail">
           <div class="image view view-first">
             <img style="width: 100%; display: block;" src="<?php echo Yii::getAlias('@web').'/'.$parceiro['photo'] ?>" alt="image">
             <div class="mask">
               <p><?php echo $parceiro['nome'] ?></p>
               <div class="tools tools-bottom">
                 <a href="<?= Url::to(['parceiro/view', 'id' => $parceiro['id']]) ?>"><i class="fa fa-eye"></i></a>
               </div>
             </div>
           </div>
           <div class="caption">
             <p>
               <strong>
                 <?php echo $parceiro['nome'] ?>
               </strong>
             </p>
             <p>
               <strong>
                 data: <?php echo $parceiro['data_registro'] ?>
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
