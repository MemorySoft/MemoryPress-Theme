<?php 
/**
* LISTA PERSONALIZADA DE CATEGORIAS
*/
function get_my_category_list( $separator = '', $parents='', $post_id = false ) {
	global $wp_rewrite;
	$categories = get_the_category( $post_id );
	if ( !is_object_in_taxonomy( get_post_type( $post_id ), 'category' ) )
		return apply_filters( 'the_category', '', $separator, $parents );
	if ( empty( $categories ) )
		return apply_filters( 'the_category', __( 'Uncategorized' ), $separator, $parents );
	$rel = ( is_object( $wp_rewrite ) && $wp_rewrite->using_permalinks() ) ? 'rel="category tag"' : 'rel="category"';
	$thelist = '';
	if ( '' == $separator ) {
		$thelist .= '<ul class="post-categories">';
		foreach ( $categories as $category ) {
			$thelist .= "\n\t<li>";
			switch ( strtolower( $parents ) ) {
				case 'multiple':
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, true, $separator );
						$thelist .= '<a class="category-'.$category->category_nicename.'" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
					break;
				case 'single':
					$thelist .= '<a class="category-'.$category->category_nicename.'" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>';
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, false, $separator );
					$thelist .= $category->name.'</a></li>';
					break;
				case '':
				default:
					$thelist .= '<a class="category-'.$category->category_nicename.'" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
			}
		}
		$thelist .= '</ul>';
	} else {
		$i = 0;
		foreach ( $categories as $category ) {
			if ( 0 < $i )
				$thelist .= $separator;
			switch ( strtolower( $parents ) ) {
				case 'multiple':
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, true, $separator );
						$thelist .= '<a class="category-'.$category->category_nicename.'" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a>';
					break;
				case 'single':
					$thelist .= '<a class="category-'.$category->category_nicename.'" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>';
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, false, $separator );
						$thelist .= "$category->name</a>";

					break;
				case '':
				default:
					$thelist .= '<a class="category-'.$category->category_nicename.'" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a>';
			}
			++$i;
		}
	}
	return apply_filters( 'the_category', $thelist, $separator, $parents );
}
/**
* REESCRIBE LAS URLS DE CATEGORÍAS
* Plugin Name: WP No Category Base
* Plugin URI: http://blinger.org/wordpress-plugins/no-category-base/
* Description: Removes '/category' from your category permalinks.
* Version: 1.1.1
* Author: iDope
* Author URI: http://efextra.com/
* License: GNU General Public License
* Copyright 2008  Saurabh Gupta  (email : saurabh0@gmail.com)
*/
// Refresh rules on activation/deactivation/category changes
register_activation_hook(__FILE__, 'no_category_base_refresh_rules');
add_action('created_category', 'no_category_base_refresh_rules');
add_action('edited_category', 'no_category_base_refresh_rules');
add_action('delete_category', 'no_category_base_refresh_rules');
function no_category_base_refresh_rules() {
	global $wp_rewrite;
	$wp_rewrite -> flush_rules();
}
register_deactivation_hook(__FILE__, 'no_category_base_deactivate');
function no_category_base_deactivate() {
	remove_filter('category_rewrite_rules', 'no_category_base_rewrite_rules');
	// We don't want to insert our custom rules again
	no_category_base_refresh_rules();
}
// Remove category base
add_action('init', 'no_category_base_permastruct');
function no_category_base_permastruct() {
	global $wp_rewrite, $wp_version;
	if (version_compare($wp_version, '3.4', '<')) {
		// For pre-3.4 support
		$wp_rewrite -> extra_permastructs['category'][0] = '%category%';
	} else {
		$wp_rewrite -> extra_permastructs['category']['struct'] = '%category%';
	}
}
// Add our custom category rewrite rules
add_filter('category_rewrite_rules', 'no_category_base_rewrite_rules');
function no_category_base_rewrite_rules($category_rewrite) {
	//var_dump($category_rewrite); // For Debugging
	$category_rewrite = array();
	$categories = get_categories(array('hide_empty' => false));
	foreach ($categories as $category) {
		$category_nicename = $category -> slug;
		if ($category -> parent == $category -> cat_ID)// recursive recursion
			$category -> parent = 0;
		elseif ($category -> parent != 0)
			$category_nicename = get_category_parents($category -> parent, false, '/', true) . $category_nicename;
		$category_rewrite['(' . $category_nicename . ')/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$'] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
		$category_rewrite['(' . $category_nicename . ')/page/?([0-9]{1,})/?$'] = 'index.php?category_name=$matches[1]&paged=$matches[2]';
		$category_rewrite['(' . $category_nicename . ')/?$'] = 'index.php?category_name=$matches[1]';
	}
	// Redirect support from Old Category Base
	global $wp_rewrite;
	$old_category_base = get_option('category_base') ? get_option('category_base') : 'category';
	$old_category_base = trim($old_category_base, '/');
	$category_rewrite[$old_category_base . '/(.*)$'] = 'index.php?category_redirect=$matches[1]';
	//var_dump($category_rewrite); // For Debugging
	return $category_rewrite;
}
// For Debugging
//add_filter('rewrite_rules_array', 'no_category_base_rewrite_rules_array');
//function no_category_base_rewrite_rules_array($category_rewrite) {
//	var_dump($category_rewrite); // For Debugging
//}
// Add 'category_redirect' query variable
add_filter('query_vars', 'no_category_base_query_vars');
function no_category_base_query_vars($public_query_vars) {
	$public_query_vars[] = 'category_redirect';
	return $public_query_vars;
}
// Redirect if 'category_redirect' is set
add_filter('request', 'no_category_base_request');
function no_category_base_request($query_vars) {
	//print_r($query_vars); // For Debugging
	if (isset($query_vars['category_redirect'])) {
		$catlink = trailingslashit(get_option('home')) . user_trailingslashit($query_vars['category_redirect'], 'category');
		status_header(301);
		header("Location: $catlink");
		exit();
	}
	return $query_vars;
}

