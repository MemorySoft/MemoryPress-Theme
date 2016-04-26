<?php get_header(); ?>
<?php
  global $query_string;
  $query_args = explode("&", $query_string);
  $search_query = array();
  foreach($query_args as $key => $string) {
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = urldecode($query_split[1]);
  } 
  $search = new WP_Query($search_query);
  global $wp_query;
  $total_results = $wp_query->found_posts;
?>

<div class="contenedor">

  <!-- CONTENIDO -->

  <div class="row">
    <div class="small-12 medium-8 medium-centered columns contenido-principal">  

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
        <div class="small-12 medium-2 columns">
          <div class="autor-imagen">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), '70' ); ?>
          </div>
          <br>

        </div>
        <div class="small-12 medium-10 columns">
          <div class="autor-descripcion">
            <p><?php echo wp_kses( get_the_author_meta( 'description' ), null ); ?></p>
          </div>
        </div>
      </div>

      <!-- TITULO -->
      <div class="row">
        <div class="small-12 columns">
          <h2>
            Artículos de <span class="js-autor-nombre"></span>     
          </h2>
          <hr>
        </div>
      </div>

      <!-- ARTICULOS -->

      <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
          <div <?php post_class(); ?>>
            <div id="post-<?php the_ID(); ?>" class="articulo stack-for-small">
              <div class="articulo-seccion">
                <a class="articulo-imagen" href="<?php the_permalink(); ?>" title="Leer <?php the_title(); ?>">
                  <?php the_post_thumbnail(); ?>
                </a>
              </div>
              <div class="articulo-seccion">
                <h4 class="articulo-titulo"><a href="<?php the_permalink(); ?>" title="Leer <?php the_title(); ?>"><?php the_title(); ?></a></h4>
                <div class="articulo-extracto"><?php echo the_excerpt(); ?></div>
                <p><a href="<?php the_permalink(); ?>" class="button small" title="Leer <?php the_title(); ?>">Leer todo</a></p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <?php else: ?>
        <div class="large-12 medium-12 columns">
          <h2>No hay artículos</h2>
          <p>Parece que aún no hay artículos publicados aquí...</p>
        </div>
      <?php endif; ?>

      <!-- PAGINADOR -->

      <div id="articulos-navegacion" class="row">
        <div class="large-12 medium-12 columns">
          <div class="articulos-recientes"><i class="fa fa-angle
96004B-left"></i> <?php previous_posts_link( 'Recientes' ); ?></div>
          <div class="articulos-antiguos"><?php next_posts_link( 'Antiguos' ); ?> <i class="fa fa-angle
96004B-right"></i></div>
        </div>
      </div>
    </div>
  </div>

</div> <!-- /.contenedor -->

<?php get_footer(); ?>