<?php 
/**
*   WIDGET AUTORES
*   --------------
*   Widget que genera una lista de los autores del blog.
*   
*   Autor: Hector Asencio @MemorySoft
*   Versión: 1.0
*   @package MemoryPress
*/

function autores() {
  global $wpdb;
  $authors = $wpdb->get_results("SELECT ID, user_nicename from $wpdb->users ORDER BY display_name");
  foreach($authors as $author) {
    echo '<li>';
    echo '<a class="autor-nombre" href="'.get_bloginfo('url').'/?author=';
    echo $author->ID;
    echo '">';
    echo get_avatar($author->ID);
    echo the_author_meta('display_name', $author->ID);
    echo '</a>';
    echo '</li>';
  }
}

class autores extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'autores', 'description' => 'Genera una lista de los autores del sitio' );
    parent::__construct('autores', 'Listado de autores', $widget_ops);
	}

	public function form( $instance ) {
		$titulo = esc_attr($instance['titulo']);
		?>
		<p>
      <label for="<?php echo $this->get_field_id('titulo'); ?>"><?php _e('Titulo:'); ?></label>
      <input class="widefat" 
        id="<?php echo $this->get_field_id('titulo'); ?>" 
        name="<?php echo $this->get_field_name('titulo'); ?>" 
        type="text" 
        value="<?php echo $titulo; ?>" />
    </p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
    $instance['titulo'] = strip_tags($new_instance['titulo']);
    return $instance;
	}

	public function widget( $args, $instance ) {
		extract( $args , EXTR_SKIP);
    $titulo = empty($instance['titulo']) ? '' : $instance['titulo'];

    echo $before_widget;
    if ( $titulo ) { 
      echo $before_title;
      echo '<h4>' . $titulo . '</h4>';
      echo $after_title;
      echo '<ul class="autor-listado">';
      echo autores(); 
      echo '</ul>';
    }
    echo $after_widget;
	}
}
add_action('widgets_init', create_function('', 'return register_widget("autores");'));
?>