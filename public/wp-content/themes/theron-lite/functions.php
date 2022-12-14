<?php	



if ( ! isset( $content_width ) )

	$content_width = 630;



	

//Load Mobile CSS	

function theron_mobile_css() { 

if ( !is_admin() ) {	

//wp_enqueue_style( 'theron_mobile', get_template_directory_uri() . '/mobile.css', false, '1.0', 'only screen and (max-width: 480px)' );



	}

}

add_action('wp_enqueue_scripts', 'theron_mobile_css');	





//Load Other CSS files

function theron_other_css() { 

if ( !is_admin() ) {

if(of_get_option('disslight_checkbox') == "0"){ ?><?php wp_enqueue_style('fancybox',get_template_directory_uri().'/css/fancybox.css'); }

if(of_get_option('gglfont_checkbox') == "0"){ ?><?php wp_enqueue_style('customfont',get_template_directory_uri().'/fonts/'.$zn_fonts = of_get_option('font_select', 'ubuntu' ).'.css'); }

	}

}

add_action('wp_enqueue_scripts', 'theron_other_css');	





//Load Custom CSS

function theron_customstyle() { ?>



<?php if(of_get_option('sldrtxt_checkbox') == "0"){ ?> <style type="text/css">body .nivo-caption{ display:none!important;}</style><?php } ?>





<?php /*?>ROUNDED CORNER<?php */?>

<?php if(of_get_option('rounded_checkbox') == "1"){ ?>    

<style type="text/css">

.skew_bottom_big, .skew_bottom_right, .skew_top_big, .skew_top_right, .single_skew, .single_skew .skew_bottom_big, .single_skew .skew_bottom_right, .depth-1 .single_skew, .single_skew_comm, .single_skew_comm .skew_top_big, .single_skew_comm .skew_top_right, #respond_wrap .single_skew, #respond_wrap .single_skew_comm{display:none!important;}

.commentlist .depth-1{ margin-top:10px;}

.midrow_blocks{overflow:hidden;}



<?php if(of_get_option('slider_select') == "noslider"){ ?>

body .header2 #menu_wrap{border-radius:8px; -moz-border-radius:8px; -webkit-border-radius:8px;behavior: url(<?php echo get_template_directory_uri(); ?>/images/PIE.htc);}

body .header1 #menu_wrap, body .header1 #header{border-radius:8px; -moz-border-radius:8px; -webkit-border-radius:8px;behavior: url(<?php echo get_template_directory_uri(); ?>/images/PIE.htc);}

.slide_shadow{ display:none;}

<?php } ?>



.home #topmenu, #header, .lay1 .post .imgwrap, .header2 #menu_wrap, .logo{border-radius: 8px 8px 0 0; -moz-border-radius: 8px 8px 0 0; -webkit-border-radius: 8px 8px 0 0;behavior: url(<?php echo get_template_directory_uri(); ?>/images/PIE.htc);}



.single-post #menu_wrap, .page #menu_wrap{border-radius: 0 0 8px 8px; -moz-border-radius: 0 0 8px 8px; -webkit-border-radius: 0 0 8px 8px;behavior: url(<?php echo get_template_directory_uri(); ?>/images/PIE.htc);}



.single-post .header3 #menu_wrap, .page .header3 #menu_wrap{ border-radius: 0px; -moz-border-radius: 0px; -webkit-border-radius: 0px;behavior: url(<?php echo get_template_directory_uri(); ?>/images/PIE.htc);}



#zn_slider, #topmenu ul li ul{border-radius: 0 0 8px 8px; -moz-border-radius: 0 0 8px 8px; -webkit-border-radius: 0 0 8px 8px;behavior: url(<?php echo get_template_directory_uri(); ?>/images/PIE.htc);}

#topmenu, .midrow_blocks, #footer, #copyright, .lay1 .hentry, .single_post, #sidebar .widgets .widget, #commentform, .comment-form-comment textarea, .form-submit input, #searchsubmit, #related_wrap ul, .znn_paginate span, .znn_paginate a, .navigation a, .navigation span, .lay2, .lay3 .post_image, .lay3 .post_content, .comment-form-author input, .comment-form-email input, .comment-form-url input, #thn_welcom, .thn_paginate span, .thn_paginate a, .navigation a, .navigation span, .single-post #header, .page #header, #newslider_home .news_buttn, .single-post .header2 #menu_wrap, .page .header2 #menu_wrap, .lay2 .hentry, .lay4 .hentry, .lay3 .hentry, #newslider, .comments_template{border-radius:8px; -moz-border-radius:8px; -webkit-border-radius:8px;behavior: url(<?php echo get_template_directory_uri(); ?>/images/PIE.htc);}

#commentform label{border-radius: 8px 0 0 8px; -moz-border-radius: 8px 0 0 8px; -webkit-border-radius: 8px 0 0 8px;behavior: url(<?php echo get_template_directory_uri(); ?>/images/PIE.htc);}

#copyright{ margin-top:20px;}

</style>

<?php } ?>





<?php if(of_get_option('nivothumb_checkbox') == "0"){ ?> 

<style type="text/css">

.nivo-controlNav{ display:none;}

</style>

<?php } ?>

<style type="text/css">

/*Secondary Elements Color*/

#newslider_home ul#tabs_home li a.current, #newslider_home .news_buttn, .midrow_block:hover, .lay1 .catmeta, .lay4 .catmeta, #wp-calendar #today, .form-submit input, #searchsubmit, .single_post .scl_button a, .entry-content #submit_msg, .amp_current, .amp_current:hover{ background:<?php echo of_get_option('secelm_colorpicker'); ?>!important;}



.lay1 .postitle a:hover, .lay2 .postitle a:hover, .lay3 .postitle a:hover, .lay4 .postitle a:hover, .lay5 .postitle a:hover, .thn_twitter .tweet_text a, .widget_tag_cloud a:hover, .textwidget a, #newslider h3, ul#tabs li a:hover, .comments_template #comments a, .commentmetadata, .commentmetadata a, .org_comment a, .org_ping a, h3#reply-title, .logged-in-as a, .archive-template ul li a:hover, .single_wrap .thn_post_wrap a, #footer .widgets .widgettitle, #midrow .widgets .widgettitle a, #thn_welcom a{color:<?php echo of_get_option('secelm_colorpicker'); ?>!important;}



.nivo-caption, .lay2 .post_content, #sidebar .widgettitle, #sidebar .widgettitle a {border-color:<?php echo of_get_option('secelm_colorpicker'); ?>;}

#topmenu{ border-bottom-color:<?php echo of_get_option('secelm_colorpicker'); ?>!important;}



body #topmenu ul > li ul li:hover, .menu_active{}



<?php if(of_get_option('pattrndiss_checkbox') == "1"){ ?>

#header, #topmenu ul li ul li, .lay2 .post_content, #copyright, body #topmenu ul > li ul li:hover{ background-image:none!important;}

body #menu_wrap, #topmenu ul li ul li{ background:#302F2F url("<?php echo get_template_directory_uri(); ?>/images/transblack.png") repeat!important;}

<?php } ?>



/*TEXT COLOR ON SECONDARY ELEMENTS*/

.midrow_block:hover h3, .form-submit input, #searchsubmit, #topmenu ul > li ul li:hover > a, .lay1 .catmeta a, .lay4 .catmeta a, .amp_current, .entry-content #submit_msg, .single_post .scl_button a, #topmenu ul li ul li:hover a, .midrow_block:hover, .midrow_block:hover a, #menu-icon{color:<?php echo of_get_option('secelmtxt_colorpicker'); ?>!important;}



</style>

<?php }



