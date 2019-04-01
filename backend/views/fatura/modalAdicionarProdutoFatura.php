<?php
use backend\assets\JqueryAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Regiao;
use backend\models\Parceiro;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
//JqueryAsset::register($this);
?>
<div class="container-fluid">
<div class="row">
<div class="contentbox">
<div id="modal-userr" class="modal fade create-user" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Adicionar Produto em Fatura</h4>
          </div>

          <table class="table">
    				<tr  class="info">
              <th>Propetario</th>
    					<th>Código</th>
    					<th>Produto</th>
              <th>Preço</th>
    					<th>Quantidade</th>
    					<th>Adicionar</th>
    				</tr>
            <?php if ($item) {
                  foreach ($item as $key => $value) {?>

                    <div class="col-md-4">
                      <tbody>
                        <?php $modelsParceiro = Parceiro::find()->where(['id'=>$value['id_parceiro'], 'status'=>10])->all();
                          if ($modelsParceiro) {
                            foreach ($modelsParceiro as $key => $parceiro) {?>

                              <tr class='clickable-row' data-href=''>

                                <td>
                                  <?= $parceiro['nome']; ?>
                                </td>

                            <?php }} ?>

                            <td>
                              <?= $value['codigo']; ?>
                            </td>

                            <td>
                              <?= $value['nome']; ?>
                            </td>

                            <td>
                              <?= $value['preco_item']; ?>
                            </td>

                            <td class='col-xs-2'>
                              <div class="pull-right">
                    						<input type="text" class="form-control" style="text-align:right" id="precio_venta_<?php echo $value['unidade_caixa']; ?>"  value="<?php echo $value['unidade_caixa'];;?>" >
                    					</div>
                            </td>

                            <td>
                              <?= Html::a('<i class="glyphicon glyphicon-plus"></i>',
                                            ['update', 'id' => $value['id']], ['class' => 'btn btn-primary']
                                          ) ?>
                            </td>
                          </tr>

                        <?php } ?>
                      <?php } ?>

                    </tbody>
                  </div>
          </table>
          <div class="row">
              <div class="col-md-12">
                  <?php if($item){
                      echo LinkPager::widget([
                          'pagination' => $pages,
                      ]);
                  }?>
              </div>
          </div>

        </div>
    </div>
</div>
</div>
</div>

<?php
$script=<<<JS

    $('#trashds').hide();
    $('#papelFundos').hover($('#papelFundos').css('cursor','pointer'));
    $('#files').hide();
    $('#blahs').hide();
    $('#papelFundos').css('opacity',1);
    $('#papelFundos').css('background','#f4f7fa');

    $('#papelFundos').click(function() {
        if( $('#blahs').attr('src')=='#'){
            $('#files').click();
        }
    });

     $('#trashds').click(function() {
         $('#files').val('');
         $('#uploads').show();
         $('#blahs').attr('src','#');
         $('#blahs').hide();
         $('#files').val('');
         $('#trashds').hide();
         $('#papelFundos').css('opacity',1)

     })


JS;
$this->registerJS($script);

?>

<script type="text/javascript">

function readURLs(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blahs').attr('src', e.target.result);
            $('#uploads').hide();
            $('#blahs').show();
            $('#papelFundos').show();
            $('#trashds').show();
            $('#trashds').hover($('#trashds').css('cursor','pointer'));
            $('#papelFundos').css('opacity',0.5);
        }

        reader.readAsDataURL(input.files[0]);
    }

}
</script>
