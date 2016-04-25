<?php 
/**
*		VARIABLES PARA MEMORYPRESS
*  	--------------------------
* 	Variables usadas por los distintos módulos.
* 	
* 	Autor: Hector Asencio @MemorySoft
* 	Versión: 1.0
*  	@package MemoryPress
*/

/**
 *  GLOBALES
 *  @since 1.0
 */
// Banner
$banner_ver 													= get_option('global_banner_visibilidad');
$banner_texto 												= get_option('global_banner_texto');
$banner_texto_boton 									= get_option('global_banner_texto_boton');
$banner_enlace_boton 									= get_option('global_banner_enlace_boton');
// Footer
$footer_uno_titulo										= get_option('global_footer_uno_titulo');
$footer_dos_titulo										= get_option('global_footer_dos_titulo');
// Analitica
$analitica 														= get_option('global_analitica');

/**
 *  ORGANIZACIÓN
 *  @since 1.0
 */
// Datos
$organizacion_nombre 									= get_option('organizacion_nombre');
$organizacion_direccion 							= get_option('organizacion_direccion');
$icono_telefono_ver										= get_option('organizacion_telefono_icono_visibilidad');
$organizacion_telefono 								= get_option('organizacion_telefono');
$icono_hora_ver												= get_option('organizacion_horario_icono_visibilidad');
$organizacion_horario_am 							= get_option('organizacion_horario_am');
$organizacion_horario_pm 							= get_option('organizacion_horario_pm');
$organizacion_mapa 										= get_option('organizacion_mapa');
// Redes Sociales
$enlace_twitter 											= get_option('organizacion_twitter');
$enlace_facebook 											= get_option('organizacion_facebook');
$enlace_youtube 											= get_option('organizacion_youtube');
$enlace_instagram 										= get_option('organizacion_instagram');

/**
 *  CONTACTO
 *  @since 1.0
 */
$formulario_ver 											= get_option('contacto_formulario_visibilidad');
$formulario_email											= get_option('contacto_formulario_email');
$formulario_enlace										= get_option('contacto_formulario_enlace_legal');
$formulario_descripcion								= get_option('contacto_formulario_descripcion');
$formulario_gracias										= get_option('contacto_formulario_gracias');

/**
 *  INICIO
 *  @since 1.0
 */
// Carrusel
$carrusel_ver                     		= get_option('home_carrusel_visibilidad');
// Portales
$destacado_ver                        = get_option('home_destacado_visibilidad');
$destacado_titulo_uno                 = get_option('home_destacado_titulo_uno');
$destacado_texto_uno                  = get_option('home_destacado_texto_uno');
$destacado_texto_btn_uno              = get_option('home_destacado_texto_boton_uno');
$destacado_enlace_btn_uno             = get_option('home_destacado_enlace_boton_uno');
$destacado_titulo_dos                 = get_option('home_destacado_titulo_dos');
$destacado_texto_dos                  = get_option('home_destacado_texto_dos');
$destacado_texto_btn_dos              = get_option('home_destacado_texto_boton_dos');
$destacado_enlace_btn_dos             = get_option('home_destacado_enlace_boton_dos');
$destacado_titulo_tres                = get_option('home_destacado_titulo_tres');
$destacado_texto_tres                 = get_option('home_destacado_texto_tres');
$destacado_texto_btn_tres             = get_option('home_destacado_texto_boton_tres');
$destacado_enlace_btn_tres            = get_option('home_destacado_enlace_boton_tres');
// Escaparates
$escaparates_ver											= get_option('home_escaparates_visibilidad');
$escaparate_boton											= get_option('home_escaparate_boton_texto');
$escaparate_enlace										= get_option('home_escaparate_boton_enlace');
// Tarjetas
$tarjetas_ver													= get_option('home_tarjetas_visibilidad');
// Callout
$callout_home_ver                 		= get_option('home_callout_visibilidad');
$callout_home_titulo              		= get_option('home_callout_titulo');
$callout_home_texto               		= get_option('home_callout_texto');
$callout_home_boton               		= get_option('home_callout_texto_boton');
$callout_home_enlace              		= get_option('home_callout_enlace_boton');
?>