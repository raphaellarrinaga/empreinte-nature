<?php
  // Top level template for a post detail.
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'parts/entry' ); ?>
<?php if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
<?php endwhile; endif; ?>

<footer class="footer">
  <?php get_template_part( 'parts/nav', 'below-single' ); ?>
</footer>
<?php get_footer(); ?>
