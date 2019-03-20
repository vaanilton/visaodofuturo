<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\models\Profile;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Green Life web template, Bootstrap Web Templates,
  Flat Web Templates, Android Compatible web template, Smartphone Compatible web template,
  free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>

  <link href="//fonts.googleapis.com/css?family=Economica:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Rasa:300,400,500,600,700" rel="stylesheet">

  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="main-nature">
		<!-- banner -->
		<div class="nature-top">
			<div class="col-xs-7 logo">
				<h1>
					<a href="#">
            <img src="../../img//logotipowhite.jpg" class="img-responsive zoom-img" alt="" width="150px" height="350px"/>
          </a>
				</h1>
			</div>

			<!-- navigation -->
			<div class="col-xs-2 menu">
				<a href="" id="menuToggle">
					<span class="navClosed"></span>
				</a>
				<nav>

          <?php if (Yii::$app->user->isGuest) { ?>

    				<ul >
    					<li >
                <a href="<?= Url::to(['site/login']); ?>" class="life-buttons">
    							<span class="fa fa-unlock-alt" aria-hidden="true"></span> Login
                </a>
    					</li>
    				</ul>

           <?php }else {?>

            <ul >
              <li >
                <a href="<?= Url::to(['site/index']); ?>"><em class="fa fa-power-off"></em><?= Yii::$app->user->identity->username ?></a>
    					</li>
            </ul>

          <?php } ?>

					<a href="#">Home</a>
					<a href="#about" class="scroll">Sobre Nós</a>
          <a href="#visao" class="scroll">Visão Presidente</a>
					<a href="#services" class="scroll">Serviços</a>
					<a href="#team" class="scroll">Equipa</a>
          <a href="#Especialisamos" class="scroll">Area Especialização</a>
					<a href="#projects" class="scroll">Projetos</a>
					<a href="#contact" class="scroll">Contacto</a>
          <a href="#parceiros" class="scroll">Parceiros</a>
				</nav>
			</div>
			<!-- //navigation -->
		</div>
	</div>
	<!-- signin Model -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_nature">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
            <h3 class="tittle">
              <span>V</span>isão do <span>P</span>residente
            </h3>
						<p>
							Sign In now, Let's start your Grocery Shopping. Don't have an account?
							<a href="#" data-toggle="modal" data-target="#myModal2">
								Sign Up Now</a>
						</p>

						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal1 -->
	<!-- //signin Model -->
	<!-- signup Model -->
	<!-- Modal2 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_nature">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="natureinfo_sign">Sign Up</h3>
						<p>
							Come join the Green Life! Let's set up your Account.
						</p>
						<form action="#" method="post">
							<div class="styled-input nature-styled-input-top">
								<input type="text" placeholder="Name" name="Name" required="">
							</div>
							<div class="styled-input">
								<input type="email" placeholder="E-mail" name="Email" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" id="password1" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Confirm Password" name="Confirm Password" id="password2" required="">
							</div>
							<input type="submit" value="Sign Up">
						</form>
						<p>
							<a href="#">By clicking register, I agree to your terms</a>
						</p>
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal2 -->
	<!-- //signup Model -->

	<!-- banner-text -->
	<div class="slider">
		<div class="callbacks_container">
			<ul class="rslides callbacks callbacks1" id="slider4">
				<li>
					<div class="green-banner-top banner">
						<div class="container">
							<div class="green_style-banner-info">
								<h3>Faça o seu Melhor <br>Négocio</h3>
								<p>Com Visão do Futuro
									<i class="fa fa-tree" aria-hidden="true"></i></p>
								<div class="video-pop-mgreen">
									<a href="#small-dialog1" class="view play-icon popup-with-zoom-anim ">
										<i class="fa fa-play-circle" aria-hidden="true"></i>Assista o nosso vídeo</a>
									<div id="small-dialog1" class="mfp-hide lifels_small_dialog mgreen_pop">
										<iframe src="https://player.vimeo.com/video/19251347"></iframe>
									</div>
								</div>
								<div class="thim-click-to-bottom">
									<a href="#about" class="scroll">
										<i class="fa  fa-chevron-down"></i>
									</a>
								</div>

							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="green-banner-top banner-2">
						<div class="container">
							<div class="green_style-banner-info">
                <h3>Faça o seu Melhor <br>Négocio</h3>
								<p>Com Visão do Futuro
									<i class="fa fa-tree" aria-hidden="true"></i></p>
								<div class="video-pop-mgreen">
									<a href="#small-dialog2" class="view play-icon popup-with-zoom-anim ">
										<i class="fa fa-play-circle" aria-hidden="true"></i>Assista o nosso vídeo</a>
									<div id="small-dialog2" class="mfp-hide lifels_small_dialog mgreen_pop">
										<iframe src="https://player.vimeo.com/video/19251347"></iframe>
									</div>
								</div>
								<div class="thim-click-to-bottom">
									<a href="#about" class="scroll">
										<i class="fa  fa-chevron-down"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="green-banner-top banner-3">
						<div class="container">
							<div class="green_style-banner-info">
                <h3>Faça o seu Melhor <br>Négocio</h3>
								<p>Com Visão do Futuro
									<i class="fa fa-tree" aria-hidden="true"></i></p>
								<div class="video-pop-mgreen">
									<a href="#small-dialog3" class="view play-icon popup-with-zoom-anim ">
										<i class="fa fa-play-circle" aria-hidden="true"></i>Assista o nosso vídeo</a>
									<div id="small-dialog3" class="mfp-hide lifels_small_dialog mgreen_pop">
										<iframe src="https://player.vimeo.com/video/19251347"></iframe>
									</div>
								</div>
								<div class="thim-click-to-bottom">
									<a href="#about" class="scroll">
										<i class="fa  fa-chevron-down"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
		<!-- //banner-text -->
	</div>
	<!-- //banner -->

	<!-- about -->
	<div class="banner-bottom-lifel" id="about">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>B</span>em-<span>V</span>indo
				</h3>
				<div class="tittle-style">
				</div>
				<p style="font-weight: bold; font-family: TimesNewRoman,">
          Visão do futuro é uma empresa sediada na ilha do Fogo, cidade de São Felipe.<br>
          É uma sociedade por cotas, criada para fomentar o desenvolvimento agricula e pecúaria da ilha do Fogo,
          com o intuito de criar um sistema de articulação dos produtos produzido na ilha de modo a dar consistência da valorização do mesmo e consiquentemente acrescentar o impacto do sector na economia local.<br><br>
          Esta empresa visa sobretudo na mudança de vida dos moradores local com a criação de condições para obtenção dos meios de subsistência, condições estas que por sua vez geram rendimentos para o sustento do tal e a família.<br><br>
          Esta sociedade é composta por sete sócios fundadores, no qual dívide se em quatro grupos, três na area da informatica, um na area de gestão, um na area do desenvolvimento social e um na area de fiscalização.
        </p>
			</div>
			<div class="welcome-sub-mgreen">
				<div class="col-md-5 banner_bottom_left" style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 10px;
        font-family: Open Sans; letter-spacing:2px; vertical-align: baseline; line-height: 30px; font-style: negrito">
					<h4> <span>O</span>bjectivo do
						<span>V</span>isão do <span>F</span>uturo
					</h4>
					<p style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 14px;
          font-family: Open Sans; letter-spacing:2px; vertical-align: baseline; line-height: 26px; font-style: negrito; font-weight: bold;">
            Facilitar compra e venda de forma a diminuir o custo e tempo dos mesmos <br>
            Oferecer igual Oportunidade em relação ao acesso dos produtos e o preço do mesmo<br>
            Rentabilizar a produção agropecuária com o eventual da mudança de qualidades de produção e aumento de produtividade e melhoria de condições de vida de fornecedores.<br>
            Tornar Agricultura e Pecuária um meio de sustento das necessidades básicas e auxiliar no sustento das necessidades terceiros, com criação e qualificação dos mercados.
          </p>

				</div>
				<!-- Stats-->
				<div class="col-md-7 stats-info-nature">
					<div class="lifel-right-stats">
					</div>
				</div>
				<!-- //Stats -->
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //about -->
	<!-- video section -->
	<div class="video-lifel" data-vide-bg="video/3">
		<h5>Um pouco daquilo que é Visão do futuro</h5>
		<a href="#small-dialog4" class="play-icon popup-with-zoom-anim ">
			<i class="fa fa-play-circle-o" aria-hidden="true"></i>
		</a>
		<div id="small-dialog4" class="mfp-hide lifels_small_dialog mgreen_pop">
			<iframe src="https://player.vimeo.com/video/19251347"></iframe>
		</div>
	</div>
	<!-- //video section -->

  <br>

  <?php function shortdata($string, $len) {
      $string = strip_tags($string);
      $i = $len;
      while ($i < strlen($string)) {
          if ($string[$i] == ' ') {
              $string = substr($string, 0, $i) . "...";
              return $string;
          }
          $i++;
      }
      return $string;
   } ?>

  <div class="modal fade" id="myModal11" tabindex="-1" role="dialog">
 		<div class="modal-dialog">
 			<!-- Modal content-->
 			<div class="modal-content">
 				<div class="modal-header">

 					<button type="button" class="close" data-dismiss="modal">&times;</button>
 				</div>
 				<div class="modal-body modal-body-sub_nature">
 					<div class="main-mailposi">
 						<span class="fa fa-envelope-o" aria-hidden="true"></span>
 					</div>
 					<div class="modal_body_left modal_body_left1">
             <h3 class="tittle">
               <span>V</span>isão do <span>P</span>residente
             </h3>
             <?php if($modelsVisaoPresedente){
               foreach ($modelsVisaoPresedente as $key => $value) {
                 $dados = shortdata($value['descricao'], $len=5000);?>
                 <p>
                   <img src="<?= $value['photo']?>" width='200px' height="200px" style="float:left;margin-right: 10px" alt="" />
                 <?php
                    echo $dados;
                  ?>
                </p>
                <?php }
              }?>

 						<div class="clearfix"></div>
 					</div>
 					<div class="clearfix"></div>
 				</div>
 			</div>
 			<!-- //Modal content-->
 		</div>
 	</div>

  <div class="team" id="visao">
    <div class="container">
      <div class="title-div">
        <h3 class="tittle">
          <span>V</span>isão do <span>P</span>residente
        </h3>
        <div class="tittle-style">
        </div>
      </div>

      <div class="modal_body_left modal_body_left1" style="background-color: #E9EBEE;padding: 18px;font-size: 16px;
                                                                      font-family: Open Sans; letter-spacing:2px;
                                                                      vertical-align: baseline; line-height: 32px;
                                                                      font-style: negrito ;text-align: justify;">
         <?php if($modelsVisaoPresedente){
           foreach ($modelsVisaoPresedente as $key => $value) {
             $dados = shortdata($value['descricao'], $len=2000);?>
             <p>
               <img src="<?= $value['photo']?>" width='300px' height="300px" style="float:left;margin-right: 10px" alt="" />
             <?php
                echo $dados;
              ?>
            </p>
            <?php }
          }?>
        <div class="clearfix"></div>
        <div style="text-align: center">
          <a href="#" data-toggle="modal" data-target="#myModal11" class="life-buttons">Ver Mais...</a>
        </div>
      </div>
    </div>
  </div>
  <?php $pegar_area ?>
	<!-- services -->
	<div class="green_style-services" id="services">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>Á</span>reas de <span>I</span>ntervenção
				</h3>
				<div class="tittle-style">
				</div>
			</div>


        <?php if($modelsAreaIntervensao){
          foreach ($modelsAreaIntervensao as $key => $value) {
          $pegar = shortdata($value['descricao'], $len=50); ?>

          <?php if($key == 3) { ?>

          <div class="green_style-services-row-2">
            <div class="clearfix"> </div>
            <div class="col-md-4 col-xs-6 green_style-services-grids">
    					<div class="col-xs-3 mgreen-ser">
    						<i class="<?= $value['icone'] ?>" aria-hidden="true"></i>
    					</div>
    					<div class="col-xs-9 mgreen-heading">
    						<h4>
                  <?= $value['titulo'] ?>
                </h4>
    					</div>
    					<div class="clearfix"></div>
    					<p>
                <?= $pegar ?>
              </p>

              <?php $pegar_area = $key?>

    					<a href="" data-toggle="modal" data-target="#area" class="life-buttons">Mais Informação</a>
    				</div>

          <?php }else{ ?>

    				<div class="col-md-4 col-xs-6 green_style-services-grids">
    					<div class="col-xs-3 mgreen-ser">
    						<i class="<?= $value['icone'] ?>" aria-hidden="true"></i>
    					</div>
    					<div class="col-xs-9 mgreen-heading">
    						<h4>
                  <?= $value['titulo'] ?>
                </h4>
    					</div>
    					<div class="clearfix"></div>

    					<p>
                <?= $pegar ?>
              </p>

              <?php $pegar_area = $key?>

    					<a href="" data-toggle="modal" data-target="#area" class="life-buttons">Mais Informação</a>
    				</div>

        <?php  }}
        } ?>

      </div>
		</div>
	</div>
	<!-- //services -->

  <div class="modal fade" id="area" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body modal-body-sub_nature">
          <div class="main-mailposi">
            <span class="fa fa-envelope-o" aria-hidden="true"></span>
          </div>
          <div class="modal_body_left modal_body_left1">

            <?php if($modelsAreaIntervensao){
              foreach ($modelsAreaIntervensao as $key => $value) {
              $pegar = shortdata($value['descricao'], $len=200);
            ?>

             <h3 class="tittle">
               <span><?php echo $value['titulo'];?> </span>
             </h3>

             <div class="clearfix"></div>

             <h4 style="background-color: #E9EBEE;padding: 18px;text-align: center;font-size: 16px;
             font-family: Open Sans; letter-spacing:2px; vertical-align: baseline; line-height: 32px; font-style: negrito">
             <?php
                echo $pegar ;
             ?>
             </h4>

             <?php  }
             } ?>

            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <!-- //Modal content-->
    </div>
  </div>

	<!-- team -->
	<div class="team" id="team">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>E</span>quipa de <span>G</span>estão
				</h3>
				<div class="tittle-style">
				</div>
			</div>

			<div class="green_style-team-grids">

        <?php if ($modelsUsers) {
            foreach ($modelsUsers as $key => $users) { ?>
            	<div class="col-sm-3 col-xs-6">
            		<div class="team-info">

                  <?php if(file_exists($users['photo'])) { ?>

                    <img src="<?= $users['photo']; ?>" width="50px" height="350px" alt="">

                  <?php } else { ?>

                    <img src="../../img/user/utilizador.jpg" width="50px" height="350px" alt=""/>

                  <?php } ?>

                  <br>
                  <br>
                  <br>
                  <br>
                  <br>

          				<div class="team-caption">
          					<h4><?= $users['nome'].' '.$users['sobrenome']; ?></h4>
                    <br>
                    <h4>Cargo - <?= $users['tipo']?></h4>
          					<ul>
          						<li>
          							<a href="<?= $users['facebook']?>">
          								<i class="fa fa-facebook"></i>
          							</a>
          						</li>
          						<li>
          							<a href="<?= $users['tweter']?>">
          								<i class="fa fa-twitter"></i>
          							</a>
          						</li>
          						<li>
          							<a href="<?= $users['google']?>">
          								<i class="fa fa-google"></i>
          							</a>
          						</li>
          					</ul>
          				</div>
            		</div>
              <br>
            </div>

        <?php } ?>

          <div class="clearfix"> </div>

        <?php } ?>

			</div>
		</div>
	</div>
	<!-- //team -->
  <div class="testimonials">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
          <span>A</span>presentações
				</h3>
				<div class="tittle-style">
				</div>
			</div>
			<div class="col-md-6 testimonials-main">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
              <?php
              if($modelsGaleria){
                foreach ($modelsGaleria as $key => $fornecedor) {
              ?>
  							<li>
  								<div class="inner-testimonials-lifels">
  									<img src="<?= $fornecedor['photo']?>" width="500px" height="500px" alt=""/>
                    <div class="testimonial-info-mgreen">

  										<p class="para-life-green_style"><?= $fornecedor['descricao']?> </p>
  									</div>
  								</div>
  							</li>
              <?php
              }}
              ?>
						</ul>
					</div>
				</section>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- experts section -->
	<div class="what-lifels" id="Especialisamos">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>E</span>specialisamos em
				</h3>
				<div class="tittle-style">
				</div>
			</div>
			<div class="what-grids">
				<div class="col-md-6 what-grid">
					<img src="images/work.png" class="img-responsive" alt="" />
				</div>
				<div class="col-md-6 what-grid1">

          <?php if($modelsEspecialisasao){
            foreach ($modelsEspecialisasao as $key => $value) {
            $pegar = shortdata($value['descricao'], $len=500);
          ?>

					<div class="what-top1">
						<div class="what-left">
							<i class="<?php echo $value['icone']?>" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4><?php echo $value['titulo']?></h4>
							<p><?php echo $pegar ?></p>
						</div>
						<div class="clearfix"></div>
					</div>

          <?php }
          }?>

				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //experts section -->

	<!-- projects -->
	<div class="gallery-nature" id="projects">
		<div class="title-div">
			<h3 class="tittle">
				<span>P</span>rojectos
			</h3>
			<div class="tittle-style">
			</div>
		</div>
		<div class="gallery-nature-kmsrow">
			<div class="col-xs-3 gallery-nature-grids">
				<div class="portfolio-hover">
					<a href="img/uva.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.">
						<img src="img/uva.jpg" class="img-responsive zoom-img" alt="" />
					</a>
				</div>
			</div>
			<div class="col-xs-3 gallery-nature-grids">
				<div class="portfolio-hover">
					<a href="img/cafe.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.">
						<img src="img/cafe.jpg" class="img-responsive zoom-img" alt="" />
					</a>
				</div>
			</div>
			<div class="col-xs-3 gallery-nature-grids">
				<div class="portfolio-hover">
					<a href="img/g3.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.">
						<img src="img/g3.jpg" class="img-responsive zoom-img" alt="" />
					</a>
				</div>
			</div>
			<div class="col-xs-3 gallery-nature-grids">
				<div class="portfolio-hover">
					<a href="img/pintos.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.">
						<img src="img/pintos.jpg" class="img-responsive zoom-img" alt="" />
					</a>
				</div>
			</div>
			<div class="col-xs-3 gallery-nature-grids">
				<div class="portfolio-hover">
					<a href="img/fogo.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.">
						<img src="img/fogo.jpg" class="img-responsive zoom-img" alt="" />
					</a>
				</div>
			</div>
			<div class="col-xs-3 gallery-nature-grids">
				<div class="portfolio-hover">
					<a href="img/g6.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.">
						<img src="img/g6.jpg" class="img-responsive zoom-img" alt="" />
					</a>
				</div>
			</div>
			<div class="col-xs-3 gallery-nature-grids">
				<div class="portfolio-hover">
					<a href="img/g9.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.">
						<img src="img/g9.jpg" class="img-responsive zoom-img" alt="" />
					</a>
				</div>
			</div>
			<div class="col-xs-3 gallery-nature-grids">
				<div class="portfolio-hover">
					<a href="img/g7.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.">
						<img src="img/g7.jpg" class="img-responsive zoom-img" alt="" />
					</a>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //projects -->

	<!-- testimonials -->
	<div class="testimonials">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>H</span>istorial de <span>I</span>ntervenções
				</h3>
				<div class="tittle-style">
				</div>
			</div>
			<div class="col-md-6 testimonials-main">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
              <?php
              if($modelsIntervensaoSocial){
                foreach ($modelsIntervensaoSocial as $key => $fornecedor) {
              ?>
  							<li>
  								<div class="inner-testimonials-lifels">
  									<img src="<?= $fornecedor['photo']?>" width="500px" height="500px" alt=""/>
  									<div class="testimonial-info-mgreen">
  										<h5><?= $fornecedor['nome']?></h5>
  										<span></span>
  										<p class="para-life-green_style"><?= $fornecedor['descricao']?></p>
  									</div>
  								</div>
  							</li>
              <?php
              }}
              ?>
						</ul>
					</div>
				</section>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //testimonials -->

	<!-- contact -->
	<div class="contact" id="contact">
		<div class="title-div">
			<h3 class="tittle">
				<span>F</span>ale <span>C</span>onosco
			</h3>
			<div class="tittle-style">
			</div>
		</div>
		<div class="col-md-12 map">
			<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDoGFjp06hqUHFfkMnz5tRSK42IlVP9STA&q=3136 Rua do Mercado, São Filipe, Cabo Verde"></iframe>
		</div>
		<div class="clearfix"> </div>
	</div>
	<div class="second-contact-nature">
		<div class="col-md-6 form-bg">
			<form action="#" method="post">
				<div class="contact-fields">
					<input type="text" name="Nome" placeholder="Nome" required="">
				</div>
				<div class="contact-fields">
					<input type="email" name="Email" placeholder="Email" required="">
				</div>
				<div class="contact-fields">
					<input type="text" name="Assunto" placeholder="Assunto" required="">
				</div>
				<div class="contact-fields">
					<textarea name="Menssagem" placeholder="Menssagem" required=""></textarea>
				</div>
				<input type="submit" value="Submit">
			</form>
		</div>
		<div class="col-md-6 address-left-second">

      <?php
      if($modelsInformacaoContacto){
        foreach ($modelsInformacaoContacto as $key => $fornecedor) {
      ?>

  			<div class="address-grid">
  				<h5 class="small-title">Informações de contato</h5>
  				<div class="address-grids">
  					<span class="fa fa-volume-control-phone" aria-hidden="true"></span>
  					<div class="contact-right">
  						<p>Telefone </p>
  						<span><?= $fornecedor['telefone']?></span>
  					</div>
  					<div class="clearfix"> </div>
  				</div>
  				<div class="address-grids">
  					<span class="fa fa-envelope-o" aria-hidden="true"></span>
  					<div class="contact-right">
  						<p>Email </p>
  						<a href="<?= $fornecedor['email']?>"><?= $fornecedor['email']?></a>
  					</div>
  					<div class="clearfix"> </div>
  				</div>
  				<div class="address-grids">
  					<span class="fa fa-map-marker" aria-hidden="true"></span>
  					<div class="contact-right">
  						<p>Localização</p>
  						<span><?= $fornecedor['localisacao']?></span>
  					</div>
  					<div class="clearfix"> </div>
  				</div>
  				<div class="address-grids">
  					<span class="fa fa-calendar" aria-hidden="true"></span>
  					<div class="contact-right">
  						<p>Horas de trabalho</p>
  						<span><?= $fornecedor['hora_funcionamento']?></span>
  					</div>
  					<div class="clearfix"> </div>
  				</div>
  			</div>
      <?php
      }}
      ?>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- //contact -->
  <br>
  <!--- // Parceiros -->
  <div class="team" id="parceiros">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>P</span>arceiros do <span>V</span>isão do <span>F</span>uturo
				</h3>
				<div class="tittle-style"></div>
			</div>
			<div class="green_style-team-grids">
				<div class="col-sm-3 col-xs-6 green_style-team-grid">
					<div class="team-info">
						<img src="img/maa.png" alt="">
            <br><br>
						<div class="team-caption">
							<h4>Ministerio da Agricultura e Ambiente</h4>
						</div>
					</div>
				</div>

				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
  <!--- // Parceiros -->

	<!-- footer -->
	<div class="footer-bot">
		<div class="green-newsletter">
			<div class="lifels-social-icons-2">
				<h3>Conectar atravez do rede Social</h3>
				<a class="facebook" href="https://www.facebook.com/Visão-Do-Futuro-639779449793971/?modal=admin_todo_tour">
					<i class="fa fa-facebook"></i>
				</a>
				<a class="twitter" href="https://twitter.com/VisoDoFuturo2">
					<i class="fa fa-twitter"></i>
				</a>
				<a class="pinterest" href="https://br.pinterest.com/visaodofuturocv/">
					<i class="fa fa-google-plus"></i>
				</a>
				<a class="linkedin" href="https://www.linkedin.com/in/visão-do-futuro-91a32a182/">
					<i class="fa fa-linkedin"></i>
				</a>
			</div>

			<div class="clearfix"> </div>
		</div>
		<div class="container">

			<div class="col-xs-12 ftr-menu">
				<ul>
          <a href="#">
            <img src="../../img//logotipo.jpg" class="img-responsive zoom-img" alt="" width="150px" height="350px"/>
          </a>
					<li>
						<a class="scroll" href="#about">Sobre Nós</a>
					</li>
          <li>
						<a href="#visao" class="scroll">Visão Presidente</a>
					</li>
					<li>
						<a class="scroll" href="#services">Serviços</a>
					</li>
					<li>
						<a class="scroll" href="#team">Equipa</a>
					</li>
          <li>
						<a href="#Especialisamos" class="scroll">Especializamos Em</a>
					</li>
					<li>
						<a class="scroll" href="#projects">Projectos</a>
					</li>
					<li>
						<a class="scroll" href="#contact">Contacto</a>
					</li>
          <li>
						<a href="#parceiros" class="scroll">Parceiros</a>
					</li>
				</ul>

			</div>
			<div class="clearfix"></div>
			<div class="copy-right">
				<p> &copy;Programador: Anilton Miranda</p>
			</div>
		</div>
	</div>
	<!-- //footer -->


  <div class="container">
      <?= Breadcrumbs::widget([
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
      <?= Alert::widget() ?>
  </div>

<?php
$script = <<< JS
addEventListener("load", function () {
setTimeout(hideURLbar, 0);
}, false);

function hideURLbar() {
window.scrollTo(0, 1);
}

$(function () {
// Slideshow 4
$("#slider4").responsiveSlides({
  auto: true,
  pager: true,
  nav: false,
  speed: 500,
  namespace: "callbacks",
  before: function () {
    $('.events').append("<li>before event fired.</li>");
  },
  after: function () {
    $('.events').append("<li>after event fired.</li>");
  }
});

});

(function ($) {
			$(document).ready(function () {
				$('#menuToggle').click(function (e) {
					var parent = $(this).parent('.menu');
					parent.toggleClass("open");
					var navState = parent.hasClass('open') ? "hide" : "show";
					$(this).attr("title", navState + " navigation");
					// Set the timeout to the animation length in the CSS.
					setTimeout(function () {
						console.log("timeout set");
						$('#menuToggle > span').toggleClass("navClosed").toggleClass("navOpen");
					}, 200);
					e.preventDefault();
				});
			});
		})(jQuery);

$(document).ready(function () {
$('.popup-with-zoom-anim').magnificPopup({
  type: 'inline',
  fixedContentPos: false,
  fixedBgPos: true,
  overflowY: 'auto',
  closeBtnInside: true,
  preloader: false,
  midClick: true,
  removalDelay: 300,
  mainClass: 'my-mfp-zoom-in'
});

});

jQuery(document).ready(function ($) {
$(".scroll").click(function (event) {
  event.preventDefault();

  $('html,body').animate({
    scrollTop: $(this.hash).offset().top
  }, 1000);
});
});

$(document).ready(function () {
/*
  var defaults = {
  containerID: 'toTop', // fading element id
  containerHoverID: 'toTopHover', // fading element hover id
  scrollSpeed: 1200,
  easingType: 'linear'
  };
*/
$().UItoTop({
  easingType: 'easeOutQuart'
});
});

$(window).load(function () {
$('.flexslider').flexslider({
  animation: "slide",
  start: function (slider) {
    $('body').removeClass('loading');
  }
});
});
JS;
$this->registerJs($script);
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
