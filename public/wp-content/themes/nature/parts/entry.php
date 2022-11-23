<?php
  // Partial template for an "entry" (custom naming) typically post detail.
?>
<article id="post post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="l-constrain">
    <header class="post__header">
      <h1 class="post__title" itemprop="headline">
        <?php the_title(); ?>
      </h1>
      <?php // edit_post_link(); ?>
    </header>
    <?php get_template_part( 'parts/entry', ( is_front_page() || is_home() || is_front_page() && is_home() || is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
    <?php // if ( is_singular() ) { get_template_part( 'parts/entry-footer' ); } ?>
  </div>
</article>
