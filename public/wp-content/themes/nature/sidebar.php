<?php if ( is_active_sidebar( 'primary-widget-area' ) || is_active_sidebar( 'homepage-widget-area' ) ) : ?>
<aside role="complementary">
  <div class="widget-area">
    <?php dynamic_sidebar( 'primary-widget-area' ); ?>
    <?php dynamic_sidebar( 'parts/entry', ( is_front_page() ? dynamic_sidebar( 'homepage-widget-area' ) : '' ) ); ?>
    <?php ; ?>
  </div>
</aside>
<?php endif; ?>
