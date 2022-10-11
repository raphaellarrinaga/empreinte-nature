<?php

/*

Template Name: Contact Page

*/

?>



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

  $message = $_POST['message_text'];

  $human = $_POST['message_human'];



  //php mailer variables

  $to = of_get_option('email_text');

  $subject = "Someone sent a message from ".get_bloginfo('name');

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

          $sent = wp_mail($to, $subject, strip_tags($message), $headers);

          if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!

          else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent

        }

      }

    }

  }

  else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);



?>




<!--Content-->
<div style="width:100%; max-width:1000px; margin:0 auto; text-align:center;text-transform:uppercase"><h2 id="titre_page">Contact <br /></h2></div>
<div id="content">


<div class="single_wrap">

<div class="single_post">

                   <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>

                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 

                

                <div class="post_content">

                   <!-- <h1 class="postitle"><?php the_title(); ?></h1>-->

                    <div class="single_metainfo"><?php edit_post_link(); ?></div>

                    <div class="thn_post_wrap">

                    <div class="contenu_contact">

                    <?php the_content(); ?>
                <!--   <div class="share_this">
           			 <div class="social_buttons"> 
                     <div class="lgn_fb">
                <a href="https://www.facebook.com/RobinHubertyFashionDesign?fref=ts" title="Follow us on Facebook" target="_blank"></a>
                </div>

                <div class="lgn_twt">
                <a href="https://twitter.com/r_huberty" title="Follow us on Twitter" target="_blank"></a>
                </div>
                
                 <div class="lgn_insta">
                <a href="http://instagram.com/rhuberty" title="Follow us on Instagram" target="_blank"></a>
                </div>
                          </div>
</div> -->
                    </div>

                    

                    <div class="entry-content">

                <?php echo $response; ?>

                <form action="<?php the_permalink(); ?>" method="post">

                  <p style="display:inline; width:50%"><label for="name"><?php _e("Nom"); ?><span>*</span> <br><input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>" style="width:90%"></label></p>

                  <p style="display:inline; width:50%"><label for="message_email"><?php _e("Email", "theron"); ?> <span>*</span> <br><input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>" style="width:92%"></label></p>

                  <p><label for="message_text"><?php _e("Message", "theron"); ?> <span>*</span> <br><textarea type="text" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea></label></p>

                  <p class="contact_verify"><label for="message_human"><?php _e("Verification Anti-robot", "theron"); ?> <span>*</span> <br><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label></p>

                  <input type="hidden" name="submitted" value="1">

                  <p class="contact_submit"><input type="submit" value="<?php _e("ENVOYER"); ?>"></p>

                </form>

              </div>

                    

                    </div> 

                    <div style="clear:both"></div>

                    <div class="thn_post_wrap"><?php wp_link_pages('<p class="pages"><strong>'.__('Pages:').'</strong> ', '</p>', 'number'); ?></div>

                    

                    

                </div>

                

                

                

                        </div>

            <?php endwhile ?> 

                </div>

			

            <?php endif ?>



    </div>

   

    <!--PAGE END-->

    

<?php if(of_get_option('nosidebar_checkbox') == "0"){ ?><?php get_sidebar();?><?php } ?>

</div>

<?php get_footer(); ?>