// /**
// * EXCLUYE CATEGORIAS
// * Name: Remove Posts in Category From Homepage
// * Description: Hides certain categories from apearing on the main loop using a checkbox on edit/create category page.
// * Author: David Walsh
// * Author URI: http://davidwalsh.name/wordpress-plugin-homepage
// * Version: 1.1
// * GNU General Public License
// */
// $RCFH_LOOP_LABEL = 'Ocultar categoria';
// $RCFH_LOOP_DESCRIPTION = 'Activa esta opción si quieres que esta categoría sea excluida del loop principal de artículos.';
// $RCFH_LOOP_OPTION_KEY = 'remove-loop-cats';
// // Add the extra field to the EDIT category page
// 	add_action('category_edit_form_fields', 'rcfh_loop_field_edit');
// 	function rcfh_loop_field_edit($term) {
// 		global $RCFH_LOOP_LABEL, $RCFH_LOOP_DESCRIPTION, $RCFH_LOOP_OPTION_KEY;
// 		$value = get_option($RCFH_LOOP_OPTION_KEY);
// 		if(!$value) {
// 			$value = array();
// 		}
// 		$checked = in_array($term->term_id, $value);
// ?>
// 	<tr class="form-field">
// 		<th scope="row" valign="top"><?php _e($RCFH_LOOP_LABEL); ?></label></th>
// 		<td>
// 			<label for="removeMainLoop"><input type="checkbox" style="width:1%;float:left;" name="remove-loop" id="removeMainLoop"<?php echo $checked ? ' checked="checked"' : ''; ?> value="1" /><span class="description"><?php _e($RCFH_LOOP_DESCRIPTION); ?></span>
// 		</td>
// 	</tr>
// <?php }
// 	// Add the extra field to the ADD category page
// 	add_action('category_add_form_fields', 'rcfh_loop_field_create');
// 	function rcfh_loop_field_create() {
// 	global $RCFH_LOOP_LABEL, $RCFH_LOOP_DESCRIPTION;
// ?>
// 	<div class="form-field">
// 		<label for="removeMainLoop"><input type="checkbox" style="width:5%;float:left;" name="remove-loop" id="removeMainLoop" value="1" /><?php _e($RCFH_LOOP_LABEL); ?></label>
// 		<p><?php _e($RCFH_LOOP_DESCRIPTION); ?></p>
// 	</div>
// <?php }
// // Add action for saving extra category information
// add_action('edit_category', 'rcfh_save_loop_value');
// add_action('create_category', 'rcfh_save_loop_value');
// function rcfh_save_loop_value($id) {
// 	global $RCFH_LOOP_OPTION_KEY;
// 	$value = get_option($RCFH_LOOP_OPTION_KEY);
// 	if(!$value) {
// 		$value = array();
// 	}
// 	// Add or remove the value
// 	if(isset($_POST['remove-loop'])) {
// 		array_push($value, $id);
// 	}
// 	else {
// 		$value = array_diff($value, array($id));
// 	}
// 	// Ensure no duplicates, just for cleanliness
// 	$value = array_unique(array_values($value));
// 	// Save
// 	update_option($RCFH_LOOP_OPTION_KEY, $value);
// }
// // Filter for removing said category posts from main loop
// add_action('pre_get_posts', 'rcfh_prevent_posts');
// function rcfh_prevent_posts($query) {
// 	global $RCFH_LOOP_OPTION_KEY;

// 	// Only remove categories if it's the main query/homepage
// 	if($query->is_home() && $query->is_main_query()) {
// 		$value = get_option($RCFH_LOOP_OPTION_KEY);

// 		// Modify query to remove posts which shouldn't be shown
// 		if(count($value)) {
// 			$query->set('cat', '-'.implode(',-', $value));
// 		}
// 	}
// }
?>