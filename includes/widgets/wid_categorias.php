<?php 
/**
*   WIDGET CATEGORIAS
*   --------------
*   Widget que permite mostrar los posts de una determinada categoria.
*   Autor: vinoth06
*   Autor URI: http://buffercode.com/
*   Plugin URI: http://buffercode.com/plugin-display-post-titles-category-selection/
*   License: GPLv2
*   Versión: 1.0
*   @package MemoryPress
*/

class categorias extends WP_Widget {

  public function __construct() {
    $widget_ops = array('classname' => 'categorias', 'description' => 'Genera una lista de los posts de una categoría' );
    parent::__construct('categorias', 'Listado de posts por categorías', $widget_ops);
  }

  public function form($instance) {
      if (
        isset($instance['memory_no_post']) && 
        isset($instance['memory_category']) && 
        isset($instance['memory_name']) && 
        isset($instance['memory_bullet']) && 
        isset($instance['memory_title_count']) && 
        isset($instance['memory_combo_list']) && 
        isset($instance['memory_please_select']) && 
        isset($instance['memory_orderby']) && 
        isset($instance['memory_header_link'])) {
          $memory_no_post_value = $instance['memory_no_post'];
          $memory_category_value = $instance['memory_category'];
          $memory_name_value = $instance['memory_name'];
          $memory_bullet_value = $instance['memory_bullet'];
          $memory_title_count_value = $instance['memory_title_count'];
          $memory_combo_list_value = $instance['memory_combo_list'];
          $memory_please_select_value = $instance['memory_please_select'];
          $memory_orderby_value = $instance['memory_orderby'];
          $memory_header_link_value = $instance['memory_header_link'];
        } else { 
          // Valores por defecto
          $memory_no_post_value = 4;
          $memory_category_value = 2;
          $memory_name_value = 'Mi categoría';
          $memory_bullet_value = 2;
          $memory_title_count_value = 40;
          $memory_combo_list_value = 2;
          $memory_orderby_value = 4;
          $memory_please_select_value = 'Selecciona';
          $memory_header_link_value = 2;
        }
      ?>

      <p>
        <label for="<?php echo $this->get_field_id('memory_name'); ?>"><?php _e('Titulo:'); ?></label>
        <input class="widefat" 
          id="<?php echo $this->get_field_id('memory_name'); ?>"
          name="<?php echo $this->get_field_name('memory_name'); ?>" 
          type="text" 
          value="<?php echo esc_attr($memory_name_value); ?>" />
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('memory_category'); ?>"><?php _e('Selecciona la categoría:'); ?></label>
        <?php wp_dropdown_categories(array(
          'name' => $this->get_field_name('memory_category'), 
          'selected' => $memory_category_value, 
          'id' => $this->get_field_id('memory_category'), 
          'class' => 'widefat')); 
        ?> 
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('memory_no_post'); ?>"><?php _e('Número de posts:'); ?></label>
        <select 
          id="<?php echo $this->get_field_id('memory_no_post'); ?>" 
          name="<?php echo $this->get_field_name('memory_no_post'); ?>" 
          class="widefat">
            <?php
            $options = array(
              '1' => '1', 
              '2' => '2', 
              '3' => '3', 
              '4' => '4', 
              '5' => '5', 
              '6' => '6', 
              '7' => '7', 
              '8' => '8', 
              '9' => '9', 
              '10' => '10', 
              'All' => '11'
              );
            foreach ($options as $langu => $code) {
              echo '<option value="' . $code . '" id="' . $code . '"', $memory_no_post_value == $code ? ' selected="selected"' : '', '>', $langu, '</option>';
            }
            ?>
        </select>
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('memory_combo_list'); ?>"><?php _e('Lista o desplegable:'); ?></label>
        <select 
          id="<?php echo $this->get_field_id('memory_combo_list'); ?>" 
          name="<?php echo $this->get_field_name('memory_combo_list'); ?>" 
          class="widefat">
          <?php
          $cl_options = array(
            'Combo Box' => '1', 
            'Lista' => '2'
            );
          foreach ($cl_options as $cl_langu => $cl_code) {
            echo '<option value="' . $cl_code . '" id="' . $cl_code . '"', $memory_combo_list_value == $cl_code ? ' selected="selected"' : '', '>', $cl_langu, '</option>';
          }
          ?>
        </select>
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('memory_bullet'); ?>"><?php _e('Estilo de lista:'); ?></label>
        <select 
          id="<?php echo $this->get_field_id('memory_bullet'); ?>" 
          name="<?php echo $this->get_field_name('memory_bullet'); ?>" 
          class="widefat">
          <?php
          $bullet_options = array(
            'Sí' => '1', 
            'No' => '2'
            );
          foreach ($bullet_options as $bullet_value => $bullet_code) {
            echo '<option value="' . $bullet_code . '" id="' . $bullet_code . '"', $memory_bullet_value == $bullet_code ? ' selected="selected"' : '', '>', $bullet_value, '</option>';
          }
          ?>
        </select>
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('memory_please_select'); ?>"><?php _e('Texto del desplegable:'); ?></label>
        <input 
          id="<?php echo $this->get_field_id('memory_please_select'); ?>" 
          name="<?php echo $this->get_field_name('memory_please_select'); ?>" 
          type="text" 
          value="<?php echo esc_attr($memory_please_select_value); ?>"
          class="widefat" />
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('memory_orderby'); ?>"><?php _e('Orden:'); ?></label>
        <select 
          id="<?php echo $this->get_field_id('memory_orderby'); ?>"
          name="<?php echo $this->get_field_name('memory_orderby'); ?>" 
          class="widefat">
          <?php 
          $orderby_options = array(
            'Aleatorio' => '1', 
            'Ascendente' => '2', 
            'Descendente' => '3', 
            'Recientes' => '4', 
            'Modificados' => '5'
            );
          foreach ($orderby_options as $orderby_value => $orderby_code) {
            echo '<option value="' . $orderby_code . '" id="' . $orderby_code . '"', $memory_orderby_value == $orderby_code ? ' selected="selected"' : '', '>', $orderby_value, '</option>';
          }
          ?>
        </select>
      </p>
      <?php
  }

