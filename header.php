<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- <link rel="icon" href="../../favicon.ico"> -->

	<title><?php echo bloginfo('name'); ?></title>

	<!-- Bootstrap core CSS -->
	<?php 
      wp_head();
     ?>
	

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]--> 
</head>

<body>

	<!-- Fixed navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top primary-bg">

		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt=""></a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<?php 
				    $args = array(
				      'menu_class' => 'nav navbar-nav navbar-right',
				      'theme_location' => 'primary'
				    );
				    wp_nav_menu($args); 
				?> 
				<!-- <ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="./index.html">EXPERTISE & IMPACT</a></li>
					<li><a href="./client-service.html">CLIENT SERVICE </a></li>
					<li><a href="./about.html">ABOUT G&C</a></li> 
					<li><a href="./join.html">JOIN GONZALES</a></li> 
					<li><a href="./accreditation.html">ACCREDITATION</a></li> 
					<li><a href="./index.html"><i class="fa fa-search"></i> <span class="visible-xs">SEARCH</span> </a></li> 
				</ul> -->
			</div><!--/.nav-collapse -->
		</div>
		<img src="<?php echo get_template_directory_uri(); ?>/assets/navbar-white-half.png" alt="" class="navbar-half hidden-xs hidden-sm"> 
	</nav>