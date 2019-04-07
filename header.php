<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
  <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
    <title><?php wp_title(); ?></title>
    <!-- Bootstrap -->
    <link href="<?php echo get_template_directory_uri(); ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

<div class="container">
      <div class="row">
        <div class="col-md-12 header">
			<h1 class="site-title"><a href="/"><?php bloginfo('name'); ?></a></h1>
			<h2 class="site-description"><?php bloginfo('description'); ?></h2>

			<nav class="navbar navbar-expand-lg navbar-light">
				<!-- <a class="nav-title d-sm-block d-lg-none ml-auto" href="#">menu</a> -->

				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="nav-title d-sm-block d-lg-none ml-auto">menu</span>
				<i class="fa fa-angle-down" aria-hidden="true"></i>
				<!-- <span class="navbar-toggler-icon"></span> -->
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<?php

                         $menu_1_args = array(
                              'theme_location'  => 'main_menu',
                              'menu'            => 'main_menu',
                              'container'       => '',
                              'container_class' => '',
                              'container_id'    => '',
                              'menu_class'      => 'navbar-nav mr-auto',
                              'menu_id'         => '',
                              'echo'            => true,
                              'fallback_cb'     => 'wp_page_menu',
                              'before'          => '',
                              'after'           => '',
                              'link_before'     => '',
                              'link_after'      => '',
                              'items_wrap'      => '<ul id="%1$s" class="%2$s" style="list-style-type: none;">%3$s</ul>',
                              'depth'           => 0,
                              /*'walker'          => new wp_bootstrap_navwalker()*/
                              'walker'          => new bs4navwalker()
                         );

                        wp_nav_menu( $menu_1_args );

               ?>
				</div>
			</nav>



        </div>
      </div>
    </div>
