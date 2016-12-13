<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-header">
       <div class="date"><?php the_time( 'M j y' ); ?></div>
       <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
       <div class="author"><?php the_author(); ?></div>
    </div><!--end post header-->
    <div class="entry clear">
       <?php if ( function_exists( 'add_theme_support' ) ) the_post_thumbnail(); ?>
       <?php the_content(); ?>
       <?php edit_post_link(); ?>
       <?php wp_link_pages(); ?> </div>
    <!--end entry-->
    <div class="post-footer">
       <div class="comments"><?php comments_popup_link( 'Leave a Comment', '1 Comment', '% Comments' ); ?></div>
    </div><!--end post footer-->
    </div><!--end post-->
<?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
    <div class="navigation index">
       <div class="alignleft"><?php next_posts_link( 'Older Entries' ); ?></div>
       <div class="alignright"><?php previous_posts_link( 'Newer Entries' ); ?></div>
    </div><!--end navigation-->
<?php else : ?>
<?php endif; ?>

<!-- ==================== Navigation ==================== -->
<nav>
  <ul>
    <li class="nav-icon">
      <a href="#home"><img src="images/icon.png" alt="Icon Here" /></a>
    </li>
    <div class="nav-titles">
      <li class="nav-menu"><a href="#about">About</a></li>
      <li class="nav-menu"><a href="#portfolio">Portfolio</a></li>
      <li class="nav-menu"><a href="#contact">Contact</a></li>
    </div>
  </ul>
</nav>
<div class="clearfix"></div><div id="home"></div>
<!-- ==================== End Navigation ==================== -->
<!-- ==================== Header ==================== -->
<header id="about">
  <div class="header-wrapper desktop">
    <img src="images/headerimgdesktop.png" alt="Header Image Desktop" />
    <div class="header-text-wrapper">
      <h2 class="header-title">Hi There,</h2>
        <p class="header-text">My name is Thao and I am a graphic designer who likes to bring the whimsical to ordinary things. When I'm not designing, I collect random objects that peak my interest and try to be a gardener to my many cacti.</p>
    </div>
  </div>
  <div class="header-wrapper mobile">
    <img src="images/headerimgmobile.png" alt="Header Image Mobile" />
      <div class="header-text-wrapper">
        <h2 class="header-title">Hi There,</h2>
        <p class="header-text">My name is Thao and I am a graphic designer who likes to bring the whimsical to ordinary things. When I'm not designing, I collect random objects that peak my interest and try to be a gardener to my many cacti.</p>
      </div>
  </div>
</header>
<!-- ==================== End Header ==================== -->

