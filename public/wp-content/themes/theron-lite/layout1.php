<div style="width:100%; max-width:1000px; margin:0 auto; text-align:center;text-transform:uppercase; margin-top:26px"><h2 id="titre_page"><?php $category = get_category( get_query_var( 'cat' ) );
    $cat_id = $category->cat_ID; echo get_cat_name($cat_id) ;?><br /></h2></div>
<div class="lay1">

<div class="lay1_wrap">



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

                        

                    <!--<a href="<?php the_permalink();?>">-->
                    
                    
                          
               <?php $categoryb = get_category( get_query_var( 'cat' ) );
    $cat_idb = $categoryb->cat_ID; if ($cat_idb == 3) { ?>
              
                    
                    <a class="various1 fancybox" rel="gallery1" href="#inline<?php echo $post->ID; ?>" title="<?php the_title(); ?> // <?php theron_excerpt('theron_excerptlength_teaser', 'theron_excerptmore'); ?>"><?php the_post_thumbnail('large'); ?></a><!--</a>--></div>
   <?php }
				
				
				else {?>
					
					
                              <?php the_post_thumbnail('large'); ?><!--</a>--></div>
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

                    <h2 class="postitle"><?php the_title(); ?></h2>

               
               <?php $categoryb = get_category( get_query_var( 'cat' ) );
    $cat_idb = $categoryb->cat_ID; if ($cat_idb == 3) { ?>
              
              
              
               <a class="various1 fancybox" rel="gallery2" href="#inline<?php echo $post->ID; ?>" title="<?php the_title(); ?> // <?php theron_excerpt('theron_excerptlength_teaser', 'theron_excerptmore'); ?>"><?php theron_excerpt('theron_excerptlength_teaser', 'theron_excerptmore'); ?></a>
        <div style="display: none;">
               
                <div class="fancybox-inline" id="inline<?php echo $post->ID;  ?>"><?php the_content(); ?></div>
        </div>
               
                <?php }
				
				
				else {?>
					
					
					
					
				<?php the_content(); ?>
                 	<?php if(function_exists('kc_add_social_share')) kc_add_social_share(); ?>
				<?php }?>
				<?php get_template_part('share_this');?>

                    

                </div>



                        </div>

            <?php endwhile ?> 



            <?php endif ?>

</div>

           <?php if (function_exists("theron_paginate")) {theron_paginate();} ?>

            <div class="hidden_nav"><?php paginate_links(); ?></div>



    </div>