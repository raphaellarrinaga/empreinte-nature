<?php
  // Template for the styleguide. Post type "page".
?>
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article class="post post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="l-constrain">
    <header class="post__header">
      <h1 class="post__title" itemprop="name"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
    </header>
    <div class="post__content" itemprop="mainContentOfPage">
      <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); } ?>
      <?php the_content(); ?>

      <h1>h1: Stacha hukohamupo spilubrithiw Shisloc luhesho woshut Kephi trod vogibasach Chuwrabrosh shaduswog rotrabrokifr Wacoswephat dritoche nojelija</h1>
      <h2>h2: Shujeuu shefritro cakistilisp Kuphugasl swethid sast Pichotruwej vapocradu treguth Trofruwroseu pris dripodredo Uushawi sliphu frofrishechu</h2>
      <h3>h3: Drifru ueph trirouatrem Jubracluswel mevutr wediu Dovojuslev shilocre triducleuog Hapalef dara brajuslici Washi wruspicl gocuthac</h3>
      <h4>h4: Chiswi nubucrigemo craho Sheba newrahanof rudrath Biluswikodr frunus nicume Uiposlu jivuhunuvaf thowospe Stujodushege uucripocl dratabrilesp</h4>
      <h5>h5: Thovulachu stireprabur sludrilacras Thocrocruvow lupoclotr swishugis Lawobre gostar powikotrajo Priprisw wrob godestiw Cafri wrufri wrinecroc</h5>
      <h6>h6: Swethigasu gislaslu shogeswim Wavuchiwasla spesip phau Duslasudrac jubacloli mouebrath Peprutocrast crimeter cithuniprok Thihothi nefritrudic slodr</h6>

      <h1>h1: Stacha hukohamupo spilubrithiw Shisloc luhesho woshut Kephi trod vogibasach Chuwrabrosh shaduswog rotrabrokifr Wacoswephat dritoche nojelija</h1>
      <p>Accumsan causa duis tamen volutpat. Comis defui iusto meus minim praemitto saepius uxor. Brevitas ex illum metuo modo vero vicis. Eligo esca humo ille lobortis sed te. Distineo erat humo quidne. Suscipit verto virtus. Dolore tum venio. Accumsan dolore ille rusticus usitas. Jumentum luctus mauris mos quibus suscipit.</p>
      <h2>h2: Shujeuu shefritro cakistilisp Kuphugasl swethid sast Pichotruwej vapocradu treguth Trofruwroseu pris dripodredo Uushawi sliphu frofrishechu</h2>
      <p>Nutus valde volutpat. Cogo cui nulla. Conventio patria usitas ymo. Augue distineo duis hos lenis molior validus voco volutpat vulputate.</p>
      <h3>h3: Drifru ueph trirouatrem Jubracluswel mevutr wediu Dovojuslev shilocre triducleuog Hapalef dara brajuslici Washi wruspicl gocuthac</h3>
      <p>Inhibeo jumentum pagus praesent proprius roto uxor valetudo venio verto. Ex fere quae. Aptent cogo conventio distineo immitto nisl obruo te uxor veniam.</p>
      <h4>h4: Chiswi nubucrigemo craho Sheba newrahanof rudrath Biluswikodr frunus nicume Uiposlu jivuhunuvaf thowospe Stujodushege uucripocl dratabrilesp</h4>
      <p>Causa comis facilisi molior persto suscipere. Abigo capto distineo erat pagus pertineo sagaciter tincidunt tum. Jugis nobis oppeto populus praesent sudo. Acsi lucidus populus scisco valetudo vicis. Appellatio nulla praesent quadrum saluto vero. Gravis laoreet lucidus probo. Adipiscing lenis loquor nostrud nulla. Abdo damnum esse. Hos jumentum os pecus vero virtus vulpes.</p>
      <h5>h5: Thovulachu stireprabur sludrilacras Thocrocruvow lupoclotr swishugis Lawobre gostar powikotrajo Priprisw wrob godestiw Cafri wrufri wrinecroc</h5>
      <p>Abico nisl oppeto. Duis jumentum natu vulpes. Gravis paulatim suscipit. Adipiscing capto dolus facilisis jugis luctus luptatum plaga. Aptent damnum iustum praesent proprius validus vel venio.</p>
      <h6>h6: Swethigasu gislaslu shogeswim Wavuchiwasla spesip phau Duslasudrac jubacloli mouebrath Peprutocrast crimeter cithuniprok Thihothi nefritrudic slodr</h6>
      <p>Diam sagaciter usitas venio. Abbas antehabeo consequat dolore jumentum lobortis nulla persto quidne usitas. Acsi adipiscing sagaciter saluto. Aliquip bene ea haero loquor saepius ut virtus. Aliquam nulla uxor. Ex jus neque nostrud quae suscipit usitas. Amet pneum quadrum scisco suscipere usitas velit. Conventio ulciscor velit. Capto facilisis scisco. Abbas cogo huic melior mos pecus suscipit. Abigo aliquip consectetuer consequat ex suscipit.</p>

      <p>Lorem ipsum dolor sit amet <a href="#">link</a> sonet audire repudiandae an eum.</p>
      <p>Lorem ipsum dolor sit amet <strong>strong</strong> ad sonet audire repudiandae an eum.</p>
      <p>Lorem ipsum dolor sit amet <b>bold</b> ad sonet audire repudiandae an eum.</p>
      <p>Lorem ipsum dolor sit amet <del>del</del> ad sonet audire repudiandae an eum.</p>
      <p>Lorem ipsum dolor sit amet <em>emphasis</em> ad sonet audire repudiandae an eum.</p>
      <p>Lorem ipsum dolor sit amet <i>italic</i> ad sonet audire repudiandae an eum.</p>
      <p>Lorem ipsum dolor sit amet <q>quote</q> ad sonet audire repudiandae an eum.</p>
      <p>Lorem ipsum dolor sit amet <s>strikethrough</s> ad sonet audire repudiandae an eum.</p>
      <p>Lorem ipsum dolor sit amet <small>small</small> ad sonet audire repudiandae an eum.</p>
      <p>Lorem ipsum dolor sit amet <sub>subscript</sub> ad sonet audire repudiandae an eum.</p>
      <p>Lorem ipsum dolor sit amet <sup>superscript</sup> ad sonet audire repudiandae an eum.</p>
      <p>Display an horizontal rule after this paragraph</p>
      <hr>
      <p>Lorem ipsum dolor sit amet <u>underline</u> ad sonet audire repudiandae an eum.</p>
      <p>Lorem ipsum dolor sit amet <figcaption>figcaption</figcaption> ad sonet audire repudiandae an eum.</p>

      <ul>
        <li>Unordored list item one</li>
        <li>Unordored list item two</li>
        <li>Unordored list item three</li>
      </ul>
      <ol>
        <li>Ordored list item one</li>
        <li>Ordored list item two</li>
        <li>Ordored list item three</li>
      </ol>
      <dl>
        <dt>Definition list term</dt>
        <dd>Definition list definition</dd>
        <dt>Another definition list term</dt>
        <dd>Another definition list definition</dd>
        <dd>And, another definition list definition</dd>
      </dl>

      <blockquote>
        <p>Adipiscing genitus in incassum iusto loquor natu sagaciter. Letalis nulla uxor vindico vulpes. Caecus facilisis os turpis voco. Defui dolus esca minim natu sed zelus. Humo quidem saluto. Consectetuer consequat hendrerit illum nulla pneum quis suscipere vulputate.</p>
      </blockquote>

      <code>Aliquip defui dolus feugiat hendrerit iustum olim vindico voco. Commodo dolor euismod illum metuo meus modo ullamcorper. Distineo elit nutus paratus ullamcorper ut. Ad gilvus loquor populus quae quia torqueo. Accumsan dignissim lobortis. Aptent esse huic iusto luptatum patria rusticus turpis. Accumsan commodo dolore jumentum lucidus praesent ratis refero sagaciter ullamcorper. Iustum lobortis saluto turpis. Inhibeo lenis letalis luctus nisl scisco typicus velit.</code>

      <div>
        <br>
        <br>
        <button class="button">Button</button>
        <a href="#" class="button">Button</a>
      </div>

      <div class="post__links"><?php wp_link_pages(); ?></div>
    </div>
  <div class="l-constrain">
</article>

<?php if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
