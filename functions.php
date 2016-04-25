<?php
/**
*		FUNCIONES 
*  	---------
* 	Funciones y definiciones del tema MemoryPress.
* 	
* 	Autor: Hector Asencio @MemorySoft
* 	Versión: 1.0
*  	@package MemoryPress
*/

require_once('includes/init.php'); 													// Cargamos el soporte básico

/**
* FUNCIONES
* @since 1.0
*********************************************************************************************************/
require_once('includes/funciones/func_dashboard.php'); 			// Personalizaciones del dashboard
require_once('includes/funciones/func_sidebars.php'); 			// Registro de zonas para widgets
require_once('includes/funciones/func_extractos.php');			// Extractos de articulos
require_once('includes/funciones/func_opengraph.php');			// Soporte pata OpenGraph
//require_once('includes/funciones/func_categorias.php');	// Funciones para las categorias TODO: reparar!

/**
*	PÁGINAS DE OPCIONES 
*	@since 1.0
*********************************************************************************************************/
require_once('includes/opciones/ops_configuracion.php'); 		// Configuración global del sitio
require_once('includes/opciones/ops_organizacion.php'); 		// Datos del propietario del sitio
require_once('includes/opciones/ops_inicio.php');						// Opciones para la página de inicio
require_once('includes/opciones/ops_contacto.php');					// Ociones para la página de contacto

/**
* ENTRADAS PERSONALIZADAS
* @since 1.0
*********************************************************************************************************/
require_once('includes/entradas/post_tarjeta.php');				// Crea posts como tarjetas y los abre en un modal
require_once('includes/entradas/post_escaparate.php');			// Crea posts destacados con su propio excerpt

/**
* WIDGETS
* @since 1.0
*********************************************************************************************************/
require_once('includes/widgets/wid_bloque.php');						// Genera un callout al 100% del ancho
require_once('includes/widgets/wid_autores.php');						// Genera una lista de los autores del blog
require_once('includes/widgets/wid_categorias.php');				// Genera una lista de posts de una categoria
?>
