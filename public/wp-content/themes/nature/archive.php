<?php get_header(); ?>
<header class="page-header l-constrain">
  <h1 class="page-title" itemprop="name"><?php the_archive_title(); ?></h1>
</header>

<section class="entry-grid l-constrain">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php get_template_part( 'parts/entry', 'teaser' ); ?>
  <?php endwhile; endif; ?>
</section>

<?php get_template_part( 'parts/nav', 'below' ); ?>
<?php get_footer(); ?>
