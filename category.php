<?php get_header(); ?>

<div class="contenedor">

  <!-- CONTENIDO -->

  <div class="row">
    <div class="small-12 medium-8 medium-centered columns contenido-principal">

      <!-- TITULO -->

      <div class="row">
        <div class="small-12 columns">
          <h2 class="pagina-titulo">Categoría: <?php single_cat_title(); ?></h2>
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