<!-- ==================== Content ==================== -->
<!-- ==================== Portfolio ==================== -->
<div id="portfolio"></div>
<div class="portfolio-section">
  <div class="portfolio-heading">
    <h3 class="portfolio-title">Portfolio</h3>
  </div>
  <div class="portfolio-work-wrapper desktop">
    <div class="thumbnails">
      <div class="portfolio-piece">
        <a href="images/tin.jpg" data-title="Tin-Man Alphabet" data-text="Taking inspiration from a interplanetary space explorer tin toy in the 1960s, I created an alphabet set from the shapes and color that I see in the toy. I used green as the main color for the alphabet and added the prominent blocky feet to the typeface to match the tin toy.">
          <img id="imgtin" src="images/tin.jpg">
        </a>
      </div>
      <div class="portfolio-piece">
        <a href="images/cactus.jpg" data-title="Rolling Cactus" data-text="Branding a local gardening shop, I wanted to target the youth that have no experience in gardening, specifically succulents and cacti. I used bold colors and strokes for an energetic feel.">
          <img id="imgcactus" src="images/cactus.jpg">
        </a>
      </div>
      <div class="portfolio-piece">
        <a href="images/homeless.jpg" data-title="Homelessness Poster" data-text="I chose shelter, home, and food as the theme to relate to our basic survival instincts. The concrete background relates to the environment and harsh living conditions that the homeless have to live through every day.">
          <img id="imghomeless" src="images/homeless.jpg">
        </a>
      </div>
      <div class="portfolio-piece">
        <a href="images/phillips.jpg" data-title="Captain Phillips" data-text="Taking inspiration from the movie, Captain Phillips, I created icons that represent the main events that happened in the movie. The blue and yellow I chose were ship's colors.">
          <img id="imgphillips" src="images/phillips.jpg">
        </a>
      </div>
      <div class="portfolio-piece">
        <a href="images/astros.jpg" data-title="Astros" data-text="Astros is a RPG style mobile game that follows the storyline of the hero going into the forest to defeat the monsters that took over the forest. I wanted to play off the 'dark forest' theme, so I contrasted dark hues of purple with an bright earth tone palette.">
          <img id="imgastros" src="images/astros.jpg">
        </a>
      </div>
      <div class="portfolio-piece">
        <a href="images/trinket.jpg" data-title="Trinket Magazine" data-text="Trinket is a DIY magazine that focuses on interior design. This particular issue centers on how succulents can be incorporated into every day decorations.">
          <img id="imgtrinket" src="images/trinket.jpg">
        </a>
      </div>
    </div>
  </div>
  <!-- ==================== Lightbox for Desktop / Tablet ==================== -->
  <div class="lightbox" data-state="hidden">
    <div class="lightbox-container">
      <button class="btn-close">X</button>
      <!--<button class="btn-left">&lt;</button>
      <button class="btn-right">&gt;</button> -->
      <div class="lightbox-content">
        <img class="lightbox-img" alt="">
          <h2 class="lightbox-heading"></h2>
          <p class="lightbox-text"></p>
      </div>
    </div>
  </div>
  <!-- ==================== End Lightbox ==================== -->

  <!-- ==================== Mobile Version of Portfolio Here ==================== -->
  <div class="portfolio-work-wrapper mobile">
    <div class="portfolio-piece">
      <h3 class="img-title">Tin-Man Alphabet</h3>
        <img id="imgtin-m" src="images/tin.jpg">
          <p class="img-text">Taking inspiration from a interplanetary space explorer tin toy in the 1960s, I created an alphabet set from the shapes and color that I see in the toy. I used green as the main color for the alphabet and added the prominent blocky feet to the typeface to match the tin toy.</p>
    </div>
    <div class="portfolio-piece">
      <h3 class="img-title">Rolling Cactus</h3>
        <img id="imgcactus-m" src="images/cactus.jpg">
          <p class="img-text">Branding a local gardening shop, I wanted to target the youth that have no experience in gardening, specifically succulents and cacti. I used bold colors and strokes for an energetic feel.</p>
    </div>
    <div class="portfolio-piece">
      <h3 class="img-title">Homelessness Poster</h3>
        <img id="imghomeless-m" src="images/homeless.jpg">
          <p class="img-text">I chose shelter, home, and food as the theme to relate to our basic survival instincts. The concrete background relates to the environment and harsh living conditions that the homeless have to live through every day.</p>
    </div>
    <div class="portfolio-piece">
      <h3 class="img-title">Captain Phillips</h3>
        <img id="imgphillips-m" src="images/phillips.jpg">
          <p class="img-text">Taking inspiration from the movie, Captain Phillips, I created icons that represent the main events that happened in the movie. The blue and yellow I chose were ship's colors.</p>
    </div>
    <div class="portfolio-piece">
      <h3 class="img-title">Astros</h3>
        <img id="imgastros-m" src="images/astros.jpg">
          <p class="img-text">Astros is a RPG style mobile game that follows the storyline of the hero going into the forest to defeat the monsters that took over the forest. I wanted to play off the "dark forest" theme, so I contrasted dark hues of purple with an bright earth tone palette.</p>
    </div>
    <div class="portfolio-piece">
      <h3 class="img-title">Trinket Magazine</h3>
        <img id="imgtrinket-m" src="images/trinket.jpg">
          <p class="img-text">Trinket is a DIY magazine that focuses on interior design. This particular issue centers on how succulents can be incorporated into every day decorations.</p>
    </div>
  </div>
  <!-- ==================== End Mobile Version ==================== -->
</div>
<div class="clearfix"></div>
  <!-- ==================== End Portfolio ==================== -->

<!-- ==================== Contact ==================== -->
<div id="contact" class="contact-section">
  <div class="contact-heading">
      <h3 class="contact-title">Contact</h3>
  </div>
  <div class="contact-wrapper">
    <p class="contact-text">Feel free to contact me at
      <span class="new-line"><a href="mailto:thao_ha@outlook.com" target="_blank">thao_ha@outlook.com</a></span>
    </p>

      <!-- Commenting out until we can get it to work
      <div class="contact-form-wrapper">
        <div class="form-style">
          <form action="" method="post">
            <label>
              <input type="text" placeholder="Name">
            </label>
            <label>
              <input type="email" placeholder="Email">
            </label>
            <label>
              <textarea rows="8" cols="50" placeholder="Message"></textarea>
            </label>
            <input type="submit" value="Submit">
        </form>
      </div>
    </div>
    -->

  </div>
</div>
<!-- ==================== End Contact ==================== -->
<!-- ==================== End Content ==================== -->

<?php get_footer(); ?>
