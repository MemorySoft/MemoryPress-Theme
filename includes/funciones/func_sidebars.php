<?php 
/**
*		ÁREAS DE WIDGETS PARA MEMORYPRESS
*  	---------------------------------
* 	Registro de zonas habilitadas para widgets.
* 	
* 	Autor: Hector Asencio @MemorySoft
* 	Versión: 1.0
*  	@package MemoryPress
*/

if ( function_exists( 'register_sidebar' ) ) {
	// INDEX
	register_sidebar( array(
		'name' => 'Blog Arriba',
		'id' => 'blog-arriba',
		'description'   => 'Inserta contenido en la parte superior del blog',
		'before_widget' => '<div id="%1$s" class="modulo %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'Sidebar',
		'description'   => 'Inserta contenido en la barra lateral del blog',
		'before_widget' => '<div id="%1$s" class="modulo %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );

	// PORTADA
	register_sidebar( array(
		'name' => 'Portada Arriba',
		'id' => 'home-arriba',
		'description'   => 'Inserta contenido en la parte superior de la plantilla Portada',
		'before_widget' => '<div id="%1$s" class="modulo %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => 'Portada En Medio',
		'id' => 'home-enmedio',
		'description'   => 'Inserta contenido en la parte central de la platilla Portada',
		'before_widget' => '<div id="%1$s" class="modulo %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );

	// CONTACTO
	register_sidebar( array(
		'name' => 'Contacto Arriba',
		'id' => 'contacto-arriba',
		'description'   => 'Inserta contenido arriba de la plantilla Contacto',
		'before_widget' => '<div id="%1$s" class="modulo %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => 'Contacto Bajo Directorio',
		'id' => 'contacto-abajo',
		'description'   => 'Inserta contenido abajo de la plantilla Contacto',
		'before_widget' => '<div id="%1$s" class="modulo %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );

	// FOOTER
	register_sidebar( array(
		'name' => 'Footer Uno',
		'id' => 'footer-uno',
		'description'   => 'Inserta contenido en la columna central del pie de página',
		'before_widget' => '<div id="%1$s" class="modulo %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => 'Footer Dos',
		'id' => 'footer-dos',
		'description'   => 'Inserta contenido en la columna derecha del pie de página',
		'before_widget' => '<div id="%1$s" class="modulo %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );
}
?>