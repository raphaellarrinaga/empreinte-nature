

<?php get_header(); ?>

<script type="text/javascript">

(function($) {
$(document).ready(function() {
    $('#thumb-tray').css({'height':(($(window).height())-140)+'px'});
    
    $("#thumb-tray").mousemove(function(e){
        var h = $('#thumb-list').height()+13;
        var offset = $($(this)).offset();
        var position = (e.pageY-offset.top)/$(this).height();
        if(position<0.33) {
            $(this).stop().animate({ scrollTop: 0 }, 600);
        }
        else if(position>0.66) {
            $(this).stop().animate({ scrollTop: h }, 5000);
        }
        else
        {
            $(this).stop();
        }
    });
});
 })(jQuery);
</script>
<!--Content-->

<div id="content">
<div id="menu_collections_in">

<ul id="menu_collections_in_ul"><?php $query = new WP_Query( array( 'post_type' => array( 'plan' ) ) );
$link_focused = get_query_var( 'plan' );
 $postb = get_permalink();
while ( $query->have_posts() ) : $query->the_post();
$postc = get_permalink( $post->ID );
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID), medium );


    ?> <li <?php if ($postb == $postc){?>id="lien_collection_actif"<?php }?>><a href="<?php
    the_permalink();
    echo  '">' ;
    the_post_thumbnail( array(150, 150) );
    echo  '<span>' ;
    the_title();
    echo  '</span>' ;
    echo '</a></li>';
endwhile;?>
</ul></div>
<div class="single_wrap" id="Div_1" style="position:relative; margin-top:23px">

       <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
<?php if($post->post_content=="") : ?>


<?php else : ?>
<div class="single_post">

                

                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 

                

                <div class="post_content">

                
                    <div class="thn_post_wrap">

<span class="closePage" style="position:absolute;right:10px; top:10px; cursor:pointer">X</span>
 



<h2><?php the_title();  ?> </h2>
<?php the_content();  ?> 



                     </div>

                    <div style="clear:both"></div>

                    


                    

         


                    </div>
 </div>
                    
<?php endif; ?>
                    

                    <!--Post Footer-->

              <!--      <div class="post_foot">

                    <?php if(of_get_option('disscats_checkbox') == "0"){ ?>

                        <div class="post_meta">

     <?php if( has_tag() ) { ?><div class="post_tag"><div class="tag_list"><?php the_tags('','  '); ?></div></div><?php } ?>

     <?php if( has_category() ) { ?><div class="post_cat"><div class="catag_list"><?php the_category(' '); ?></div></div><?php } ?>

                        

                        </div>-->

                    <?php } ?>

                        

                   </div>

                    

                </div>

                


                

                        </div>

                        

            <?php endwhile ?> 

            

                </div>   


            <?php endif ?>



</div>



    

    <!--POST END-->

    

<?php if(of_get_option('nosidebar_checkbox') == "0"){ ?><?php get_sidebar();?><?php } ?>

</div>

<?php get_footer(); ?>