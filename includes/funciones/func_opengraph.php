<?php 
add_action( 'wp_head', 'add_fb_open_graph_tags'	);
function add_fb_open_graph_tags() {
	if ( is_single() ) {
		global $post;
		if(get_the_post_thumbnail( $post->ID, 'thumbnail') ) {
			$thumbnail_id = get_post_thumbnail_id( $post->ID );
			$thumbnail_object = get_post( $thumbnail_id );
			$image = $thumbnail_object->guid;
		} else {	
			// Inserta aquí la URL del logo que quieres que salga al lado de tus enlaces en Facebook
			$image = ''; 
		}
		$description = get_bloginfo( 'description' );
		$description = the_excerpt( $post->post_content, $post->post_excerpt );
		$description = strip_tags( $description );
		$description = str_replace( "\"", "'", $description );
?>
	<meta property="og:title" content="<?php the_title(); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php echo $image; ?>" />
	<meta property="og:image:width" content="400" />
	<meta property="og:image:height" content="400" />
	<meta property="og:url" content="<?php the_permalink(); ?>" />
	<meta property="og:description" content="<?php echo $description ?>" />
	<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
	<!-- No olvides el ID de la app de Facebook! -->
	<meta property="fb:app_id" content="" /> 
<?php 	}
}
?>