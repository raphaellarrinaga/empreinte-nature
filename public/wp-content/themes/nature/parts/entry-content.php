<?php
  $field_date = get_field('date');
  $field_lieu = get_field('lieu');
  $field_client = get_field('client');
  // Get the images ids from the post_metadata
  $images_ba = acf_photo_gallery('before_after', $post->ID);
  $images_gallery = acf_photo_gallery('gallery', $post->ID);
?>

<div class="entry-content" itemprop="mainEntityOfPage">
  <?php if ( get_post_type() === 'jardins' ) : ?>
    <meta itemprop="description" content="<?php echo esc_html( wp_strip_all_tags( get_the_excerpt(), true ) ); ?>" />
    <?php if ( has_post_thumbnail() ) : ?>
    <section class="entry-banner">
      <?php the_post_thumbnail( 'full', array( 'itemprop' => 'image', 'class' => 'image-rounded image-fit-content' ) ); ?>
      <?php // the_post_thumbnail( 'thumbnail', array( 'itemprop' => 'image', 'class' => 'image-rounded image-fit-content' ) ); ?>
      <!-- <img src="https://placekitten.com/g/1320/400" alt="" class=""> -->
    </section>
      <?php // echo nature_post_banner($post->ID, 'default', 'banner'); ?>
      <?php // echo nature_post_thumbnail($post->ID, 'image', 'class-name'); ?>
    <?php endif; ?>
    <section class="entry-text">
      <div class="entry-text__description">
        <?php the_content(); ?>
      </div>
      <div class="entry-text__metas">
        <?php if ( $field_date ) : ?>
        <div class="entry-text__meta">
          <span class="entry-text__meta-label">Date</span>
          <span><?php echo $field_date; ?></span>
        </div>
        <?php endif; ?>
        <?php if ( $field_lieu ) : ?>
        <div class="entry-text__meta">
          <span class="entry-text__meta-label">Lieu</span>
          <span><?php echo $field_lieu; ?></span>
        </div>
        <?php endif; ?>
        <?php if ( $field_client ) : ?>
        <div class="entry-text__meta">
          <span class="entry-text__meta-label">Client</span>
          <span><?php echo $field_client; ?></span>
        </div>
        <?php endif; ?>
      </div>
    </section>

    <?php if ( count($images_ba) ) : ?>
    <section class="entry-before-after">
      <h1 class="entry-before-after__title"><?php esc_html_e( 'Avant — Après', 'nature' ); ?></h1>
      <?php
        foreach($images_ba as $image):
          $id = $image['id'];
          $title = $image['title'];
          $caption= $image['caption'];
          $full_image_url= $image['full_image_url'];
          $full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160);
          $thumbnail_image_url= $image['thumbnail_image_url'];
          $url= $image['url'];
          $target= $image['target'];
          $alt = get_field('photo_gallery_alt', $id);
          $class = get_field('photo_gallery_class', $id);
      ?>
      <div class="entry-before-after__image">
        <figure class="image-rounded">
        <?php if( !empty($url) ){ ?><a href="<?php echo $url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>
          <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" class="image-fit-content">
        <?php if( !empty($url) ){ ?></a><?php } ?>
        </figure>
      </div>
      <?php endforeach; ?>
    </section>
    <?php endif; ?>

    <?php if ( count($images_gallery) ) : ?>
    <section class="entry-galery">
      <?php
        //Cool, we got some data so now let's loop over it
        foreach($images_gallery as $image):
          $id = $image['id']; // The attachment id of the media
          $title = $image['title']; //The title
          $caption= $image['caption']; //The caption
          $full_image_url= $image['full_image_url']; //Full size image url
          $full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
          $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
          $url= $image['url']; //Goto any link when clicked
          $target= $image['target']; //Open normal or new tab
          $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
          $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
      ?>
      <div class="entry-galery__item">
        <figure class="entry-galery__item-thumbnail image-rounded">
        <?php if( !empty($url) ){ ?><a href="<?php echo $url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>
          <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" class="image-fit-content">
        <?php if( !empty($url) ){ ?></a><?php } ?>
        </figure>
      </div>
      <?php endforeach; ?>
    <?php endif; ?>

    </section>
  <?php else: ?>
    <?php the_content(); ?>
  <?php endif; ?>

  <div class="entry-links"><?php wp_link_pages(); ?></div>
</div>
