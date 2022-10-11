<?php get_header(); ?>
<?php if ( is_home() ) { ?>
<div id="slider">
<?php get_template_part(''.$zn_slides = of_get_option('slider_select', 'nivo').''); ?>
</div>
<div class="slide_shadow"></div>
<?php } ?>

<!--Welcome message-->
<?php if ( is_home() ) { ?>
<?php if ( of_get_option('wlcm_textarea') ) { ?><div id="thn_welcom"><p><?php echo of_get_option('wlcm_textarea'); ?></p></div><?php } ?>
<?php } ?>
<!--Welcome message END-->

<!--MIDROW STARTS-->
<?php if ( is_home() ) { ?>
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
<?php } ?>
<!--MIDROW END-->



<!--Layout-->

<!--LATEST POSTS-->

<div class="lay1">

<div class="lay1_wrap">

<div id="massif-content">
<?php 
$id=1302; 
$post = get_post($id); 
$content = apply_filters('the_content', $post->post_content); 
echo $content;  
?>
</div>
<div id="massif-flex">

<?php if(of_get_option('frontcat_checkbox') == "1"){ ?>

<?php if(is_front_page()) { 

	 $args = array(

				   'cat' => ''.$zn_front = of_get_option('front_cat').'',

				   'post_type' => 'post',

				   'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),

				   'posts_per_page' => ''.$zn_fonts = of_get_option('frontnum_select').'');

	query_posts($args);

} ?>

<?php }?>



                   <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 

                             

 

            

                <div class="post_image">

                     <!--CALL TO POST IMAGE-->

                    <?php if ( has_post_thumbnail() ) : ?>

                    <div class="imgwrap">

						<!--<div class="catmeta"><?php $category = get_the_category(); if($category[0]){echo '<a href="'.get_category_link($category[0]->term_id ).'">+'.$category[0]->cat_name.'</a>';}?></div>-->

                        

                       <!-- <div class="date_meta"><?php the_time('d'); ?><?php the_time('S'); ?> <?php the_time('M'); ?> <?php the_time('Y'); ?></div>-->

                        

                   <a href="<?php the_permalink();?>">
                    
                    
                          
               <?php $categoryb = get_category( get_query_var( 'cat' ) );
    $cat_idb = $categoryb->cat_ID; if ($cat_idb == 3) { ?>
              
                    
                    <a class="various1 fancybox" rel="gallery1" href="#inline<?php echo $post->ID; ?>" title="<?php the_title(); ?> // <?php theron_excerpt('theron_excerptlength_teaser', 'theron_excerptmore'); ?>"><?php the_post_thumbnail('large'); ?></a><!--</a>--></div>
   <?php }
				
				
				else {?>
					
					
                              <?php the_post_thumbnail('large'); ?></a></div>
<?php }?>
                    <?php elseif($photo = theron_get_images('numberposts=1', true)): ?>

    

                    <div class="imgwrap">

						<!--<div class="catmeta"><?php $category = get_the_category(); if($category[0]){echo '<a href="'.get_category_link($category[0]->term_id ).'">+'.$category[0]->cat_name.'</a>';}?></div>-->

                        

                       <!-- <div class="date_meta"><?php the_time('d'); ?><?php the_time('S'); ?> <?php the_time('M'); ?> <?php the_time('Y'); ?></div>-->                      

                        

                	<!--<a href="<?php the_permalink();?>">--><?php echo wp_get_attachment_image($photo[0]->ID ,'large'); ?><!--</a>--></div>

                

                    <?php else : ?>

                    

                    <div class="imgwrap">

						<!--<div class="catmeta"><?php $category = get_the_category(); if($category[0]){echo '<a href="'.get_category_link($category[0]->term_id ).'">+'.$category[0]->cat_name.'</a>';}?></div>-->

                       <!-- <div class="date_meta"><?php the_time('d'); ?><?php the_time('S'); ?> <?php the_time('M'); ?> <?php the_time('Y'); ?></div>-->

                        

                    <!--<a href="<?php the_permalink();?>">--><img src="<?php echo get_template_directory_uri(); ?>/images/blank_img.png" alt="<?php the_title_attribute(); ?>" class="thn_thumbnail"/><!--</a>--></div>   

                             

                    <?php endif; ?>

                </div>

                

                

                <div class="post_content">

                    <h2 class="postitle"><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></h2>

               
               <?php $categoryb = get_category( get_query_var( 'cat' ) );
    $cat_idb = $categoryb->cat_ID; if ($cat_idb == 3) { ?>
              
              
              
               <a class="various1 fancybox" rel="gallery2" href="#inline<?php echo $post->ID; ?>" title="<?php the_title(); ?> // <?php theron_excerpt('theron_excerptlength_teaser', 'theron_excerptmore'); ?>"><?php theron_excerpt('theron_excerptlength_teaser', 'theron_excerptmore'); ?></a>
        <div style="display: none;">
               
                <div class="fancybox-inline" id="inline<?php echo $post->ID;  ?>"><?php the_content(); ?></div>
        </div>
               
                <?php }
				
				
				else {?>
					
					
					
					
				<?php the_excerpt(); ?>
                 	<?php // if(function_exists('kc_add_social_share')) kc_add_social_share(); ?>
				<?php }?>
				<?php // get_template_part('share_this');?>

                    

                </div>



                        </div>

            <?php endwhile ?> 



            <?php endif ?>

</div>
</div>
           <?php if (function_exists("theron_paginate")) {theron_paginate();} ?>

            <div class="hidden_nav"><?php paginate_links(); ?></div>



    </div>

    <?php get_footer(); ?>