<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
</head>
<body <?php body_class(); ?>>
  <div id="wrapper" class="hfeed">
  <header id="header" role="banner">
    <div class="navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button aria-expanded="false" aria-controls="bs-navbar" data-target="#bs-navbar" data-toggle="collapse" type="button" class="navbar-toggle collapsed"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="/"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
        </div>
        <div id="bs-navbar" class="collapse navbar-collapse">
          <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'nav navbar-nav navbar-right' ) ); ?>
        </div>
      </div>
    </div>
  </header>
  <div id="container">
