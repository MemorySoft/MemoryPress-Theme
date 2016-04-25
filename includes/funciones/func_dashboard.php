<?php 
// LOGO PERSONALIZADO EN EL LOGIN
function memorypress_custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login.css" />';
}
add_action('login_head', 'memorypress_custom_login');

// PIE DE PÁGINA 
function change_footer_admin() {  
    echo '&copy;2016 MEMORYPRESS. Todos los derechos reservados - Creado por <a href="http://memorysoft.es">Memory Soft</a>';  
}  
add_filter('admin_footer_text', 'change_footer_admin');

// PERFIL EXTENDIDO DE USUARIO
function memorypress_usuario( $contactmethods ) {
    unset( $contactmethods[ 'aim' ] );
    unset( $contactmethods[ 'yim' ] );
    unset( $contactmethods[ 'jabber' ] );

    $contactmethods[ 'email_alt' ] 					= 'Email público';
    $contactmethods[ 'twitter' ] 						= 'Perfil de Twitter';
    $contactmethods[ 'facebook' ] 					= 'Perfil de Facebook';
    $contactmethods[ 'linkedin' ] 					= 'Perfil público de LinkedIn';
    $contactmethods[ 'googleplus' ] 				= 'Perfil de Google+';
    $contactmethods[ 'pinterest' ] 					= 'Perfil de Pinterest';
    $contactmethods[ 'flickr' ] 						= 'Perfil de Flickr';
    $contactmethods[ 'instagram' ] 					= 'Perfil de Instagram';
    $contactmethods[ 'youtube' ] 						= 'Perfil de Youtube';
    $contactmethods[ 'vimeo' ] 							= 'Perfil de Vimeo';
    $contactmethods[ 'tumblr' ] 	= 'Perfil de Tumblr';
    return $contactmethods;
}
add_filter( 'user_contactmethods', 'memorypress_usuario' );
?>