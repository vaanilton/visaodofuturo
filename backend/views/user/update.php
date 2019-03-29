<?php
use yii\bootstrap\Nav;
use backend\models\User;
use yii\helpers\Url;
use yii\helpers\Html;
use backend\models\profile;

$this->title = 'Update User';
$profilee = Profile::find()->where(['user_iduser'=>Yii::$app->user->identity->id, 'tipo'=>'Adiministrador'])->one();
if($profilee){
	$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['view', 'id' => $model->id]];
}
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="update-user">
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-5">
				<div class="caixa-perfil">
					<div class="details-account">
						<div class="view-first">
							<a href="<?php echo Yii::getAlias('@web').'/'.$profile->photo ?>" data-lightbox="example-set">
            	<img height="400px" width="380px" src="<?php echo Yii::getAlias('@web').'/'.$profile->photo ?>" alt="<?= $profile->nome; ?>"/>
							</a>
						</div>
						<div style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
			                  font-family: Open Sans; letter-spacing:2px;
			                  vertical-align: baseline; line-height: 32px;
			                  font-style: negrito ;text-align: justify;">
						<br>

						<h4 class="text-center">
							<?= $profile->nome ?> - <small><?= $profile->tipo; ?></small>
						</h4>

						<div class="ga-border" style="height: 3px;width: 200px; background-color: #228bdf;margin: 18px auto;"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-body tabs">
						<ul class="nav nav-tabs" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
			                  font-family: Open Sans; letter-spacing:2px;
			                  vertical-align: baseline; line-height: 32px;
			                  font-style: negrito ;text-align: justify;">
							<li class="active" role="presentation">
								<a href="#infoUser" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="true">Infromações</a>
							</li>
							<li class="" role="presentation">
								<a href="#details-account" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="true">Dados Login</a>
							</li>
							<li class="" role="presentation">
								<a href="#profile-details" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="false">Dados Perfil</a>
							</li>
							<li class="" role="presentation">
								<a href="#photo" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="false">Photo</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="infoUser">
								<?= $this->render('infoUser', [
									'profile' => $profile,
									'model' => $model,
								]) ?>
							</div>
							<div class="tab-pane fade" id="details-account">
								<?= $this->render('update_tab_dados_conta', [
									'model' => $model,
								]) ?>
							</div>
							<div class="tab-pane fade" id="profile-details">
								<?= $this->render('update_tab_dados_perfil', [
									'profile' => $profile,
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
