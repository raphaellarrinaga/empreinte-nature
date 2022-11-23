      <?php get_sidebar(); ?>
    </main>
    <footer class="site-footer l-constrain" role="contentinfo">
      <div class="site-footer__inner">
        <h1 class="site-footer__title">Contactez-nous pour une question, une visite, un compliment. Toutes les <strike>raisons</strike> saisons sont bonnes pour démarrer votre projet.</h1>
        <div class="contact">
          <p class="contact__mail">
            <span class="contact__label">Mail</span><span><a href='mailto&#58;in&#102;o&#46;emp%72&#101;&#105;&#110;%74&#37;6&#53;n&#97;%74&#117;re&#64;%&#54;7%&#54;&#68;&#97;&#105;l&#46;com'>&#105;n&#102;o&#46;&#101;mpreinten&#97;ture&#64;gmail&#46;com</a></span></p>
          <p class="contact__phone">
            <span class="contact__label">Téléphone</span><span><a href="tel:+32476235004">+32 (0) 476 23 50 04</a></span></p>
          <p class="contact__address">
            <span class="contact__label">Adresse</span><span>Rue Ecoles des Filles 1, 1315 Incourt (Brabant wallon)</span></p>
          <p class="contact__social">
            <span class="contact__label">Réseaux</span>
            <span>
              <a href="https://www.facebook.com/profile.php?id=100064049111312" class="button contact__button">
                <i class="icn icn-fb"></i>Facebook</a>
              <a href="https://www.instagram.com/empreintenature01/" class="button contact__button">
                <i class="icn icn-insta"></i>Instagram</a>
              <a href="https://www.linkedin.com/in/ga%C3%ABlle-van-damme-1bb2a9168/recent-activity/" class="button contact__button">
                <i class="icn icn-li"></i>Linkedin</a>
            </span>
          </p>
        </div>
        <div class="site-title" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
          <h1 class="site-logo">
          <?php
          echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home" itemprop="url">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';
          ?>
          </h1>
        </div>
      </div>
    </footer>
  </body>
</html>