  function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['memory_no_post'] = (!empty($new_instance['memory_no_post']) ) ? strip_tags($new_instance['memory_no_post']) : '';
      $instance['memory_category'] = (!empty($new_instance['memory_category']) ) ? strip_tags($new_instance['memory_category']) : '';
      $instance['memory_name'] = (!empty($new_instance['memory_name']) ) ? strip_tags($new_instance['memory_name']) : '';
      $instance['memory_bullet'] = (!empty($new_instance['memory_bullet']) ) ? strip_tags($new_instance['memory_bullet']) : '';
      $instance['memory_title_count'] = (!empty($new_instance['memory_title_count']) ) ? strip_tags($new_instance['memory_title_count']) : '';
      $instance['memory_combo_list'] = (!empty($new_instance['memory_combo_list']) ) ? strip_tags($new_instance['memory_combo_list']) : '';
      $instance['memory_orderby'] = (!empty($new_instance['memory_orderby']) ) ? strip_tags($new_instance['memory_orderby']) : '';
      $instance['memory_header_link'] = (!empty($new_instance['memory_header_link']) ) ? strip_tags($new_instance['memory_header_link']) : '';
      $instance['memory_please_select'] = (!empty($new_instance['memory_please_select']) ) ? strip_tags($new_instance['memory_please_select']) : '';
      return $instance;
  }

  function widget($args, $instance) {
    extract($args);
    $memory_name_value = apply_filters('widget_title', $instance['memory_name']);
    $memory_category_value = empty($instance['memory_category']) ? '&nbsp;' : $instance['memory_category'];
    $memory_no_post_value = empty($instance['memory_no_post']) ? '&nbsp;' : $instance['memory_no_post'];
    $memory_bullet_value = empty($instance['memory_bullet']) ? '&nbsp;' : $instance['memory_bullet'];
    $memory_title_count_value = empty($instance['memory_title_count']) ? '&nbsp;' : $instance['memory_title_count'];
    $memory_combo_list_value = empty($instance['memory_combo_list']) ? '&nbsp;' : $instance['memory_combo_list'];
    $memory_please_select_value = empty($instance['memory_please_select']) ? 'Please Select' : $instance['memory_please_select'];
    $memory_orderby_value = empty($instance['memory_orderby']) ? '&nbsp;' : $instance['memory_orderby'];
    $memory_header_link_value = empty($instance['memory_header_link']) ? '&nbsp;' : $instance['memory_header_link'];
    $memory_cat_site_url = get_site_url();
    $memory_category_id = get_the_category_by_ID($memory_category_value);
    $category_id_str_replaced = strtolower(str_replace(" ", "-", $memory_category_id));

    if ($memory_header_link_value == 1) {
      $memory_header_link_t_f = '<a href="' . $memory_cat_site_url . '/category/' . $category_id_str_replaced . '">' . $memory_name_value . '</a>';
    } else {
      $memory_header_link_t_f = $memory_name_value;
    }
    if (!empty($name)) {
      // echo $before_title . $memory_header_link_t_f . $after_title;
      echo '<h4>' . $memory_header_link_t_f . '</h4>';
    }
    if ($memory_no_post_value == 11) {
      $memory_no_post_values = -1;
    } else {
      $memory_no_post_values = $memory_no_post_value;
    }
    if ($memory_orderby_value == 3) {
      $args = array(
        'category' => $memory_category_value, 
        'posts_per_page' => $memory_no_post_values, 
        'order' => 'DESC', 
        'orderby' => 'title'
        );
    } else if ($memory_orderby_value == 2) {
      $args = array(
        'category' => $memory_category_value, 
        'posts_per_page' => $memory_no_post_values, 
        'order' => 'ASC', 
        'orderby' => 'title'
        );
    } else if ($memory_orderby_value == 1) {
      $args = array(
        'category' => $memory_category_value, 
        'posts_per_page' => $memory_no_post_values, 
        'orderby' => 'rand'
        );
    }  else if ($memory_orderby_value == 5) {
      $args = array(
        'category' => $memory_category_value, 
        'posts_per_page' => $memory_no_post_values, 
        'orderby' => 'modified'
        );
    } else {
      $args = array(
        'category' => $memory_category_value, 
        'posts_per_page' => $memory_no_post_values, 
        'orderby' => 'ID'
        );
    }

    echo $before_widget;
    $myposts = get_posts($args);
    global $post;
    if ($memory_combo_list_value == 2) {
      foreach ($myposts as $post) : setup_postdata($post); ?>
        <div <?php post_class(); if ($memory_bullet_value == 2) { ?> style="list-style-type:none;"<?php } ?>>
          <div id="post-<?php the_ID(); ?>" class="articulo stack-for-small">
            <div class="articulo-seccion--mini">
              <a class="articulo-imagen" href="<?php the_permalink(); ?>" title="Leer <?php the_title(); ?>">
                <?php the_post_thumbnail(); ?>
              </a>
            </div>
            <div class="articulo-seccion--mini">
              <h6 class="articulo-titulo"><a href="<?php the_permalink(); ?>" title="Leer <?php the_title(); ?>"><?php the_title(); ?></a></h6>
            </div>
          </div>
        </div>
      <?php endforeach;
    } else { ?>
      <select onchange="window.location.href = this.options[this.selectedIndex].value">
        <option value="" selected ><?php echo $memory_please_select_value; ?></option>
        <?php foreach ($myposts as $post) : setup_postdata($post);
          $check_title = get_the_title();
          $title_count = strlen($check_title);
          if ($title_count > $memory_title_count_value) {
            $substr_title = substr($check_title, 0, $memory_title_count_value) . '...';
          } else {
            $substr_title = $check_title;
          }
          ?>
          <option value="<?php echo the_permalink(); ?>"><?php echo $substr_title ?></option>
        <?php endforeach; ?>
      </select>
      <?php
    }
    wp_reset_postdata();
    echo $after_widget;
  }
}
add_action('widgets_init', create_function('', 'return register_widget("categorias");'));
?>