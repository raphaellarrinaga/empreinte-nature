

<?php get_header(); ?>



<!--Content-->

<div id="content">

<div class="single_wrap">

<div class="single_post">

                   <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>

                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 

                      <?php if ( has_post_thumbnail() ) : ?>

                    <div class="imgwrap">

						<!--<div class="catmeta"><?php $category = get_the_category(); if($category[0]){echo '<a href="'.get_category_link($category[0]->term_id ).'">+'.$category[0]->cat_name.'</a>';}?></div>-->

                        

                       <!-- <div class="date_meta"><?php the_time('d'); ?><?php the_time('S'); ?> <?php the_time('M'); ?> <?php the_time('Y'); ?></div>-->

                        

                    <!--<a href="<?php the_permalink();?>">--><?php the_post_thumbnail('large'); ?><!--</a>--></div>

                    

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

                    <h1 class="postitle"><?php the_title(); ?></h1>

                    <div class="single_metainfo"><a class="comm_date"><?php the_time( get_option('date_format') ); ?></a><?php if(of_get_option('dissauth_checkbox') == "0"){ ?>  <a class="meta_auth"><?php the_author(); ?></a><?php } ?>

                    <?php edit_post_link(); ?>

                    </div>

                    <div class="thn_post_wrap"><?php the_content(); ?>
                    <?php // get_template_part('share_this');?> </div>

                    <div style="clear:both"></div>

                    

                    <div class="thn_post_wrap"><?php wp_link_pages('<p class="pages"><strong>'.__('Pages:').'</strong> ', '</p>', 'number'); ?>

                    

                      <div class="alignleft">

					  <?php if (is_attachment()){ previous_image_link( false, '&#171; '.__('Previous Image' , 'theron').'' ); } else { previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'theron' ) ); } ?> 

                      </div>

						<div class="alignright"><?php if (is_attachment()){ next_image_link( false, ''.__('Next Image' , 'theron').' &#187;' ); } else { next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'theron' ) ); } ?>

                        </div>



                    </div>

                    

                    

                    <!--Post Footer-->

                    <div class="post_foot">

					<?php if(of_get_option('disscats_checkbox') == "0"){ ?>

                        <div class="post_meta">

     <?php if( has_tag() ) { ?><div class="post_tag"><div class="tag_list"><?php the_tags('','  '); ?></div></div><?php } ?>

     <?php if( has_category() ) { ?><div class="post_cat"><div class="catag_list"><?php the_category(' '); ?></div></div><?php } ?>

                        

                        </div>

					<?php } ?>

                        

                   </div>

                    

                </div>

                


                

                        </div>

                        

            <?php endwhile ?> 

            

                </div>   

				<div class="comments_template"><?php comments_template('',true); ?></div>

            <?php endif ?>



</div>



    

    <!--POST END-->

    

<?php if(of_get_option('nosidebar_checkbox') == "0"){ ?><?php get_sidebar();?><?php } ?>

</div>

<?php get_footer(); ?>