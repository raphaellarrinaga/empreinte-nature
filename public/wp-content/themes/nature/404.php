<?php get_header(); ?>
<article class="post not-found l-constrain">
  <header class="header">
    <h1 class="entry-title" itemprop="name"><?php esc_html_e( 'Not Found', 'nature' ); ?></h1>
  </header>
  <div class="entry-content" itemprop="mainContentOfPage">
    <p><?php esc_html_e( 'Nothing found for the requested page. Try a search instead?', 'nature' ); ?></p>
    <?php get_search_form(); ?>
  </div>
</article>
<?php get_footer(); ?>
