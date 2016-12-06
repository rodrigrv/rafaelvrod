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
    <div class="portfolio-piece">
      <img id="imgtin" src="images/tin.jpg">
    </div>
    <div class="portfolio-piece">
      <img id="imgcactus" src="images/cactus.jpg">
    </div>
    <div class="portfolio-piece">
      <img id="imghomeless" src="images/homeless.jpg">
    </div>
    <div class="portfolio-piece">
      <img id="imgphillips" src="images/phillips.jpg">
    </div>
    <div class="portfolio-piece">
      <img id="imgastros" src="images/astros.jpg">
    </div>
    <div class="portfolio-piece">
      <img id="imgtrinket" src="images/trinket.jpg">
    </div>
  </div>
  <div class="portfolio-work-wrapper mobile">
    <div class="portfolio-piece">
      <h3 class="img-title">Tin-Man Alphabet</h3>
        <img id="imgtin-m" src="images/tin.jpg">
          <p class="img-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="portfolio-piece">
      <h3 class="img-title">Rolling Cactus</h3>
        <img id="imgcactus-m" src="images/cactus.jpg">
          <p class="img-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="portfolio-piece">
      <h3 class="img-title">Homelessness Poster</h3>
        <img id="imghomeless-m" src="images/homeless.jpg">
          <p class="img-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="portfolio-piece">
      <h3 class="img-title">Captain Phillips</h3>
        <img id="imgphillips-m" src="images/phillips.jpg">
          <p class="img-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="portfolio-piece">
      <h3 class="img-title">Astros</h3>
        <img id="imgastros-m" src="images/astros.jpg">
          <p class="img-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="portfolio-piece">
      <h3 class="img-title">Trinket Magazine</h3>
        <img id="imgtrinket-m" src="images/trinket.jpg">
          <p class="img-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
  </div>
</div>
<div class="clearfix"></div>
  <!-- ==================== End Portfolio ==================== -->

<!-- ==================== Contact ==================== -->
<div id="contact" class="contact-section">
  <div class="contact-heading">
      <h3 class="contact-title">Contact</h3>
  </div>
  <div class="contact-wrapper">
    <p class="contact-text">Feel free to contact me.</p>
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
  </div>
</div>
<!-- ==================== End Contact ==================== -->
<!-- ==================== End Content ==================== -->

<?php get_footer(); ?>
