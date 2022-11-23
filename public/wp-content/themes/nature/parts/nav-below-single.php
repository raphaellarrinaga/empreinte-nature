<section class="more-like-this l-constrain">
  <header class="header-more">
    <h1><?php esc_html_e( 'Ça vous inspire ? Allez voir la suite', 'nature' ); ?></h1>
    <a href="<?php echo site_url('/garden'); ?>">→ <?php esc_html_e( 'Tous les jardins', 'nature' ); ?></a>
  </header>
  <?php the_category( ', ' ); ?>
  <div class="entry-grid">
    <?php
    // More like this / related posts
    $current_post_type = get_post_type();
    $the_query = new WP_Query( array(
      'post_type' => $current_post_type,
      'posts_per_page' => 4,
      'post__not_in'  => array(get_the_ID())
    ));
    ?>
    <?php if ( $the_query->have_posts() ) : ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php get_template_part( 'parts/entry', 'teaser' ); ?>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
</section>
