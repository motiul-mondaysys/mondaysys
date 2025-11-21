<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mondaysys' ); ?></a>

<header class="site-header">
  <div class="container">
    <div class="grid-row align-item-center position-relative" style="--desk-col: 2.5fr 9.5fr; --tab-col: 1fr 1fr; --mob-col:1fr 1fr;">
        <div class="site-branding">
          <?php
          if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
              the_custom_logo();
          } else { ?>
            <a class="site-title" href="<?php echo esc_url( home_url('/') ); ?>">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>"/> 
            </a>
          <?php } ?>
        </div>
        <div class="header_menu">
          <nav class="site-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'my-theme'); ?>">
            <?php
            wp_nav_menu(array(
              'theme_location' => 'primary',
              'container'      => false,
              'menu_class'     => 'primary-menu unorder-list',
              'walker'         => new Mega_Menu_Walker(),
            ));
            ?>
          </nav>
          <a class="btn btn-primary" href="/contact-us/">Contact us</a>

          <!-- Mobile Menu Button -->
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>

    </div>
  </div><!--.container-->
</header>

<main id="site-content" role="main">

