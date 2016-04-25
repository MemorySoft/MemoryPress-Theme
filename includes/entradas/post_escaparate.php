<?php
/**
*   ESCAPARATE POST TYPE
*   --------------------
*   Post type que genera un artículo destacado con
*   imagen, texto, título y metabox para botón opcional.
*   
*   Autor: Hector Asencio @MemorySoft
*   Versión: 1.0
*   @package MemoryPress
*
*/  

function crear_escaparate() {
  register_post_type( 'escaparate',
    array(
      'labels' => array(
        'name' => 'Escaparates',
        'singular_name' => 'Escaparate',
        'add_new' => 'Añadir escaparate',
        'add_new_item' => 'Nuevo escaparate',
        'edit' => 'Editar',
        'edit_item' => 'Editar escaparate',
        'new_item' => 'Nuevo escaparate',
        'view' => 'Ver',
        'view_item' => 'Ver escaparate',
        'search_items' => 'Buscar escaparate',
        'not_found' => 'Ningún escaparate encontrado',
        'not_found_in_trash' => 'Ningún escaparate encontrado en la Papelera',
        'parent' => 'Escaparate superior'
      ),
      'public' => true,
      'menu_position' => 50,
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'taxonomies' => array( '' ),
      'menu_icon' => 'dashicons-store',
      'has_archive' => true
    )
  );
}
add_action( 'init', 'crear_escaparate' );

function escaparate_boton_meta_box() {
    add_meta_box( 'escaparate-boton',
        'Botón opcional',
        'muestra_escaparate_boton_meta_box',
        'escaparate', 
        'side', 
        'default'
    );
}
add_action( 'admin_init', 'escaparate_boton_meta_box' );

function muestra_escaparate_boton_meta_box( $escaparate_boton ) {
  $escaparate_boton_texto = esc_html( get_post_meta( $escaparate_boton->ID, 'escaparate_boton_texto', true ) );
  $escaparate_boton_enlace = esc_html( get_post_meta( $escaparate_boton->ID, 'escaparate_boton_enlace', true ) );
  ?>
  <table>
    <tr>
      <td>
      <label for="escaparate_boton_texto">Texto del botón</label>
      <input 
        type="text" 
        size="25" 
        name="escaparate_boton_texto" 
        value="<?php echo $escaparate_boton_texto; ?>" /></td>
    </tr>
    <tr>
      <td>
        <label for="escaparate_boton_enlace">Enlace del botón</label>
        <input 
        type="text" 
        size="25" 
        name="escaparate_boton_enlace" 
        value="<?php echo $escaparate_boton_enlace; ?>" /></td>
    </tr>
  </table>
  <?php
}

function agrega_escaparate_boton_valores( $escaparate_boton_id, $escaparate_boton ) {
  if ( $escaparate_boton->post_type == 'escaparate' ) {
    if ( isset( $_POST['escaparate_boton_texto'] ) && $_POST['escaparate_boton_texto'] != '' ) {
      update_post_meta( 
        $escaparate_boton_id, 
        'escaparate_boton_texto', 
        $_POST['escaparate_boton_texto'] 
        );
    }
    if ( isset( $_POST['escaparate_boton_enlace'] ) && $_POST['escaparate_boton_enlace'] != '' ) {
      update_post_meta( 
        $escaparate_boton_id, 
        'escaparate_boton_enlace', 
        $_POST['escaparate_boton_enlace'] 
        );
    }
  }
}
add_action( 'save_post', 'agrega_escaparate_boton_valores', 10, 2 );
?>