add_action( 'wp_head', 'theron_customstyle' );







//Load Java Scripts to header

function theron_head_js() { 

if ( !is_admin() ) {

wp_enqueue_script('jquery');

wp_enqueue_script('theron_js',get_template_directory_uri().'/theron.js');

wp_enqueue_script('theron_other',get_template_directory_uri().'/js/other.js');

if(of_get_option('slider_select') == "nivo"){ wp_enqueue_script('theron_nivo',get_template_directory_uri().'/js/jquery.nivo.js');}

if(of_get_option('disslight_checkbox') == "0"){ wp_enqueue_script('theron_fancybox',get_template_directory_uri().'/js/fancybox.js'); }

if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

}

}

add_action('wp_enqueue_scripts', 'theron_head_js');



//Load Java Scripts to Footer

add_action('wp_footer', 'theron_load_js');



function theron_load_js() { ?>



<?php if(of_get_option('slider_select') == "nivo"){ ?>

    <script type="text/javascript">

    jQuery(window).load(function() {

		

		 if(jQuery.support.touch){

			 jQuery('#zn_nivo').nivoSlider({

                        effect: 'slideInLeft',

                        animSpeed: 250, // Slide transition speed

                        pauseTime: <?php echo of_get_option('sliderspeed_text'); ?> // How long each slide will show

                    });

 

                    jQuery('a.nivo-nextNav').css('visibility', 'hidden');

                    jQuery('a.nivo-prevNav').css('visibility', 'hidden');

 

                    //Then Finish Up swipeleft and swiperight

                    jQuery('#zn_nivo').bind( 'swipeleft', function( e ) {

                        jQuery('#zn_nivo img').attr("data-transition","slideInLeft");

                        jQuery('a.nivo-nextNav').trigger('click');

                        e.stopImmediatePropagation();

                        return false; }     

                    );  

 

                    jQuery('#zn_nivo').bind( 'swiperight', function( e ) {

                        jQuery('#zn_nivo img').attr("data-transition","slideInRight");

                        jQuery('a.nivo-prevNav').trigger('click');

                        e.stopImmediatePropagation();

                        return false; } 

 

                    ); 

 

			 } else { 

			 

        jQuery('#zn_nivo').nivoSlider({effect: 'random', pauseTime: <?php echo of_get_option('sliderspeed_text'); ?>, controlNavThumbs: true,<?php if(of_get_option('nivothumb_checkbox') == "1"){ ?> directionNav: false,<?php } ?> controlNavThumbsReplace: '-150x150.jpg', pauseOnHover: true});}

    });

    </script>

<?php } ?>   

 <?php if(of_get_option('stickm_checkbox') == "1"){ ?>   

    <script type="text/javascript"> 

	/* <![CDATA[ */   

    //Sticky MENU

	//jQuery(window).load(function($) {

	if (jQuery(window).width() > 500) {

	if (jQuery("body").hasClass('logged-in')) {

			jQuery("#menu_wrap").sticky({topSpacing:27});

		}

		else {

			jQuery("#menu_wrap").sticky({topSpacing:0});

	}

	jQuery("#menu_wrap").css({"z-index":"11"});

	}

	//});

	/* ]]> */

	</script>

<?php } ?>



     <script type="text/javascript">

	/* <![CDATA[ */

		jQuery().ready(function() {



	jQuery('#topmenu').prepend('<div id="menu-icon"><?php _e('Menu', 'theron') ?></div>');

	jQuery("#menu-icon").on("click", function(){

		jQuery("#topmenu ul.menu, #topmenu div.menu ul").slideToggle();

		jQuery(this).toggleClass("menu_active");

	});



		});

	/* ]]> */

	</script>



    <?php } 



