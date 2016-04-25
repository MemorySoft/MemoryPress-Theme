<?php get_header(); ?>

<div class="contenedor">

  <!-- CONTENIDO -->

  <div class="row">
  	<div class="small-12 columns">
  		<?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>

          <!-- POST -->

          <div class="row">
            <div class="small-12 columns">
              <?php edit_post_link('Editar', ''); ?>
              <div class="articulo-cabecera">
                <h1 class="articulo-titulo"><?php the_title(); ?></h1>
              </div>
              <div class="articulo-info">
                <span class="articulo-fecha"><?php the_time('l j \d\e\ F \d\e\ Y \a\ \l\a\s\ G:i'); ?></span>
                <span class="articulo-autor">| Creado por <?php the_author_posts_link(); ?></span>
              </div>
              <div class="articulo-imagen">
                <?php the_post_thumbnail(); ?>
              </div>
              <div class="articulo-texto">
                <?php the_content(); ?>
              </div>
            </div>
          </div>

          <!-- BOTONES SOCIALES -->

          <div class="row botones-sociales">
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
    
        <!-- AUTOR -->

        <div class="row autor-contenedor">
        	<div class="small-12 columns">
            <div class="autor-enlaces">
              <div class="autor-nombre">
                <h3>
                  <?php the_author_posts_link(); ?> 
                </h3>
              </div>
              <div class="autor-perfiles">
                <?php if ( get_the_author_meta( 'email_alt' ) != '' )  { ?>
                  <a target="_blank" href="<?php echo get_the_author_meta( 'email_alt' ); ?>"><i class="fa fa-envelope"></i></a>
                <?php } ?>

                <?php if ( get_the_author_meta( 'user_url' ) != '' )  { ?>
                  <a target="_blank" href="<?php echo esc_url( get_the_author_meta( 'user_url' ) ); ?>"><i class="fa fa-globe"></i></a>
                <?php } ?>

                <?php if ( get_the_author_meta( 'twitter' ) != '' )  { ?>
                  <a target="_blank" href="<?php echo esc_url( get_the_author_meta( 'twitter' ) ); ?>"><i class="fa fa-twitter"></i></a>
                <?php } ?>

                <?php if ( get_the_author_meta( 'facebook' ) != '' )  { ?>
                  <a target="_blank" href="<?php echo esc_url( get_the_author_meta( 'facebook' ) ); ?>"><i class="fa fa-facebook"></i></a>
                <?php } ?>

                <?php if ( get_the_author_meta( 'linkedin' ) != '' )  { ?>
                  <a target="_blank" href="<?php echo esc_url( get_the_author_meta( 'linkedin' ) ); ?>"><i class="fa fa-linkedin"></i></a>
                <?php } ?>

                <?php if ( get_the_author_meta( 'googleplus' ) != '' )  { ?>
                  <a target="_blank" href="<?php echo esc_url( get_the_author_meta( 'googleplus' ) ); ?>"><i class="fa fa-google-plus"></i></a>
                <?php } ?>

                <?php if ( get_the_author_meta( 'instagram' ) != '' )  { ?>
                  <a target="_blank" href="<?php echo esc_url( get_the_author_meta( 'instagram' ) ); ?>"><i class="fa fa-instagram"></i></a>
                <?php } ?>

                <?php if ( get_the_author_meta( 'flickr' ) != '' )  { ?>
                  <a target="_blank" href="<?php echo esc_url( get_the_author_meta( 'flickr' ) ); ?>"><i class="fa fa-flickr"></i></a>
                <?php } ?>

                <?php if ( get_the_author_meta( 'pinterest' ) != '' )  { ?>
                  <a target="_blank" href="<?php echo esc_url( get_the_author_meta( 'pinterest' ) ); ?>"><i class="fa fa-pinterest"></i></a>
                <?php } ?>

                <?php if ( get_the_author_meta( 'youtube' ) != '' )  { ?>
                  <a target="_blank" href="<?php echo esc_url( get_the_author_meta( 'youtube' ) ); ?>"><i class="fa fa-youtube-play"></i></a>
                <?php } ?>

                <?php if ( get_the_author_meta( 'vimeo' ) != '' )  { ?>
                  <a target="_blank" href="<?php echo esc_url( get_the_author_meta( 'vimeo' ) ); ?>"><i class="fa fa-vimeo-square"></i></a>
                <?php } ?>

                <?php if ( get_the_author_meta( 'tumblr' ) != '' )  { ?>
                  <a target="_blank" href="<?php echo esc_url( get_the_author_meta( 'tumblr' ) ); ?>"><i class="fa fa-tumblr"></i></a>
                <?php } ?>
              </div>
            </div>
  				</div>
          <div class="small-12 medium-1 columns">
            <div class="autor-imagen">
              <?php echo get_avatar( get_the_author_meta( 'ID' ), '70' ); ?>
            </div>
          </div>
          <div class="small-12 medium-11 columns">
            <div class="autor-descripcion">
              <p><?php echo wp_kses( get_the_author_meta( 'description' ), null ); ?></p>
            </div>
          </div>
        </div>
    
        <!-- NAVEGACION POSTS -->

        <div class="row navegacion-articulos">
          <div class="small-12 medium-6 texto-centrado medium columns navegacion-anterior-articulo"> 
            <?php previous_post_link( '<p>ARTÍCULO PREVIO</p> %link', '%title' ); ?>
          </div>
          <div class="small-12 medium-6 texto-centrado medium columns navegacion-proximo-articulo">
            <?php next_post_link( '<p>PRÓXIMO ARTÍCULO</p> %link', '%title' ); ?>
          </div>
        </div>
        <?php endif; ?>
  	</div>
  </div>

</div> <!-- /.contenedor -->

<?php get_footer(); ?>