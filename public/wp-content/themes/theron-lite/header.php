<!DOCTYPE html>



<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>



<head>



<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	



<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>



<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />



<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" >



<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />







	<?php wp_head(); ?>



    
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/custom.css" media="screen" />
<script type="text/javascript">

if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)){
{document.write('<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/customl.css"  />')}}
else {
	}
</script>
             <script type="text/javascript">

        jQuery(document).ready(function() {

jQuery(".closePage").click(function(){ jQuery( "#Div_1" ).fadeOut( "slow");})
;})
</script>

</head>











<body <?php body_class(); ?>>











<!--HEADER START-->



<div class="headcenter">



<div id="header">

        <!--MENU STARTS-->



        <div id="menu_wrap" class="is_sticky"><div class="center"><div id="topmenu">

		

        <div id="menu-left">

		  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name') ;?></a></h1>



        <div class="desc"><?php bloginfo('description')?></div>

        </div>

       <!-- <?php the_widget( 'mqTranslateWidget' ); ?> -->

		<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?></div></div></div>



        <!--MENU END-->



        











<!--<?php if ( is_singular()) {?><div class="center"><div class="slide_shadow"></div></div><?php } ?>-->



<!--HEADER END-->



    <div class="center">