//theron get the first image of the post Function

function theron_get_images($overrides = '', $exclude_thumbnail = false)

{

    return get_posts(wp_parse_args($overrides, array(

        'numberposts' => -1,

        'post_parent' => get_the_ID(),

        'post_type' => 'attachment',

        'post_mime_type' => 'image',

        'order' => 'ASC',

        'exclude' => $exclude_thumbnail ? array(get_post_thumbnail_id()) : array(),

        'orderby' => 'menu_order ID'

    )));

}







// Change what's hidden by default

add_filter('default_hidden_meta_boxes', 'theron_hidden_meta_boxes', 10, 2);

function theron_hidden_meta_boxes($hidden, $screen) {

	if ( 'post' == $screen->base || 'page' == $screen->base || 'slider' == $screen->base  )

		$hidden = array('slugdiv', 'trackbacksdiv', 'commentstatusdiv', 'commentsdiv', 'authordiv', 'revisionsdiv');

		// removed 'postcustom',

	return $hidden;

}



//ADD FULL WIDTH BODY CLASS

add_filter( 'body_class', 'theron_fullwdth_body_class');

function theron_fullwdth_body_class( $classes ) {

     if(of_get_option('nosidebar_checkbox') == "1")

          $classes[] = 'theron_fullwdth_body';

     return $classes;

}



