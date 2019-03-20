<?php
use yii\bootstrap\Nav;
use backend\models\User;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Update User';
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="update-user">
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-5">
				<div class="caixa-perfil">
					<div class="details-account">
            <img height="400px" width="380px" src="<?php echo Yii::getAlias('@web').'/'.$profile->photo ?>" alt="<?= $profile->nome; ?>"/>

						<h4 class="text-center">
							<?= $profile->nome ?>
						</h4>

						<div class="ga-border" style="height: 3px;width: 100px; background-color: #228bdf;margin: 10px auto;"></div>

						<p class="text-muted text-center">
							<small><?= $profile->tipo; ?></small>
						</p>

					</div>
				</div>
			</div>

			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-body tabs">
						<ul class="nav nav-tabs">
							<li class="active" role="presentation">
								<a href="#details-account" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="true">Conta</a>
							</li>

							<li class="" role="presentation">
								<a href="#photo" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="false">Photo</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details-account">
								<?= $this->render('update_tab_dados_conta', [
									'model' => $model,
								]) ?>
							</div>

							<div class="tab-pane fade" id="photo">
								<?= $this->render('update_tab_dados_perfil_foto', [
									'profile' => $profile,
								]) ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
