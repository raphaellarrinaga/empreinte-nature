<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php nature_schema_type(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="site-hero" role="banner">
      <div class="site-hero__branding">
        <?php
        if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1 class="site-logo">'; }
        echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home" itemprop="url">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';
        if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; }
        ?>
        <p class="site-description"<?php if ( !is_single() ) { echo ' itemprop="description"'; } ?>>
          <?php bloginfo( 'description' ); ?>
        </p>
      </div>
      <a href="#content" class="scrolldown-link"><?php esc_html_e( 'Découvrez', 'nature' ); ?></a>
    </header>

    <main role="main" class="site-main" id="content">
      <section class="front-intro l-constrain">
        <div class="front-intro__inner">
          <p class="front-intro__text">Nous réalisons des jardins en nous inspirant de la nature. Pour qu’ils soient reposants et fonctionnels. Dans une démarche éco-responsable, avec l’intention d’augmenter la biodiversité et la diversité esthétique.</p>
          <nav class="front-intro__nav site-navigation" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>' ) ); ?>
          </nav>
        </div>
      </section>
      <section class="front-services l-constrain">
        <div class="front-services__inner">
          <div class="front-services__draw">
            <h2>En dessinant</h2>
            <p>Nous réalisons vos plans d’aménagements afin de réfléchir le lieu dans son ensemble. Sur base d’un premier échange nous élaborons une esquisse qui, au fil du temps, deviendra un projet paysager unique, à votre image ainsi qu’à celle de son environnement proche.</p>
            <figure class="image-rounded">
              <img src="<?php echo nature_get_image_path() . 'img-draw.jpg'; ?>" alt="">
            </figure>
          </div>
          <div class="front-services__dig">
            <h2>En bêchant</h2>
            <p>Nous aménageons nos jardins sur chantier et effectuons des suivis complets pour tous les travaux réalisés par nos partenaires. Une fois le projet paysager finalisé, le travail de terrain peut démarrer. Nous réalisons terrasses, mare naturelle, murs en pierre sèche, verger, pré fleuri, travail de l’acier, …</p>
            <figure class="image-rounded">
              <img src="<?php echo nature_get_image_path() . 'img-dig.jpg'; ?>" alt="">
            </figure>
          </div>
        </div>
      </section>
      <section class="front-impact l-constrain">
        <h1 class="front-impact__title"><?php esc_html_e( 'Ce qui caractérise nos jardins', 'nature' ); ?></h1>
        <div class="front-impact__cols">
          <div class="front-impact__col">
            <div>
              <h2 class="front-impact__subtitle">Nous tendons à rendre chaque lieu <strong>unique</strong>, agréable et inspiré de la nature</h2>
              <p>Nous focalisons particulièrement notre attention à un aménagement esthétique, fonctionnel, reposant et agréable à vivre en nous inspirant de la nature comme modèle. Un lieu unique à l’échelle du paysage, de l’histoire et du bâti qui l’entoure.</p>
            </div>
            <div>
              <h2 class="front-impact__subtitle">Nous privilégions les plantes mellifères et locales</h2>
              <p>Nous valorisons les plantes et arbustes mellifères ainsi que les espèces indigènes.<br>
              Une mare, un muret de pierres sèches, un verger ou une prairie fleurie qui attireront variété de papillons, de libellules et d’oiseaux.<br>
              De cette façon votre terrain participera en tant que modeste chaînon d’un plus grand maillage vert.</p>
            </div>
            <div>
              <h2 class="front-impact__subtitle">Des floraisons étalées sur toute la saison avec une grande variété de végétaux</h2>
              <p>Les espaces que nous concevons se composent d’une grande variété d’espèces végétales et arbustives aux floraisons étalées au cours de la belle saison et aux couleurs et structures surprenantes en hiver. </p>
            </div>
            <figure class="image-rounded">
              <img src="<?php echo nature_get_image_path() . 'img-impact-1'; ?>" alt="">
            </figure>
          </div>
          <div class="front-impact__col">
            <figure class="image-rounded">
              <img src="<?php echo nature_get_image_path() . 'img-impact-2'; ?>" alt="">
            </figure>
            <figure class="image-rounded">
              <img src="<?php echo nature_get_image_path() . 'img-impact-3'; ?>" alt="">
            </figure>
            <figure class="image-rounded">
              <img src="<?php echo nature_get_image_path() . 'img-impact-4'; ?>" alt="">
            </figure>
            <figure class="image-rounded">
              <img src="<?php echo nature_get_image_path() . 'img-impact-5'; ?>" alt="">
            </figure>
          </div>
        </div>
      </section>

      <section class="front-values l-constrain">
        <h1 class="front-values__title"><?php esc_html_e( 'Nos valeurs', 'nature' ); ?></h1>
        <div class="front-values__cols">
          <div class="front-values__col">
            <div>
              <h2 class="front-value__subtitle">Limiter notre empreinte carbone et <strong>économiser l’énergie</strong></h2>
              <p>Nous utilisons un maximum de matériaux écologiques, de matériaux sains et locaux permettant ainsi de diminuer la consommation d’énergie du aux déplacements, nous limitons également un maximum les évacuations de matière pour les réutiliser dans nos projets.</p>
            </div>
            <figure class="image-rounded">
              <img src="<?php echo nature_get_image_path() . 'img-values-1'; ?>" alt="">
            </figure>
            <figure class="image-rounded">
              <img src="<?php echo nature_get_image_path() . 'img-values-2'; ?>" alt="">
            </figure>
          </div>
          <div class="front-values__col">
            <figure class="image-rounded">
              <img src="<?php echo nature_get_image_path() . 'img-values-3'; ?>" alt="">
            </figure>
            <div>
              <h2 class="front-value__subtitle">A l’écoute du lieu, de son <strong>histoire</strong></h2>
              <p>Nous prenons grand soin d’analyser le lieu avant de le transformer, d’écouter ce qu’il nous raconte afin de lui apporter des modifications appropriées et de conserver son biotope et son histoire.</p>
            </div>
            <div>
              <h2 class="front-value__subtitle">Améliorer la <strong>biodiversité</strong> et <strong>respecter</strong> l’écosystème en place</h2>
              <p>Nous vous conseillerons sur la façon d’envisager l’évolution de votre jardin, peut-être qu’il abrite déjà des coins précieux qu’il serait utile de mettre en valeur.<br>
              Laissez une haie devenir libre ou ne faire qu’un ou deux fauchages sur une partie de la pelouse et déjà vous aurez, au bout de quelques années, bien plus de fleurs et de baies ce qui attireront bon nombre de papillons et d’oiseaux. Pour moins de travail, moins d’argent et moins de gaspillage énergétique.</p>
            </div>
          </div>
        </div>

      </section>

      <section class="front-gardens l-constrain">
        <header class="header-more">
          <h1><?php esc_html_e( 'De quoi vous donner envie', 'nature' ); ?></h1>
          <a href="<?php echo site_url('/garden'); ?>">→ <?php esc_html_e( 'Tous les jardins', 'nature' ); ?></a>
        </header>
        <div class="entry-grid">
          <?php
          $args = array(
            'post_type' => 'garden',
            'posts_per_page' => 4
          );
          $the_query = new WP_Query( $args ); ?>

          <?php if ( $the_query->have_posts() ) : ?>

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <?php get_template_part( 'parts/entry', 'teaser' ); ?>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

          <?php endif; ?>
        </div>
      </section>

      <?php get_footer(); ?>
