<?php get_header(); ?>

<div class="contenedor">

  <!-- WIDGETS -->

  <div class="row sin-margen--abajo">
    <div class="small-12 columns">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('blog-arriba') ) : ?>
      <?php endif; ?>
    </div>
  </div>

  <!-- TITULO -->

  <div class="row">
    <div class="small-12 columns">
      <?php ?>
        <?php if (is_category()) { ?>
          <h1 class="pagina-titulo">Categoría: <?php single_cat_title(); ?></h1>
        <?php } elseif( is_tag() ) { ?>
          <h1 class="pagina-titulo">Etiqueta: <?php single_tag_title(); ?></h1>
        <?php } elseif (is_day()) { ?>
          <h1 class="pagina-titulo"><?php the_time('j \d\e\ F \d\e\ Y'); ?></h1>
        <?php } elseif (is_month()) { ?>
          <h1 class="pagina-titulo"><?php the_time('F \d\e\ Y'); ?></h1>
        <?php } elseif (is_year()) { ?>
          <h1 class="pagina-titulo"><?php the_time('Y'); ?></h1>
        <?php } elseif (is_author()) { ?>
          <h1 class="pagina-titulo">Artículos de <?php get_the_author();?></h1>
        <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
          <h1 class="pagina-titulo">Archivo de <?php bloginfo( 'name' ); ?></h1>
      <?php } ?>
    </div>
  </div>

  <!-- CONTENIDO -->

  <div class="row">

    <!-- BARRA LATERAL -->

    <?php if (dynamic_sidebar('sidebar')) { ?>
      <?php $articulo_anchura = 'small-12 large-8'; ?>
      
    <?php } else { $articulo_anchura = 'small-12'; } ?>

    <!-- ARTICULOS -->

    <div class="<?php echo $articulo_anchura ?> columns contenido-principal">
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
                <div class="articulo-info">                  
                  <span class="articulo-fecha"><?php the_time('l j \d\e\ F \d\e\ Y \a\ \l\a\s\ G:i'); ?></span>
                <span class="articulo-autor">| Creado por <?php the_author_posts_link(); ?></span>
                </div>
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