//Custom Excerpt Length

function theron_excerptlength_teaser($length) {

    return 30;

}

function theron_excerptlength_index($length) {

    return 12;

}

function theron_excerptmore($more) {

    return '...';

}



function theron_excerpt($length_callback='', $more_callback='') {

    global $post;

    if(function_exists($length_callback)){

        add_filter('excerpt_length', $length_callback);

    }

    if(function_exists($more_callback)){

        add_filter('excerpt_more', $more_callback);

    }

    $output = get_the_excerpt();

    $output = apply_filters('wptexturize', $output);

    $output = apply_filters('convert_chars', $output);

    $output = '<p>'.$output.'</p>';

    echo $output;

}



//SIDEBAR

function theron_widgets_init(){

	register_sidebar(array(

	'name'          => __('Right Sidebar', 'theron'),

	'id'            => 'sidebar',

	'description'   => __('Right Sidebar', 'theron'),

	'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget_wrap">',

	'after_widget'  => '</div></div>',

	'before_title'  => '<h3 class="widgettitle">',

	'after_title'   => '</h3>'

	));

	

	register_sidebar(array(

	'name'          => __('Footer Widgets', 'theron'),

	'id'            => 'foot_sidebar',

	'description'   => __('Widget Area for the Footer', 'theron'),

	'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget_wrap">',

	'after_widget'  => '</div></div>',

	'before_title'  => '<h3 class="widgettitle">',

	'after_title'   => '</h3>'

	));

}



add_action( 'widgets_init', 'theron_widgets_init' );





//theron COMMENTS

function theron_comment($comment, $args, $depth) {

   $GLOBALS['comment'] = $comment; ?>

   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">



     <div id="comment-<?php comment_ID(); ?>" class="comment-body">

      <div class="comment-author vcard">

      <div class="avatar"><?php echo get_avatar($comment,$size='50' ); ?></div>

      </div>

      <div class="comment-meta commentmetadata">

      <?php printf(__('%s', 'theron'), get_comment_author_link()) ?> <span><?php _e('says:', 'theron') ?></span>

        </div>

      <?php if ($comment->comment_approved == '0') : ?>

         <em><?php _e('Your comment is awaiting moderation.', 'theron') ?></em>

         <br />

      <?php endif; ?>



      <div class="org_comment"><?php comment_text() ?>

      	

      	<div class="comm_meta_reply">

        <a class="comm_date"><?php printf(get_comment_date()) ?></a>

        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

        <?php edit_comment_link(__('Edit', 'theron'),'  ','') ?></div>

     </div>

     

     </div>

<?php

        }

		

//**************TRACKBACKS & PINGS******************//

function theron_ping($comment, $args, $depth) {

 

$GLOBALS['comment'] = $comment; ?>

	

   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

   

     <div id="comment-<?php comment_ID(); ?>" class="comment-body">

      <?php if ($comment->comment_approved == '0') : ?>

         <em><?php _e('Your comment is awaiting moderation.', 'theron') ?></em>

         <br />

      <?php endif; ?>



      <div class="org_ping">

      	<?php printf(__('<cite class="citeping">%s</cite> <span class="says">:</span>'), get_comment_author_link()) ?>

	  	<?php comment_text() ?>

            <div class="comm_meta_reply">

            <a class="comm_date"><?php printf(get_comment_date()) ?></a>

            <?php edit_comment_link(__('Edit', 'theron'),'  ','') ?></div>

     </div>

     </div>

     

     

<?php }



//**************SLIDER SETUP******************//

add_action('init', 'theron_slider_register');

 

