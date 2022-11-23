<article id="post-<?php the_ID(); ?> entry entry--teaser" <?php post_class(); ?>>
  <div class="entry__image">
    <a href="<?php the_permalink(); ?>" rel="bookmark">
      <img src="https://placekitten.com/g/310/370" alt="" class="image-rounded">
      <?php // echo get_the_post_thumbnail_url();?>
    </a>
  </div>
  <div class="entry__content">
    <h1 class="entry__title" itemprop="headline">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
        <?php the_title(); ?>
      </a>
    </h1>
    <?php // the_excerpt(); ?>
    <?php edit_post_link(); ?>
  </div>
</article>
