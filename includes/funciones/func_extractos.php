<?php 
// Podemos personalizar la salida usando 
// $customLength=30; echo get_the_excerpt(); y 
// $customLength=0; entre etiquetas php
function custom_excerpt_length( $length ) {
	global $customLength;
	if( $customLength ) {
		return $customLength;
	} else {
		return 30;
	}
}
// Generamos el botón la elipsis al final de los artículos
function new_excerpt_more( $more ) {
	return ' <a class="leer-mas" href="'. get_permalink( get_the_ID() ) . '">' . __(' … ', '') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
?>