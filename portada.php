<?php /* Template Name: Portada */ ?>
<?php include('includes/opciones/_variables.php'); ?>
<?php get_header(); ?>

<!-- CARRUSEL DE NOTICIAS -->

<?php 
  if ($carrusel_ver == 1) {
    $args=array(
      'post_type' => 'post',
      'category_name' => 'destacado',
      'posts_per_page'=> 3,
    );
    $destacado = new WP_Query($args);
    if( $destacado->have_posts() ) { ?>
      <div class="carrusel -carrusel-un-item--sin-controles sin-marge--abajo">
        <?php  while ( $destacado->have_posts() ) : $destacado->the_post(); ?>
          <div>
            <div class="articulo-encabezado">
              <div class="articulo-titulo"><?php the_title(); ?></div>
              <a class="articulo-enlace button large" href="<?php the_permalink(); ?>" class="" title="Leer <?php the_title(); ?>">Leer</a>
            </div>
            <div class="articulo-imagen">
              <?php the_post_thumbnail(); ?>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    <?php } ?>
<?php } ?>

<!-- WIDGETS -->

<div class="row sin-margen--abajo">
  <div class="small-12 columns">
    <br>
    <br>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('home-arriba') ) : ?>

    <?php endif; ?>
  </div>
</div>

<!-- PUNTOS FUERTES -->

<?php  
	if ($destacado_ver == 1) {
	?>
  <div class="franja sin-margen--abajo">
    <div class="row sin-margen--abajo texto-centrado">
      <div class="small-12 large-4 columns">
        <h4><?php echo $destacado_titulo_uno ?></h4>
        <p><?php echo $destacado_texto_uno ?></p>
        <?php if ($destacado_enlace_btn_uno != '' && $destacado_texto_btn_uno) { ?>
          <a href="<?php echo $destacado_enlace_btn_uno ?>" class="small button"><?php echo $destacado_texto_btn_uno ?></a>
        <?php } ?>
      </div>
      <div class="small-12 large-4 columns">
        <h4><?php echo $destacado_titulo_dos ?></h4>
        <p><?php echo $destacado_texto_dos ?></p>
        <?php if ($destacado_enlace_btn_dos != '' && $destacado_texto_btn_dos) { ?>
          <a href="<?php echo $destacado_enlace_btn_dos ?>" class="small button"><?php echo $destacado_texto_btn_dos ?></a>
        <?php } ?>
      </div>
      <div class="small-12 large-4 columns">
        <h4><?php echo $destacado_titulo_tres ?></h4>
        <p><?php echo $destacado_texto_tres ?></p>
        <?php if ($destacado_enlace_btn_tres != '' && $destacado_texto_btn_tres) { ?>
          <a href="<?php echo $destacado_enlace_btn_tres ?>" class="small button"><?php echo $destacado_texto_btn_tres ?></a>
        <?php } ?>
      </div>
    </div>
  </div>
<?php	} ?>

<!-- WIDGETS -->

<div class="row sin-margen--abajo">
	<div class="small-12 columns">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('home-enmedio') ) : ?>

		<?php endif; ?>
	</div>
</div>


<!-- ESCAPARATES -->

<?php 
  if ($escaparates_ver == 1) {
  ?>
  <div class="escaparates">
    <?php
    $args = array( 
      'post_type' => 'escaparate', 
      );
    $escaparates = new WP_Query( $args );
    ?>
    <?php while ( $escaparates->have_posts() ) : $escaparates->the_post();?>
      <div class="franja escaparate sin-margen--abajo sin-relleno--abajo">
        <div class="row sin-margen--abajo">
          <div class="small-12 medium-6 columns escaparate-texto">
            <h3><?php the_title(); ?></h3>
            <p><?php the_content(); ?></p>
            <?php 
            if ($escaparate_boton !='' && $escaparate_enlace !='') { 
                $escaparate_enlace = esc_html( get_post_meta( $escaparate_boton->ID, 'escaparate_enlace', true ) );
                $escaparate_boton = esc_html( get_post_meta( $escaparate_boton->ID, 'escaparate_boton', true ) );
              ?>
              <p>
              <a href="<?php echo $escaparate_enlace ?>" class="button">
                <?php echo $escaparate_boton ?>
              </a>
             <?php } ?>
             </p>
          </div>
          <div class="small-12 medium-6 columns escaparate-imagen">
            <?php the_post_thumbnail(); ?>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php } ?>

<!-- TARJETAS -->

<?php 
  if ($tarjetas_ver == 1) { ?>
  <div class="row">
    <?php
    $args = array( 
      'post_type' => 'tarjeta', 
      'posts_per_page'=> 4,
      );
    $tarjetas = new WP_Query( $args );
    ?>
    <div class="carrusel -carrusel-tres-items--navegacion sin-marge--abajo">
      <?php while ( $tarjetas->have_posts() ) : $tarjetas->the_post();?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="tarjeta-contenido">
              <span class="tarjeta-titulo">
                <?php the_title(); ?>
              </span>
            </div>
            <div class="tarjeta-accion">
              <a href="javascript:void(0)" class="control-abrir control-abrir--derecha" data-open="modal-<?php the_ID(); ?>"></a>
            </div>

          <!-- MODAL -->
          <div class="full reveal" id="modal-<?php the_ID(); ?>" data-reveal>
            <div class="row">
              <div class="small-12 columns">
                <h2><?php the_title(); ?></h2>
                <p class="lead"></p>
                <?php the_content(); ?>
                <p>
                  <hr>
                  <a href="javascript:void(0)" class="button invertido--oscuro close-button" data-close aria-label="Cerrar">CERRAR</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
<?php } ?>

<!-- RECORDATORIO -->

<?php 
if ($callout_home_ver == 1) { ?>
<div class="franja fondo-gris--claro sin-margen--abajo">
  <div class="row sin-margen--abajo">
    <div class="small-12 columns">
      <div class="large callout fondo-gris--claro sin-margen--abajo sin-borde texto-centrado">
        <h2><?php echo $callout_home_titulo ?></h2>
        <p><?php echo $callout_home_texto ?></p>
        <?php 
        if ($callout_home_boton !== '' && $callout_home_enlace !== '') { ?>
          <a href="<?php echo $callout_home_enlace ?>" class="button">
            <?php echo $callout_home_boton ?>
          </a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php get_footer(); ?>