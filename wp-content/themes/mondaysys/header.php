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

          <!-- Search button (optional, you already have it) -->
          <button class="search-btn">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M21.875 21.875L17.2021 17.1937M19.7917 10.9375C19.7917 13.2858 18.8589 15.5379 17.1984 17.1983C15.5379 18.8588 13.2858 19.7917 10.9375 19.7917C8.58927 19.7917 6.33718 18.8588 4.6767 17.1983C3.01622 15.5379 2.08337 13.2858 2.08337 10.9375C2.08337 8.58922 3.01622 6.33713 4.6767 4.67665C6.33718 3.01618 8.58927 2.08333 10.9375 2.08333C13.2858 2.08333 15.5379 3.01618 17.1984 4.67665C18.8589 6.33713 19.7917 8.58922 19.7917 10.9375Z" stroke="black" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </button>

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

