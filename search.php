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

      <!-- TITULO -->

      <div class="row">
        <div class="small-12 columns">
          <h2 class="pagina-titulo">
            <?php 
              $allsearch = new WP_Query("s=$s&showposts=-1"); 
              $count = $allsearch->post_count; echo $count . ' '; 
              wp_reset_query(); 
              ?> 
              resultados para    
              "<?php the_search_query() ?>"
          </h2>
          <hr>
        </div>
      </div>

      <!-- ARTICULO -->

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
          <div class="articulos-recientes"><i class="fa fa-chevron-left"></i> <?php previous_posts_link( 'Recientes' ); ?></div>
          <div class="articulos-antiguos"><?php next_posts_link( 'Antiguos' ); ?> <i class="fa fa-chevron-right"></i></div>
        </div>
      </div>
    </div>
  </div>

</div> <!-- /.contenedor -->

<?php get_footer(); ?>