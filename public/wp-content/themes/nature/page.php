<?php
  // Template for a post type "page" only.
?>
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article class="post post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="l-constrain">
    <header class="post__header">
      <h1 class="post__title" itemprop="name"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
    </header>
    <div class="post__content" itemprop="mainContentOfPage">
      <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); } ?>
      <?php the_content(); ?>
      <div class="post__links"><?php wp_link_pages(); ?></div>
    </div>
  <div class="l-constrain">
</article>

<?php if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
