<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php nature_schema_type(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="site-header" role="banner">
      <h1 class=" site-header__logo site-logo">
      <?php
        echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home" itemprop="url">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';
      ?>
      </h1>
      <nav class="site-header__navigation site-navigation" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
        <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>' ) ); ?>
      </nav>
    </header>
    <main role="main" class="site-main">
