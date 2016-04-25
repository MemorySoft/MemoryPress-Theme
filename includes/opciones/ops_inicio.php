<?php
/**
*   CONFIGURACIÓN DE LA PÁGINA DE INICIO
*   ------------------------------------
*   Configuración de opciones para la portada del sitio.
*   
*   Autor: Hector Asencio @MemorySoft
*   Versión: 1.0
*   @package MemoryPress
*/

add_action('admin_menu', 'CreaMenuInicio');
add_action('admin_init', 'RegistraOpcionesInicio');

function CreaMenuInicio() {
  add_submenu_page(
    "configuracion",
  	__("Inicio"), 
  	__("Inicio"), 
  	"manage_options", 
  	"home", 
  	"PaginaInicio"
  	);
}

function RegistraOpcionesInicio() {

  add_option("home_carrusel_visibilidad","","","yes");

  add_option("home_destacado_visibilidad","","","yes");
  add_option("home_destacado_titulo_uno","","","yes");
  add_option("home_destacado_texto_uno","","","yes");
  add_option("home_destacado_texto_boton_uno","","","yes");
  add_option("home_destacado_enlace_boton_uno","","","yes");
  add_option("home_destacado_titulo_dos","","","yes");
  add_option("home_destacado_texto_dos","","","yes");
  add_option("home_destacado_texto_boton_dos","","","yes");
  add_option("home_destacado_enlace_boton_dos","","","yes");
  add_option("home_destacado_titulo_tres","","","yes");
  add_option("home_destacado_texto_tres","","","yes");
  add_option("home_destacado_texto_boton_tres","","","yes");
  add_option("home_destacado_enlace_boton_tres","","","yes");

  add_option("home_escaparates_visibilidad","","","yes");
  add_option("home_escaparate_boton_texto","","","yes");
  add_option("home_escaparate_boton_enlace","","","yes");

  add_option("home_tarjetas_visibilidad","","","yes" );

  add_option("home_callout_visibilidad","","","yes");
  add_option("home_callout_titulo","","","yes");
  add_option("home_callout_texto","","","yes");
  add_option("home_callout_texto_boton","","","yes");
  add_option("home_callout_enlace_boton","","","yes");


  register_setting("opciones_home", "home_carrusel_visibilidad");
  register_setting("opciones_home", "home_destacado_visibilidad");

  register_setting("opciones_home", "home_destacado_visibilidad");
  register_setting("opciones_home", "home_destacado_titulo_uno");
  register_setting("opciones_home", "home_destacado_texto_uno");
  register_setting("opciones_home", "home_destacado_texto_boton_uno");
  register_setting("opciones_home", "home_destacado_enlace_boton_uno");
  register_setting("opciones_home", "home_destacado_titulo_dos");
  register_setting("opciones_home", "home_destacado_texto_dos");
  register_setting("opciones_home", "home_destacado_texto_boton_dos");
  register_setting("opciones_home", "home_destacado_enlace_boton_dos");
  register_setting("opciones_home", "home_destacado_titulo_tres");
  register_setting("opciones_home", "home_destacado_texto_tres");
  register_setting("opciones_home", "home_destacado_texto_boton_tres");
  register_setting("opciones_home", "home_destacado_enlace_boton_tres");

  register_setting("opciones_home", "home_escaparates_visibilidad");
  register_setting("opciones_home", "home_escaparate_boton_texto");
  register_setting("opciones_home", "home_escaparate_boton_enlace");

  register_setting("opciones_home", "home_tarjetas_visibilidad");

  register_setting("opciones_home", "home_callout_visibilidad");
  register_setting("opciones_home", "home_callout_titulo");
  register_setting("opciones_home", "home_callout_texto");
  register_setting("opciones_home", "home_callout_texto_boton");
  register_setting("opciones_home", "home_callout_enlace_boton");
}

