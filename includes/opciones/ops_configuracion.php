<?php
/**
*		CONFIGURACIÓN GLOBAL
*  	--------------------
* 	Configuración de opciones comunes a varias partes del sitio web.
* 	Creado por: Hector Asencio @MemorySoft
* 	Versión: 1.0
*  	@package MemoryPress
*/

add_action('admin_menu', 'CreaMenuConfiguracion');
add_action('admin_init', 'RegistraOpcionesConfiguracion');

function CreaMenuConfiguracion() {
  add_menu_page(
  	__("MemoryPress"), 
  	__("MemoryPress"), 
  	"manage_options", 
  	"configuracion", 
  	"ConfiguracionGlobal", 
  	"dashicons-admin-generic", 
  	4.1
  	);
  add_submenu_page(
  	"configuracion",
  	__("Configuración"), 
  	__("Configuración"), 
  	"manage_options", 
  	"configuracion", 
  	"ConfiguracionGlobal"
  	);
}

function RegistraOpcionesConfiguracion() {

  add_option("global_banner_visibilidad","","","yes");
  add_option("global_banner_texto","","","yes");
  add_option("global_banner_texto_boton","","","yes");
  add_option("global_banner_enlace_boton","","","yes");

  add_option("global_footer_uno_titulo","","","yes");
  add_option("global_footer_dos_titulo","","","yes");

  add_option("global_analitica","","","yes");

  
  register_setting("opciones_globales", "global_banner_visibilidad");
  register_setting("opciones_globales", "global_banner_texto");
  register_setting("opciones_globales", "global_banner_texto_boton");
  register_setting("opciones_globales", "global_banner_enlace_boton");

  register_setting("opciones_globales", "global_footer_uno_titulo");
  register_setting("opciones_globales", "global_footer_dos_titulo");

  register_setting("opciones_globales", "global_analitica");

}

function ConfiguracionGlobal() {
    if (!current_user_can('manage_options'))
        wp_die(__("No tienes acceso a esta página."));
    ?> 

    <div class="wrap">
      <h1><span class="dashicons dashicons-admin-generic" style="font-size: 2rem; margin-right: 1rem;"></span>  Configuración Global <small>- Ajustes que afectan a todo el sitio web</small></h1>
    
      <hr>

      <?php settings_errors(); ?> 

      <form method="post" action="options.php">
        <?php settings_fields('opciones_globales'); ?>

	      <h2>Anuncio global</h2>
	      <p>Este contenido aparecerá en la parte superior de todas las páginas del sitio. Úsalo consecuentemente.</p>
	      <table class="form-table">
	        <tr valign="top">
	          <th scope="row">Mostrar anuncio</th>
	          <td>
	          <?php $options = get_option( "global_banner_visibilidad" ); ?>
	          <input type="checkbox" name="global_banner_visibilidad" <?php checked( $options, 1 ); ?> value="1"> <span class="description">Desmarcar para ocultar el anuncio</span>
	        </tr>
	        <tr valign="top">
	          <th scope="row">Texto del anuncio</th>
	          <td><input type="text" name="global_banner_texto" size="40" value="<?php echo get_option('global_banner_texto'); ?>" /></td>
	        </tr>
	        <tr valign="top">
	          <th scope="row">Botón del anuncio</th>
	          <td><input type="text" name="global_banner_texto_boton" size="40" value="<?php echo get_option('global_banner_texto_boton'); ?>" />
	          <span class="description">Texto del botón</span>
	          <br>
	          <input type="text" name="global_banner_enlace_boton" size="40" value="<?php echo get_option('global_banner_enlace_boton'); ?>" />
	          <span class="description">Enlace del botón</span></td>
	        </tr>
	      </table>

	      <hr>

        <h2>Opciones del Footer</h2>
        <p>Aquí están agrupadas las opciones que son comunes al Footer de todo el sitio.</p>
        <table class="form-table">
          <tr valign="top">
            <th scope="row">Titulo del primer bloque</th>
            <td><input type="text" name="global_footer_uno_titulo" size="40" value="<?php echo get_option('global_footer_uno_titulo'); ?>" /></td>
          </tr>
          <tr valign="top">
            <th scope="row">Titulo del segundo bloque</th>
            <td><input type="text" name="global_footer_dos_titulo" size="40" value="<?php echo get_option('global_footer_dos_titulo'); ?>" /></td>
          </tr>
        </table>

        <hr>

	      <h2>Analitica de página</h2>
	      <p>Las analíticas de página ayudan a saber el número de visitantes, las páginas más vistas y otros parametros relativos a este sitio web.</p>
	      <table class="form-table">
	        <tr valign="top">
	          <th scope="row">ID de Google Analytics</th>
	          <td><input type="text" name="global_analitica" size="30" value="<?php echo get_option('global_analitica'); ?>" /></td>
	        </tr>
	      </table>

	      <p class="submit">
	        <input name="global_guardar" type="submit" class="button-primary" value="<?php _e('Guardar cambios') ?>" />
	      </p>
        
      </form>  
    </div>
    <?php
}
?>