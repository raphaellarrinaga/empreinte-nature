<?php

add_action( 'after_setup_theme', 'nature_setup' );
function nature_setup() {
  load_theme_textdomain( 'nature', get_template_directory() . '/languages' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'responsive-embeds' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'html5', array( 'search-form', 'navigation-widgets' ) );
  add_theme_support( 'woocommerce' );
  global $content_width;
  if ( !isset( $content_width ) ) { $content_width = 1920; }
  register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'nature' ) ) );
}

add_action( 'wp_enqueue_scripts', 'nature_enqueue' );
function nature_enqueue() {
  wp_enqueue_style( 'nature-style', get_stylesheet_uri() );
  wp_enqueue_script( 'jquery' );
}

add_filter( 'document_title_separator', 'nature_document_title_separator' );
function nature_document_title_separator( $sep ) {
  $sep = esc_html( '|' );
  return $sep;
}

add_filter( 'the_title', 'nature_title' );
function nature_title( $title ) {
  if ( $title == '' ) {
    return esc_html( '...' );
  } else {
    return wp_kses_post( $title );
  }
}

function nature_schema_type() {
  $schema = 'https://schema.org/';
  if ( is_single() ) {
    $type = "Article";
  } elseif ( is_author() ) {
    $type = 'ProfilePage';
  } elseif ( is_search() ) {
    $type = 'SearchResultsPage';
  } else {
    $type = 'WebPage';
  }
  echo 'itemscope itemtype="' . esc_url( $schema ) . esc_attr( $type ) . '"';
}

add_filter( 'nav_menu_link_attributes', 'nature_schema_url', 10 );
function nature_schema_url( $atts ) {
  $atts['itemprop'] = 'url';
  return $atts;
}

if ( !function_exists( 'nature_wp_body_open' ) ) {
  function nature_wp_body_open() {
    do_action( 'wp_body_open' );
  }
}

add_action( 'wp_body_open', 'nature_skip_link', 5 );
function nature_skip_link() {
  echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'nature' ) . '</a>';
}

add_filter( 'the_content_more_link', 'nature_read_more_link' );
function nature_read_more_link() {
  if ( !is_admin() ) {
    return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'nature' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
  }
}

add_filter( 'excerpt_more', 'nature_excerpt_read_more_link' );
function nature_excerpt_read_more_link( $more ) {
  if ( !is_admin() ) {
    global $post;
    return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'nature' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
  }
}

// add_filter( 'big_image_size_threshold', '__return_false' );
// add_filter( 'intermediate_image_sizes_advanced', 'nature_image_insert_override' );
// function nature_image_insert_override( $sizes ) {
//   unset( $sizes['medium_large'] );
//   unset( $sizes['1536x1536'] );
//   unset( $sizes['2048x2048'] );
//   return $sizes;
// }

// Define custom images styles and srcset values.
add_action( 'after_setup_theme', 'nature_setup_thumbnails' );
function nature_setup_thumbnails() {
  add_image_size( 'image', 240, 240 );
  add_image_size( 'image-2x', 480, 480 );
  add_image_size( 'image-3x', 620, 620 );

  add_image_size( 'small', 420, 300 );
  add_image_size( 'medium', 769, 400 );
  add_image_size( 'big', 1350, 620 );
  add_image_size( 'default', 1860, 800 );
}

function nature_post_thumbnail( $post_id, $size = 'image', $class = '' )
{
  $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size )[0];
  $thumbnail_2x = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size . '-2x' )[0];
  $thumbnail_3x = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size . '-3x' )[0];

  $image  = '<img src="' . $thumbnail . '"';
  $image .= ( $thumbnail_2x && $thumbnail_3x ? ' srcset="' : '' );
  $image .= ( $thumbnail_2x ? $thumbnail_2x . ' 2x' : '' );
  $image .= ( $thumbnail_2x && $thumbnail_3x ? ', ' : '' );
  $image .= ( $thumbnail_3x ? $thumbnail_3x . ' 3x' : '' );
  $image .= ( $thumbnail_2x && $thumbnail_3x ?  '"' : '' );
  $image .= ( $class ? ' class="' . esc_attr($class) . '"' : '' );
  $image .= ' sizes="auto">';

  // $default = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size )[0];
  // $small = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'small' . '-2x' )[0];
  // $medium = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'medium' . '-3x' )[0];
  // $big = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'big' . '-3x' )[0];
  // $wide = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'wide' . '-3x' )[0];

  return $image;
}

function nature_post_banner( $post_id, $size = 'default', $class = '' ) {
  $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size )[0];
  $small = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'small' )[0];
  $medium = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'medium' )[0];
  $big = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'big' )[0];

  $image  = '<img src="' . $thumbnail . '"';

  $image .= ( $small && $medium && $big ?  ' srcset="' : '' );
  $image .= ( $small ? $small . ' 420w' : '' );
  $image .= ( $small && $medium && $big ? ', ' : '' );
  $image .= ( $medium ? $medium . ' 769w' : '' );
  $image .= ( $small && $medium && $big ? ', ' : '' );
  $image .= ( $big ? $big . ' 1350w' : '' );
  $image .= ( $small && $medium && $big ?  '"' : '' );

  $image .= ( $class ? ' class="' . esc_attr($class) . '"' : '' );
  $image .= ' sizes="auto">';

  return $image;
}

// Set widget areas.
add_action( 'widgets_init', 'nature_widgets_init' );
function nature_widgets_init() {
  register_sidebar( array(
    'name' => esc_html__( 'Sidebar Widget Area', 'nature' ),
    'id' => 'primary-widget-area',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
  register_sidebar( array(
    'name' => esc_html__( 'Widget Homepage', 'nature' ),
    'id' => 'homepage-widget-area',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
}

add_action( 'wp_head', 'nature_pingback_header' );
function nature_pingback_header() {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
  }
}

add_action( 'comment_form_before', 'nature_enqueue_comment_reply_script' );
function nature_enqueue_comment_reply_script() {
  if ( get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}

function nature_custom_pings( $comment ) {
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
  <?php
}

add_filter( 'get_comments_number', 'nature_comment_count', 0 );
function nature_comment_count( $count ) {
  if ( !is_admin() ) {
    global $id;
    $get_comments = get_comments( 'status=approve&post_id=' . $id );
    $comments_by_type = separate_comments( $get_comments );
    return count( $comments_by_type['comment'] );
  } else {
    return $count;
  }
}

// Add Google analytics script.
add_action('wp_head', 'nature_add_googleanalytics', 20);
function nature_add_googleanalytics() { ?>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-GX1MTJHNRS"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-GX1MTJHNRS');
  </script>
<?php }

// Add Google font.
add_action('wp_enqueue_scripts', 'nature_add_google_fonts');
function nature_add_google_fonts() {
  wp_enqueue_style('add_google_fonts', 'https://fonts.googleapis.com/css2?family=Amatic+SC&family=Inter:wght@400;500;700&display=swap', false );
}

// Set image path variable.
function nature_get_image_path() {
  $theme_name_images = get_bloginfo('stylesheet_directory') . '/assets/images/';
  return $theme_name_images;
}