function theron_slider_register() {

 

	$labels = array(

		'name' => __('Slider', 'theron'),

		'singular_name' => __('Slider Item', 'theron'),

		'add_new' => __('Add New', 'theron'),

		'add_new_item' => __('Add New Slide', 'theron'),

		'edit_item' => __('Edit Slides', 'theron'),

		'new_item' => __('New Slider', 'theron'),

		'view_item' => __('View Sliders', 'theron'),

		'search_items' => __('Search Sliders', 'theron'),

		'menu_icon' => get_stylesheet_directory_uri() . 'images/article16.png',

		'not_found' =>  __('Nothing found', 'theron'),

		'not_found_in_trash' => __('Nothing found in Trash', 'theron'),

		'parent_item_colon' => ''

	);

 

	$args = array(

		'labels' => $labels,

		'public' => true,

		'exclude_from_search' => true,

		'publicly_queryable' => true,

		'show_ui' => true,

		'query_var' => true,

		'menu_icon' => get_stylesheet_directory_uri() . '/images/slides.png',

		'rewrite' => false,

		'capability_type' => 'post',

		'hierarchical' => false,

		'menu_position' => null,

		'supports' => array('title','excerpt','thumbnail'),

		'register_meta_box_cb' => 'theron_add_meta'

	  ); 

 

	register_post_type( 'slider' , $args );

}

//Slider Link Meta Box

add_action("admin_init", "theron_add_meta");

 

function theron_add_meta(){

  add_meta_box("theron_credits_meta", "Link", "theron_credits_meta", "slider", "normal", "low");

}

 



function theron_credits_meta( $post ) {



  // Use nonce for verification

  $therondata = get_post_meta($post->ID, 'theron_slide_link', TRUE);

  wp_nonce_field( 'theron_meta_box_nonce', 'meta_box_nonce' ); 



  // The actual fields for data entry

  echo '<input type="text" id="theron_sldurl" name="theron_sldurl" value="'.$therondata.'" size="75" />';

}



//Save Slider Link Value

add_action('save_post', 'theron_save_details');

function theron_save_details($post_id){

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )

      return;



if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'theron_meta_box_nonce' ) ) return; 



  if ( !current_user_can( 'edit_post', $post_id ) )

        return;



$therondata = esc_url( $_POST['theron_sldurl'] );

update_post_meta($post_id, 'theron_slide_link', $therondata);

return $therondata;  

}







add_action('do_meta_boxes', 'theron_slider_image_box');



function theron_slider_image_box() {

	remove_meta_box( 'postimagediv', 'slider', 'side' );

	add_meta_box('postimagediv', __('Slide Image', 'theron'), 'post_thumbnail_meta_box', 'slider', 'normal', 'high');

}





//**************THERON SETUP******************//