function PaginaInicio() {
  if (!current_user_can('manage_options'))
      wp_die(__("No tienes acceso a esta página."));
  ?>
  <div class="wrap">
    <h1><span class="dashicons dashicons-admin-home" style="font-size: 2rem; margin-right: 1rem;"></span> Página de Inicio <small>- Opciones de configuración</small></h1>
    
    <hr>

    <?php settings_errors(); ?>

    <form method="post" action="options.php">
      <?php settings_fields('opciones_home'); ?>

      <h2>Carrusel de portada</h2>
      <p>Esta es la sección donde aparecen los post que tienen la categoria "Portada".</p>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Mostrar carrusel</th>
          <td>
          <?php $options = get_option( "home_carrusel_visibilidad" ); ?>
          <input type="checkbox" name="home_carrusel_visibilidad" <?php checked( $options, 1 ); ?> value="1"> <span class="description">Desmarcar para ocultar el carrusel</span>
        </tr>
      </table>

      <hr>

			<h2>Destacado</h2>
      <p>Esta es la sección que muestra la información destacada en la portada. Contiene tres columnas que se pueden rellenar con el texto que queramos y opcionalmente esconder.</p>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Mostrar Destacada</th>
          <td>
          <?php $options = get_option( "home_destacado_visibilidad" ); ?>
          <input type="checkbox" name="home_destacado_visibilidad" <?php checked( $options, 1 ); ?> value="1"> <span class="description">Desmarcar para ocultar la info Destacada</span>
        </tr>
      </table>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título de la columna uno</th>
          <td><input type="text" name="home_destacado_titulo_uno" size="40" value="<?php echo get_option('home_destacado_titulo_uno'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto de la columna uno</th>
          <td><textarea name="home_destacado_texto_uno" cols="37" rows="10"><?php echo get_option('home_destacado_texto_uno'); ?></textarea></td>
        </tr>
        <tr valign="top">
          <th scope="row">Botón izquierdo</th>
          <td><input type="text" name="home_destacado_texto_boton_uno" size="40" value="<?php echo get_option('home_destacado_texto_boton_uno'); ?>" />
          <span class="description">Texto del botón</span>
          <br>
          <input type="text" name="home_destacado_enlace_boton_uno" size="40" value="<?php echo get_option('home_destacado_enlace_boton_uno'); ?>" />
          <span class="description">Enlace del botón</span></td>
        </tr>
      </table>

      <hr>
      
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título de la columna dos</th>
          <td><input type="text" name="home_destacado_titulo_dos" size="40" value="<?php echo get_option('home_destacado_titulo_dos'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto de la columna dos</th>
          <td><textarea name="home_destacado_texto_dos" cols="37" rows="10"><?php echo get_option('home_destacado_texto_dos'); ?></textarea></td>
        </tr>
        <tr valign="top">
          <th scope="row">Botón derecho</th>
          <td><input type="text" name="home_destacado_texto_boton_dos" size="40" value="<?php echo get_option('home_destacado_texto_boton_dos'); ?>" />
          <span class="description">Texto del botón</span>
          <br>
          <input type="text" name="home_destacado_enlace_boton_dos" size="40" value="<?php echo get_option('home_destacado_enlace_boton_dos'); ?>" />
          <span class="description">Enlace del botón</span></td>
        </tr>
      </table>

      <hr>
      
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título de la columna tres</th>
          <td><input type="text" name="home_destacado_titulo_tres" size="40" value="<?php echo get_option('home_destacado_titulo_tres'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto de la columna tres</th>
          <td><textarea name="home_destacado_texto_tres" cols="37" rows="10"><?php echo get_option('home_destacado_texto_tres'); ?></textarea></td>
        </tr>
        <tr valign="top">
          <th scope="row">Botón derecho</th>
          <td><input type="text" name="home_destacado_texto_boton_tres" size="40" value="<?php echo get_option('home_destacado_texto_boton_tres'); ?>" />
          <span class="description">Texto del botón</span>
          <br>
          <input type="text" name="home_destacado_enlace_boton_tres" size="40" value="<?php echo get_option('home_destacado_enlace_boton_tres'); ?>" />
          <span class="description">Enlace del botón</span></td>
        </tr>
      </table>

      <hr>

      <h2>Escaparates</h2>
      <p>Controla la visibilidad de la sección Escaparates en la plantilla Portada.</p>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Mostrar Escaparates</th>
          <td>
          <?php $options = get_option( "home_escaparates_visibilidad" ); ?>
          <input type="checkbox" name="home_escaparates_visibilidad" <?php checked( $options, 1 ); ?> value="1"> <span class="description">Desmarcar para ocultar Escaparates</span>
        </tr>
      </table>

      <hr>

      <h2>Tarjetas</h2>
      <p>Controla la visibilidad de la sección Tarjetas en la plantilla Portada.</p>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Mostrar Tarjetas</th>
          <td>
          <?php $options = get_option( "home_tarjetas_visibilidad" ); ?>
          <input type="checkbox" name="home_tarjetas_visibilidad" <?php checked( $options, 1 ); ?> value="1"> <span class="description">Desmarcar para ocultar Tarjetas</span>
        </tr>
      </table>

      <h2>Callout</h2>
      <p>Esta es la sección a pie de página que sirve para insertar mensajes destacados con título, texto y enlace opcionales.</p>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Mostrar callout</th>
          <td>
          <?php $options = get_option( "home_callout_visibilidad" ); ?>
          <input type="checkbox" name="home_callout_visibilidad" <?php checked( $options, 1 ); ?> value="1"> <span class="description">Desmarcar para ocultar el callout completo</span>
        </tr>
      </table>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Título del callout</th>
          <td><input type="text" name="home_callout_titulo" size="40" value="<?php echo get_option('home_callout_titulo'); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto del callout</th>
          <td><textarea name="home_callout_texto" cols="37" rows="10"><?php echo get_option('home_callout_texto'); ?></textarea></td>
        </tr>
        <tr valign="top">
          <th scope="row">Botón del callout</th>
          <td><input type="text" name="home_callout_texto_boton" size="40" value="<?php echo get_option('home_callout_texto_boton'); ?>" />
          <span class="description">Texto del botón</span>
          <br>
          <input type="text" name="home_callout_enlace_boton" size="40" value="<?php echo get_option('home_callout_enlace_boton'); ?>" />
          <span class="description">Enlace del botón</span>
          <p class="description">Debes rellenar los dos campos o el botón no se mostrará.</p></td>
        </tr>
      </table>

      <p class="submit">
      	<input name="home_guardar" type="submit" class="button-primary" value="<?php _e('Guardar cambios') ?>" />
      </p>

    </form>
  </div>
<?php } ?>