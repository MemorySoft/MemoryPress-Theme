<?php  
function crear_puntos_del_programa() {
  register_post_type( 'puntos-del-programa',
    array(
      'labels' => array(
        'name' => 'Puntos del Programa',
        'singular_name' => 'Punto del Programa',
        'add_new' => 'Añadir punto',
        'add_new_item' => 'Nuevo punto del Programa',
        'edit' => 'Editar',
        'edit_item' => 'Editar punto del Programa',
        'new_item' => 'Nuevo punto del Programa',
        'view' => 'Ver',
        'view_item' => 'Ver Punto del Programa',
        'search_items' => 'Buscar punto del Programa',
        'not_found' => 'Ningún Punto del Programa encontrado',
        'not_found_in_trash' => 'Ningún punto del Programa encontrado en la Papelera',
        'parent' => 'Punto del Programa superior'
      ),
      'public' => true,
      'menu_position' => 50,
      'supports' => array( 'title', 'editor' ),
      'taxonomies' => array( '' ),
      'menu_icon' => 'dashicons-image-filter',
      'has_archive' => true
    )
  );
}
add_action( 'init', 'crear_puntos_del_programa' );
?>