<?php get_header(); ?>

<?php



  //response generation function



  $response = "";



  //function to generate response

  function my_contact_form_generate_response($type, $message){



    global $response;



    if($type == "success") $response = "<div class='success'>{$message}</div>";

    else $response = "<div class='error'>{$message}</div>";



  }



  //response messages

  $not_human       = "Human verification incorrect.";

  $missing_content = "Please supply all information.";

  $email_invalid   = "Email Address Invalid.";

  $message_unsent  = "Message was not sent. Try Again.";

  $message_sent    = "Merci! Votre message a bien été envoyé";



  //user posted variables

  $name = $_POST['message_name'];

  $email = $_POST['message_email'];

  $message = 'de la part de '. $_POST['message_name'] . '<br />';
  $message .= $_POST['message_text'];
   $message_top = $_POST['message_top'];
  $human = $_POST['message_human'];



  //php mailer variables

  $to = 'mandlichka@yahoo.fr';

  $subject ='empreinte nature - '. strip_tags($message_top) ;

  $headers = 'From: '. $email . "\r\n" .

    'Reply-To: ' . $email . "\r\n";



  if(!$human == 0){

    if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!

    else {



      //validate email

      if(!filter_var($email, FILTER_VALIDATE_EMAIL))

        my_contact_form_generate_response("error", $email_invalid);

      else //email is valid

      {

        //validate presence of name and message

        if(empty($name) || empty($message)){

          my_contact_form_generate_response("error", $missing_content);

        }

        else //ready to go!

        {

          $sent = wp_mail($to, $subject, $message, $headers);

          if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!

          else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent

        }

      }

    }

  }

  else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);



?>




<!--Content-->

<div id="content">

<div class="single_wrap">

<div class="single_post">

                   <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>

                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 

              

                    <div class="imgwrap">

				<?php the_post_thumbnail('large'); ?></div>



                   

                </div>





                <div class="post_content">

                    <h1 class="postitle"><?php the_title(); ?></h1>



                    </div>


<div id="massiftout">


  <div id="massifgallery">
        <?php 

$galleryarray = get_post_gallery_ids($post->ID);

foreach ($galleryarray as $id) {
  // select your image size
  $imagesize = wp_get_attachment_image_src( $id, 'xsmall' );
  // get all the meta with our $id
  $attachment_meta = wp_get_attachment( $id );

  ?>



<a href="<?php echo $imagesize[0]; ?>" class="fancybox" title ="<?php echo $attachment_meta['title']; ?>"><img src="<?php echo $imagesize[0]; ?>" /></a>


<?php } ?>
</div>

<div id="massifcontenu">

                    <div class="thn_post_wrap"><?php the_content(); ?>
                    <?php // get_template_part('share_this');?> </div>

<div id="compositionmassif">

  <?php $value = get_field( "composition" );
echo $value
 ?>
<p><a id="ficheplantes" href="http://empreinte-nature.be/imgs/ficheplantes_soleil.pdf" target="_blank">Vous trouverez un descriptif de toutes nos plantes sur ce pdf</a></p>
</div>

       <div class="entry-content">
<p> Pour commander "<strong><?php the_title(); ?></strong>" au prix de <?php $valueprix = get_field( "prix" );
echo $valueprix
 ?>€, vous pouvez nous envoyer un message via le formulaire suivant ou nous envoyer un mail à mm@mm.be
                <?php echo $response; ?>

                <form action="<?php the_permalink(); ?>" method="post">

                  <p style="display:inline; width:50%"><label for="name"><?php _e("Nom"); ?><span>*</span> <br><input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>" style="width:90%"></label></p>

                  <p style="display:inline; width:50%"><label for="message_email"><?php _e("Email", "theron"); ?> <span>*</span> <br><input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>" style="width:92%"></label></p>

                  <p><label for="message_text"><?php _e("Message", "theron"); ?> <span>*</span> <br><textarea type="text" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea></label></p>

    <input type="hidden" name="message_top" value="<?php the_title(); ?>" >
                  <p class="contact_verify"><label for="message_human"><?php _e("Verification Anti-robot", "theron"); ?> <span>*</span> <br><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label></p>

                  <input type="hidden" name="submitted" value="1">

                  <p class="contact_submit"><input type="submit" value="<?php _e("ENVOYER"); ?>"></p>

                </form>

              </div>


</div>
       
</div>
                    <div style="clear:both"></div>

                    

                    <div class="thn_post_wrap"><?php wp_link_pages('<p class="pages"><strong>'.__('Pages:').'</strong> ', '</p>', 'number'); ?>

                    

                      <div class="alignleft">

					  <?php if (is_attachment()){ previous_image_link( false, '&#171; '.__('Previous Image' , 'theron').'' ); } else { previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Précédent', 'theron' ) ); } ?> 

                      </div>

						<div class="alignright"><?php if (is_attachment()){ next_image_link( false, ''.__('Next Image' , 'theron').' &#187;' ); } else { next_post_link( '%link', __( 'Suivant <span class="meta-nav">&rarr;</span>', 'theron' ) ); } ?>

                        </div>



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