function theron_setup() {

//Custom Background

add_theme_support( 'custom-background', array(

	'default-color' => '',

	'default-image' => get_template_directory_uri() . '/images/theronbg.png'

) );



add_theme_support('automatic-feed-links');



//Post Thumbnail	

   add_theme_support( 'post-thumbnails' );

   

   

//Register Menus

	register_nav_menus( array(

		'primary' => __( 'Primary Navigation', 'theron' ),

		'footer' => __( 'Footer Navigation', 'theron' )

	) );



     function collection_post_type() {

	$labels = array(
		'name'                => _x( 'R??alisations', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'R??alisations', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'R??alisations', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent R??alisations:', 'text_domain' ),
		'all_items'           => __( 'All R??alisations', 'text_domain' ),
		'view_item'           => __( 'View R??alisations', 'text_domain' ),
		'add_new_item'        => __( 'Add New R??alisations', 'text_domain' ),
		'add_new'             => __( 'New R??alisations', 'text_domain' ),
		'edit_item'           => __( 'Edit R??alisations', 'text_domain' ),
		'update_item'         => __( 'Update R??alisations', 'text_domain' ),
		'search_items'        => __( 'Search R??alisations', 'text_domain' ),
		'not_found'           => __( 'No R??alisations found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No R??alisations found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'R??alisations', 'text_domain' ),
		'description'         => __( 'R??alisations information pages', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'collection', $args );

}

// Hook into the 'init' action
add_action( 'init', 'collection_post_type', 0 );



     function plan_post_type() {

  $labels = array(
    'name'                => _x( 'Plans', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Plans', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'Plans', 'text_domain' ),
    'parent_item_colon'   => __( 'Parent plan:', 'text_domain' ),
    'all_items'           => __( 'All Plans', 'text_domain' ),
    'view_item'           => __( 'View Plans', 'text_domain' ),
    'add_new_item'        => __( 'Add New Plan', 'text_domain' ),
    'add_new'             => __( 'New Plan', 'text_domain' ),
    'edit_item'           => __( 'Edit Plan', 'text_domain' ),
    'update_item'         => __( 'Update Plan', 'text_domain' ),
    'search_items'        => __( 'Search Plans', 'text_domain' ),
    'not_found'           => __( 'No plan found', 'text_domain' ),
    'not_found_in_trash'  => __( 'No plan found in Trash', 'text_domain' ),
  );
  $args = array(
    'label'               => __( 'Plans', 'text_domain' ),
    'description'         => __( 'Plan information pages', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields', ),
    'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  register_post_type( 'plan', $args );

}

// Hook into the 'init' action
add_action( 'init', 'plan_post_type', 0 );








     function massif_post_type() {

  $labels = array(
    'name'                => _x( 'Massifs', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Massifs', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'Massifs', 'text_domain' ),
    'parent_item_colon'   => __( 'Parent massif:', 'text_domain' ),
    'all_items'           => __( 'All massifs', 'text_domain' ),
    'view_item'           => __( 'View massifs', 'text_domain' ),
    'add_new_item'        => __( 'Add New massif', 'text_domain' ),
    'add_new'             => __( 'New massif', 'text_domain' ),
    'edit_item'           => __( 'Edit massif', 'text_domain' ),
    'update_item'         => __( 'Update massif', 'text_domain' ),
    'search_items'        => __( 'Search massif', 'text_domain' ),
    'not_found'           => __( 'No massif found', 'text_domain' ),
    'not_found_in_trash'  => __( 'No massif found in Trash', 'text_domain' ),
  );
  $args = array(
    'label'               => __( 'Massifs', 'text_domain' ),
    'description'         => __( 'Plan information pages', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields', ),
    'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
    'with_front'     => true,
  );
  register_post_type( 'massif', $args );

}

// Hook into the 'init' action
add_action( 'init', 'massif_post_type', 0 );




/* 

 * Loads the Options Panel

 */

	/* Set the file path based on whether we're in a child theme or parent theme */



	if ( get_stylesheet_directory() == get_template_directory_uri() ) {

		define('OPTIONS_FRAMEWORK_URL', get_template_directory() . '/admin/');

		define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/');

	} else {

		define('OPTIONS_FRAMEWORK_URL', get_stylesheet_directory() . '/admin/');

		define('OPTIONS_FRAMEWORK_DIRECTORY', get_stylesheet_directory_uri() . '/admin/');

	}



require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');



include(get_template_directory() . '/lib/script/pagination.php');

include(get_template_directory() . '/lib/includes/shortcodes.php');

include(get_template_directory() . '/lib/includes/widgets.php');   



}

add_action( 'after_setup_theme', 'theron_setup' );

function custom_deregister_editor_expand() {
  wp_deregister_script('editor-expand');
}
add_action( 'admin_init', 'custom_deregister_editor_expand' );


function add_featured_galleries_to_ctp( $post_types ) {
    array_push($post_types, 'massif'); // ($post_types comes in as array('post','page'). If you don't want FGs on those, you can just return a custom array instead of adding to it. )
    return $post_types;
}
add_filter('fg_post_types', 'add_featured_galleries_to_ctp' );





function wp_get_attachment( $attachment_id ) {

  $attachment = get_post( $attachment_id );

  return array(
      'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
      'caption' => $attachment->post_excerpt,
      'description' => $attachment->post_content,
      'href' => get_permalink( $attachment->ID ),
      'src' => $attachment->guid,
      'title' => $attachment->post_title
  );

}
 ?>
 
