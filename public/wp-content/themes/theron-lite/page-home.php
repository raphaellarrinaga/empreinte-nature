

<?php

/*

Template Name: Home Page Template

*/

?>

<?php get_header(); ?>





<!--<div id="slider">

<?php get_template_part(''.$zn_slides = of_get_option('slider_select', 'nivo').''); ?>

</div>

<div class="slide_shadow"></div>-->







<!--Welcome message-->

<?php if ( of_get_option('wlcm_textarea') ) { ?><div id="thn_welcom"><p><?php echo of_get_option('wlcm_textarea'); ?></p></div><?php } ?>

<!--Welcome message END-->





<!--MIDROW STARTS-->

<?php if(of_get_option('blocks_checkbox') == "1"){ ?>

<div class="midrow">



 <div class="midrow_wrap">       

        <div class="midrow_blocks">   

        <div class="midrow_blocks_wrap">

        <?php if ( of_get_option('block1_textarea') ) { ?>

        <div class="midrow_block">

        <div class="mid_block_content">

        <h3><?php echo of_get_option('block1_text'); ?></h3>

        <p><?php echo of_get_option('block1_textarea'); ?></p>

     <?php if ( of_get_option('block1_link') ) { ?><a href="<?php echo of_get_option('block1_link'); ?>" class="blocklink"><?php _e('More', 'theron'); ?></a><?php } ?>

        </div>

        </div>

        <?php } ?>

        <?php if ( of_get_option('block2_textarea') ) { ?>

        <div class="midrow_block">

        <div class="mid_block_content">

        <h3><?php echo of_get_option('block2_text'); ?></h3>

        <p><?php echo of_get_option('block2_textarea'); ?></p>

     <?php if ( of_get_option('block2_link') ) { ?><a href="<?php echo of_get_option('block2_link'); ?>" class="blocklink"><?php _e('More', 'theron'); ?></a><?php } ?>

        </div>

        </div>

        <?php } ?>

        <?php if ( of_get_option('block3_textarea') ) { ?>

        <div class="midrow_block">

        <div class="mid_block_content">

        <h3><?php echo of_get_option('block3_text'); ?></h3>

        <p><?php echo of_get_option('block3_textarea'); ?></p>

     <?php if ( of_get_option('block3_link') ) { ?><a href="<?php echo of_get_option('block3_link'); ?>" class="blocklink"><?php _e('More', 'theron'); ?></a><?php } ?>

        </div>

        </div>

         <?php } ?>

        <?php if ( of_get_option('block4_textarea') ) { ?>

        <div class="midrow_block">

        <div class="mid_block_content">

        <h3><?php echo of_get_option('block4_text'); ?></h3>

        <p><?php echo of_get_option('block4_textarea'); ?></p>

     <?php if ( of_get_option('block4_link') ) { ?><a href="<?php echo of_get_option('block4_link'); ?>" class="blocklink"><?php _e('More', 'theron'); ?></a><?php } ?>

        </div>

        </div>

        <?php } ?>

</div>

        </div>

                

        

    </div>



</div>

<?php }?>



<!--MIDROW END-->







<!--Layout-->



<!--LATEST POSTS-->



	<?php if(of_get_option('latstpst_checkbox') == "1"){ ?>

    <?php 

	 $args = array(

				   'post_type' => 'post',

				   'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1));

	query_posts($args);

 ?>

	<?php get_template_part(''.$zn_lays = of_get_option('layout_images', 'layout1').''); ?>

	<?php } else { ?>

	<?php } ?>







<!--LATEST POSTS END-->



<!--Layout END-->







<?php get_footer(); ?>