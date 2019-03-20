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
	<meta name="keywords" content="Green Life web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>

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
			<div class="col-xs-5 logo">
				<h1>
					<a href="#">
						<span>V</span>isao
						<span>F</span>uturo</a>
				</h1>
			</div>

      <div class="col-xs-5 header-lifel">
				<ul>
					<li>
						<a href="<?= Url::to(['site/login']); ?>">
							<span class="fa fa-unlock-alt" aria-hidden="true"></span> Login</a>
					</li>
				</ul>
			</div>

			<!-- navigation -->
			<div class="col-xs-2 menu">
				<a href="" id="menuToggle">
					<span class="navClosed"></span>
				</a>
				<nav>
					<?= Html::a('Home', ['site/index'], ['class' => 'site-index']) ?>
					<a href="#about" class="scroll">About Us</a>
					<a href="#services" class="scroll">Services</a>
					<a href="#team" class="scroll">Team</a>
					<a href="#projects" class="scroll">Projects</a>
					<a href="#contact" class="scroll">Contact Us</a>
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
						<h3 class="natureinfo_sign">Sign In </h3>
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
								<h3>Save The World</h3>
								<p>Save the trees
									<i class="fa fa-tree" aria-hidden="true"></i> they will save you</p>
								<div class="video-pop-mgreen">
									<a href="#small-dialog1" class="view play-icon popup-with-zoom-anim ">
										<i class="fa fa-play-circle" aria-hidden="true"></i>Watch Our Video</a>
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
								<h3>Plant Trees Now</h3>
								<p>Save the trees
									<i class="fa fa-tree" aria-hidden="true"></i> they will save you</p>
								<div class="video-pop-mgreen">
									<a href="#small-dialog2" class="view play-icon popup-with-zoom-anim ">
										<i class="fa fa-play-circle" aria-hidden="true"></i>Watch Our Video</a>
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
								<h3>Save our Planet</h3>
								<p>Save the trees
									<i class="fa fa-tree" aria-hidden="true"></i> they will save you</p>
								<div class="video-pop-mgreen">
									<a href="#small-dialog3" class="view play-icon popup-with-zoom-anim ">
										<i class="fa fa-play-circle" aria-hidden="true"></i>Watch Our Video</a>
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
					<span>W</span>elcome
				</h3>
				<div class="tittle-style">
				</div>
				<p>ed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
					ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			</div>
			<div class="welcome-sub-mgreen">
				<div class="col-md-5 banner_bottom_left">
					<h4>About
						<span>Green Life</span>
					</h4>
					<p>Lorem Ipsum convallis diam consequat magna vulputate malesuada. Cras a ornare elit, Nulla viverra pharetra sem eget.</p>
					<p>Pellentesque convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla viverra pharetra sem, eget
						pulvinar neque pharetra ac.Lorem Ipsum convallis diam consequat magna vulputate malesuada, Crasa ornare elit. Lorem
						Ipsum convallis diam Nulla viverra pharetra sem.</p>
					<h6 class="lifel-style">Welcome</h6>
				</div>
				<!-- Stats-->
				<div class="col-md-7 stats-info-nature">
					<div class="lifel-right-stats">
						<div class="stats-grid stat-border">
							<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='768' data-delay='.5' data-increment="1">768</div>
							<p>Trees planted</p>
						</div>
						<div class="stats-grid">
							<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='678' data-delay='.5' data-increment="1">678</div>
							<p>Likes</p>
						</div>
						<div class="stats-grid stat-border border-st2">
							<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='800' data-delay='.5' data-increment="1">800</div>
							<p>Volunteers</p>
						</div>
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
		<h5>Save Trees, Clean Environment, Healthy Thinking, Happy Life & Green Earth</h5>
		<a href="#small-dialog4" class="play-icon popup-with-zoom-anim ">
			<i class="fa fa-play-circle-o" aria-hidden="true"></i>
		</a>
		<div id="small-dialog4" class="mfp-hide lifels_small_dialog mgreen_pop">
			<iframe src="https://player.vimeo.com/video/19251347"></iframe>
		</div>
	</div>
	<!-- //video section -->

	<!-- services -->
	<div class="green_style-services" id="services">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>S</span>ervices
				</h3>
				<div class="tittle-style">
				</div>
			</div>
			<div class="green_style-services-row">
				<div class="col-md-4 col-xs-6 green_style-services-grids">
					<div class="col-xs-3 mgreen-ser">
						<i class="fa fa-tint" aria-hidden="true"></i>
					</div>
					<div class="col-xs-9 mgreen-heading">
						<h4>Save Water</h4>
					</div>
					<div class="clearfix"></div>
					<p>Itaque earum rerum hic tenetur a sapiente delectus reiciendis maiores alias consequatur aut</p>
					<a href="#" data-toggle="modal" data-target="#myModal1" class="life-buttons">Read More</a>
				</div>
				<div class="col-md-4 col-xs-6 green_style-services-grids">
					<div class="col-xs-3 mgreen-ser">
						<i class="fa fa-recycle" aria-hidden="true"></i>
					</div>
					<div class="col-xs-9 mgreen-heading">
						<h4>Recycling</h4>
					</div>
					<div class="clearfix"></div>
					<p>Itaque earum rerum hic tenetur a sapiente delectus reiciendis maiores alias consequatur aut</p>
					<a href="#" data-toggle="modal" data-target="#myModal1" class="life-buttons">Read More</a>
				</div>
				<div class="col-md-4 col-xs-6 green_style-services-grids">
					<div class="col-xs-3 mgreen-ser">
						<i class="fa fa-tree" aria-hidden="true"></i>
					</div>
					<div class="col-xs-9 mgreen-heading">
						<h4>Save Forests</h4>
					</div>
					<div class="clearfix"></div>
					<p>Itaque earum rerum hic tenetur a sapiente delectus reiciendis maiores alias consequatur aut</p>
					<a href="#" data-toggle="modal" data-target="#myModal1" class="life-buttons">Read More</a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="green_style-services-row-2">
				<div class="col-md-4 col-xs-6 green_style-services-grids">
					<div class="col-xs-3 mgreen-ser">
						<i class="fa fa-envira" aria-hidden="true"></i>
					</div>
					<div class="col-xs-9 mgreen-heading">
						<h4>Planting</h4>
					</div>
					<div class="clearfix"></div>
					<p>Itaque earum rerum hic tenetur a sapiente delectus reiciendis maiores alias consequatur aut</p>
					<a href="#" data-toggle="modal" data-target="#myModal1" class="life-buttons">Read More</a>
				</div>
				<div class="col-md-4 col-xs-6 green_style-services-grids">
					<div class="col-xs-3 mgreen-ser">
						<i class="fa fa-globe" aria-hidden="true"></i>
					</div>
					<div class="col-xs-9 mgreen-heading">
						<h4>Awareness</h4>
					</div>
					<div class="clearfix"></div>
					<p>Itaque earum rerum hic tenetur a sapiente delectus reiciendis maiores alias consequatur aut</p>
					<a href="#" data-toggle="modal" data-target="#myModal1" class="life-buttons">Read More</a>
				</div>
				<div class="col-md-4 col-xs-6 green_style-services-grids">
					<div class="col-xs-3 mgreen-ser">
						<i class="fa fa-pagelines" aria-hidden="true"></i>
					</div>
					<div class="col-xs-9 mgreen-heading">
						<h4>Plantation</h4>
					</div>
					<div class="clearfix"></div>
					<p>Itaque earum rerum hic tenetur a sapiente delectus reiciendis maiores alias consequatur aut</p>
					<a href="#" data-toggle="modal" data-target="#myModal1" class="life-buttons">Read More</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //services -->

	<!-- team -->
	<div class="team" id="team">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>P</span>arceiros <span>V</span>isao do <span>F</span>uturo
				</h3>
				<div class="tittle-style">
				</div>
			</div>
			<div class="green_style-team-grids">

        <?php
          if ($modelsUsers) {
              foreach ($modelsUsers as $key => $users) {
        ?>
            		<div class="col-sm-3 col-xs-6">
            			<div class="team-info">

                    <?php
                    if(file_exists($users['photo'])) {
                        ?>
                        <img src="<?= $users['photo']; ?>" width="50px" height="350px" alt="">
                        <?php
                    } else {
                        ?>
                        <img src="../../img/user/utilizador.jpg" width="50px" height="350px" alt=""/>
                        <?php
                    }
                    ?>
            				<div class="team-caption">
            					<h4><?= $users['nome'].' '.$users['sobrenome']; ?></h4>
            					<ul>
            						<li>
            							<a href="#">
            								<i class="fa fa-facebook"></i>
            							</a>
            						</li>
            						<li>
            							<a href="#">
            								<i class="fa fa-twitter"></i>
            							</a>
            						</li>
            						<li>
            							<a href="#">
            								<i class="fa fa-rss"></i>
            							</a>
            						</li>
            					</ul>
            				</div>
            			</div>
                  <br>
            		</div>

        <?php
              }?>

              <div class="clearfix"> </div>
        <?php  }
        ?>
			</div>
		</div>
	</div>
	<!-- //team -->

	<!-- experts section -->
	<div class="what-lifels">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>W</span>e are expert in
				</h3>
				<div class="tittle-style">
				</div>
			</div>
			<div class="what-grids">
				<div class="col-md-6 what-grid">
					<img src="images/work.png" class="img-responsive" alt="" />
				</div>
				<div class="col-md-6 what-grid1">
					<div class="what-top">
						<div class="what-left">
							<i class="fa fa-check" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>Sed ut perspiciatis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut dignissimos ea est, impedit incidunt, laboriosam
								consectetur adipisicing elit.</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="what-top1">
						<div class="what-left">
							<i class="fa fa-thumbs-up" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>psum quia dolor</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut dignissimos ea est, impedit incidunt, laboriosam
								consectetur adipisicing elit.</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="what-top1">
						<div class="what-left">
							<i class="fa fa-leaf" aria-hidden="true"></i>
						</div>
						<div class="what-right">
							<h4>psum quia dolor</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut dignissimos ea est, impedit incidunt, laboriosam
								consectetur adipisicing elit.</p>
						</div>
						<div class="clearfix"></div>
					</div>
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
				<span>O</span>ur Projects
			</h3>
			<div class="tittle-style">
			</div>
		</div>
		<div class="gallery-nature-kmsrow">
			<div class="col-xs-3 gallery-nature-grids">
				<div class="portfolio-hover">
					<a href="images/g1.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.">
						<img src="images/g1.jpg" class="img-responsive zoom-img" alt="" />
					</a>
				</div>
			</div>
			<div class="col-xs-3 gallery-nature-grids">
				<div class="portfolio-hover">
					<a href="images/g2.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.">
						<img src="images/g2.jpg" class="img-responsive zoom-img" alt="" />
					</a>
				</div>
			</div>
			<div class="col-xs-3 gallery-nature-grids">
				<div class="portfolio-hover">
					<a href="images/g3.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.">
						<img src="images/g3.jpg" class="img-responsive zoom-img" alt="" />
					</a>
				</div>
			</div>
			<div class="col-xs-3 gallery-nature-grids">
				<div class="portfolio-hover">
					<a href="images/g4.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.">
						<img src="images/g4.jpg" class="img-responsive zoom-img" alt="" />
					</a>
				</div>
			</div>
			<div class="col-xs-3 gallery-nature-grids">
				<div class="portfolio-hover">
					<a href="images/g5.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.">
						<img src="images/g5.jpg" class="img-responsive zoom-img" alt="" />
					</a>
				</div>
			</div>
			<div class="col-xs-3 gallery-nature-grids">
				<div class="portfolio-hover">
					<a href="images/g6.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.">
						<img src="images/g6.jpg" class="img-responsive zoom-img" alt="" />
					</a>
				</div>
			</div>
			<div class="col-xs-3 gallery-nature-grids">
				<div class="portfolio-hover">
					<a href="images/g7.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.">
						<img src="images/g7.jpg" class="img-responsive zoom-img" alt="" />
					</a>
				</div>
			</div>
			<div class="col-xs-3 gallery-nature-grids">
				<div class="portfolio-hover">
					<a href="images/g8.jpg" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.">
						<img src="images/g8.jpg" class="img-responsive zoom-img" alt="" />
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
					<span>W</span>hat people says
				</h3>
				<div class="tittle-style">
				</div>
			</div>
			<div class="col-md-6 testimonials-main">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<div class="inner-testimonials-lifels">
									<img src="images/tt1.jpg" alt=" " class="img-responsive" />
									<div class="testimonial-info-mgreen">
										<h5>Elizabeth Leah</h5>
										<span>Sed ut perspiciatis</span>
										<p class="para-life-green_style">Laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									</div>
								</div>
							</li>
							<li>
								<div class="inner-testimonials-lifels">
									<img src="images/tt2.jpg" alt=" " class="img-responsive" />
									<div class="testimonial-info-mgreen">
										<h5>Theresa Zoe</h5>
										<span>Sed ut perspiciatis</span>
										<p class="para-life-green_style">Laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									</div>
								</div>
							</li>
							<li>
								<div class="inner-testimonials-lifels">
									<img src="images/tt3.jpg" alt=" " class="img-responsive" />
									<div class="testimonial-info-mgreen">
										<h5>Kevin Matt</h5>
										<span>Sed ut perspiciatis</span>
										<p class="para-life-green_style">Laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									</div>
								</div>
							</li>
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
				<span>C</span>ontact Us
			</h3>
			<div class="tittle-style">
			</div>
		</div>
		<div class="col-md-6 map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.948805392833!2d-73.99619098458929!3d40.71914347933105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a27e2f24131%3A0x64ffc98d24069f02!2sCANADA!5e0!3m2!1sen!2sin!4v1479793484055"></iframe>
		</div>
		<div class="col-md-6 contact_grids_info">
			<h5 class="small-title">Visit Us</h5>
			<div class="col-xs-4 contact_grid">
				<div class="contact_grid_right">
					<h4> OFFICE 1</h4>
					<p>435 City hall,</p>
					<p>NewYork City SD092.</p>
				</div>
				<div class="address-row">
					<h5>Mail Us</h5>
					<p>
						<a href="mailto:info@example.com"> mail@example.com </a>
					</p>
				</div>
				<div class="address-row">
					<h5>Call Us</h5>
					<p>+01 222 333 4444</p>
				</div>
			</div>
			<div class="col-xs-4 contact_grid">
				<div class="contact_grid_right">
					<h4> OFFICE 2</h4>
					<p>088 Jasmine hall,</p>
					<p>NewYork City SD092.</p>
				</div>
				<div class="address-row">
					<h5>Mail Us</h5>
					<p>
						<a href="mailto:info@example.com"> mail@example.com </a>
					</p>
				</div>
				<div class="address-row">
					<h5>Call Us</h5>
					<p>+01 222 333 4444</p>
				</div>
			</div>
			<div class="col-xs-4 contact_grid">
				<div class="contact_grid_right">
					<h4>OFFICE 3</h4>
					<p>436 Honey hall,</p>
					<p>NewYork City SD092.</p>
				</div>
				<div class="address-row">
					<h5>Mail Us</h5>
					<p>
						<a href="mailto:info@example.com"> mail@example.com </a>
					</p>
				</div>
				<div class="address-row">
					<h5>Call Us</h5>
					<p>+01 222 333 4444</p>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<div class="second-contact-nature">
		<div class="col-md-6 form-bg">
			<form action="#" method="post">
				<div class="contact-fields">
					<input type="text" name="Name" placeholder="Name" required="">
				</div>
				<div class="contact-fields">
					<input type="email" name="Email" placeholder="Email" required="">
				</div>
				<div class="contact-fields">
					<input type="text" name="Subject" placeholder="Subject" required="">
				</div>
				<div class="contact-fields">
					<textarea name="Message" placeholder="Message" required=""></textarea>
				</div>
				<input type="submit" value="Submit">
			</form>
		</div>
		<div class="col-md-6 address-left-second">
			<div class="address-grid">
				<h5 class="small-title">Contact Info</h5>
				<div class="address-grids">
					<span class="fa fa-volume-control-phone" aria-hidden="true"></span>
					<div class="contact-right">
						<p>Telephone </p>
						<span>+012-345-6789</span>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="address-grids">
					<span class="fa fa-envelope-o" aria-hidden="true"></span>
					<div class="contact-right">
						<p>Mail </p>
						<a href="mailto:info@example.com">info@example.com</a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="address-grids">
					<span class="fa fa-map-marker" aria-hidden="true"></span>
					<div class="contact-right">
						<p>Location</p>
						<span>3136 NE 130th St, Seattle, WA 98125, USA.</span>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="address-grids">
					<span class="fa fa-calendar" aria-hidden="true"></span>
					<div class="contact-right">
						<p>Working Hours</p>
						<span>Mon - Sat : 8:00 am to 10:30 pm</span>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- //contact -->

	<!-- footer -->
	<div class="footer-bot">
		<div class="green-newsletter">
			<div class="lifels-social-icons-2">
				<h3>Connect With Us On Social</h3>
				<a class="facebook" href="#">
					<i class="fa fa-facebook"></i>
				</a>
				<a class="twitter" href="#">
					<i class="fa fa-twitter"></i>
				</a>
				<a class="pinterest" href="#">
					<i class="fa fa-google-plus"></i>
				</a>
				<a class="linkedin" href="#">
					<i class="fa fa-linkedin"></i>
				</a>
			</div>
			<div class="col-md-7 natureinfo-newsletter">
				<h3>
					<i class="fa fa-envelope" aria-hidden="true"></i>Join our Newsletter</h3>
				<form action="#" method="post">
					<input type="email" placeholder="Enter Your Email" name="email" required="">
					<input type="submit" value="Subscribe">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="container">
			<div class="col-xs-3 logo2">
				<h2>
					<a href="#">
						<span>V</span>isao
						<span>F</span>uturo</a>
				</h2>
			</div>
			<div class="col-xs-9 ftr-menu">
				<ul>
					<li>
						<?= Html::a('Home', ['site/index', 'id' => 1], ['class' => 'site-index']) ?>
					</li>
					<li>
						<a class="scroll" href="#about">About</a>
					</li>
					<li>
						<a class="scroll" href="#services">Services</a>
					</li>
					<li>
						<a class="scroll" href="#team">Team</a>
					</li>
					<li>
						<a class="scroll" href="#projects">Projects</a>
					</li>
					<li>
						<a class="scroll" href="#contact">Contact Us</a>
					</li>
				</ul>
			</div>
			<div class="clearfix"></div>
			<div class="copy-right">
				<p> &copy; 2018 Green Life. All Rights Reserved.</p>
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


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
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

window.onload = function () {
document.getElementById("password1").onchange = validatePassword;
document.getElementById("password2").onchange = validatePassword;
}

function validatePassword() {
var pass2 = document.getElementById("password2").value;
var pass1 = document.getElementById("password1").value;
if (pass1 != pass2)
  document.getElementById("password2").setCustomValidity("Passwords Don't Match");
else
  document.getElementById("password2").setCustomValidity('');
//empty string means no validation error
}

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
