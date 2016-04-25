<?php get_header(); ?>

<div class="contenedor">

  <!-- CONTENIDO -->

  <div class="row">
    <div class="small-12 columns contenido-principal">

      <!-- POST -->

  		<?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
          <h1 class="pagina-titulo"><?php the_title(); ?></h1>
          <div class="pagina-contenido">
            <div class="pagina-imagen-caja">
              <span class="pagina-imagen">
                <?php the_post_thumbnail(); ?>
              </span>
            </div>
            <div class="pagina-texto">
              <?php the_content(); ?>
            </div>
          </div>

          <!-- BOTONES SOCIALES -->

          <div class="row botones-sociales">
            <div class="small-12 columns">
              <h3>Compártenos</h3>
            </div>
            <hr/>
            <div class="small-12 large-4 columns">
              <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" class="boton-social boton-facebook">
                <i class="fa fa-facebook"></i>
                Facebook
              </a>
            </div>
            <div class="small-12 large-4 columns">
              <a href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>" class="boton-social boton-twitter">
                <i class="fa fa-twitter"></i>
                Twitter
              </a>
            </div>
            <div class="small-12 large-4 columns">
              <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="boton-social boton-google">
                <i class="fa fa-google-plus"></i>
                Google +
              </a>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>

    </div>
  </div>

</div> <!-- /.contenedor -->

<?php get_footer(); ?>