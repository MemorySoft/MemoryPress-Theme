<?php  
/**
*   TARJETA POST TYPE
*   -----------------
*   Post type que genera un articulo con formato de tarjeta 
*   y que despliega su contenido en una ventana modal.
*   
*   Autor: Hector Asencio @MemorySoft
*   Versión: 1.0
*   @package MemoryPress
*
*/  

function crear_tarjeta() {
  register_post_type( 'tarjeta',
    array(
      'labels' => array(
        'name' => 'Tarjetas',
        'singular_name' => 'Tarjeta',
        'add_new' => 'Añadir tarjeta',
        'add_new_item' => 'Nueva tarjeta',
        'edit' => 'Editar',
        'edit_item' => 'Editar tarjeta',
        'new_item' => 'Nueva tarjeta',
        'view' => 'Ver',
        'view_item' => 'Ver tarjeta',
        'search_items' => 'Buscar tarjeta',
        'not_found' => 'Ninguna tarjeta encontrada',
        'not_found_in_trash' => 'Ningún tarjeta encontrada en la Papelera',
        'parent' => 'Tarjeta superior'
      ),
      'public' => true,
      'menu_position' => 50,
      'supports' => array( 'title', 'editor' ),
      'taxonomies' => array( '' ),
      'menu_icon' => 'dashicons-admin-page',
      'has_archive' => true
    )
  );
}
add_action( 'init', 'crear_tarjeta' );

/**
*   Para renderizar las tarjetas en el front-end, inserta el 
*   siguiente código en tu plantilla y modifícalo a tu gusto 
*   para que encaje con el estilo de tu tema.
*   
*   Dependencias: Foundation 6 + jQuery
*   

HTML/PHP
--------

<?php
$mypost = array( 'post_type' => 'tarjeta', );
$loop = new WP_Query( $mypost );
?>
<?php while ( $loop->have_posts() ) : $loop->the_post();?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="small-12 medium-4 columns">
      <div class="tarjeta">
        <div class="tarjeta-contenido">
          <span class="tarjeta-titulo">
            <?php the_title(); ?>
          </span>
        </div>
        <div class="tarjeta-accion">
          <a href="javascript:void(0)" class="control-abrir control-abrir--derecha" data-open="modal-<?php the_ID(); ?>"></a>
        </div>
      </div>
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
  </article>
<?php endwhile; ?>


CSS
---

.tarjeta {
  overflow: hidden;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  color: #333;
  margin-bottom: 2rem;
  position: relative;
}
.tarjeta-titulo {
  font-family: Roboto, Ubuntu, "Helvetica Neue", Helvetica, "Segoe UI", Arial, sans-serif;
  line-height: 1.7rem;
  font-size: 1.1rem;
  font-weight: 700;
  text-transform: uppercase;
}
.tarjeta-contenido {
  padding: 1.3rem;
  font-weight: 300;
  height: 16rem;
}
.tarjeta-reverso {
  background: #22bb5b;
  display: none;
  position: absolute;
  top: 0;
}
.tarjeta-accion {
  overflow: hidden;
  background: #eee;
  padding: 1.3rem;
  border-top: 1px solid #ccc;
}
.tarjeta-accion a {
  text-transform: uppercase;
  text-decoration: none;
}
.tarjeta-accion a:hover {
  opacity: .5;      
}
.tarjeta-imagen {
  position: relative;
}
.tarjeta-imagen .tarjeta-titulo {
  position: absolute;
  bottom: 0;
  left: 0;
  padding: 1.3rem;
  color: #fff;
}
.tarjeta-imagen img {
  border-radius: 2px 2px 0 0;
}

.control-abrir {
  background-color: transparent;
  width: 32px;
  height: 32px;
  position: relative;
  float: left;
}
.control-abrir:after {
  background-color: #333;
  width: 32px;
  height: 2px;
  position: absolute;
  top: 14px;
  left: 0;
  content: "";
}
.control-abrir:before {
  background-color: #333;
  width: 2px;
  height: 32px;
  position: absolute;
  top: 0;
  left: 14px;
  content: "";
}
.control-abrir--derecha {
  float: right;
}
.control-cerrar {
  background-color: transparent;
  width: 32px;
  height: 32px;
  position: relative;
  float: left;
}
.control-cerrar:after {
  background-color: #333;
  width: 32px;
  height: 2px;
  position: absolute;
  top: 15px;
  left: 0;
  content: "";
  transform: rotate(45deg);
}
.control-cerrar:before {
  background-color: #333;
  width: 2px;
  height: 32px;
  position: absolute;
  top: 0;
  left: 15px;
  content: "";
  transform: rotate(45deg);
}
.control-cerrar--derecha {
  float: right;
}
-------------------------------------------------------------------
*/
?>