<?php
/**
*   CONFIGURACIÓN DE LA PÁGINA DE CONTACTO
*   --------------------------------------
*   Configuración de opciones para la pagina de contacto.
*   Creado por: Hector Asencio @MemorySoft
*   Versión: 1.0
*   @package MemoryPress
*/

add_action('admin_menu', 'CreaMenuContacto');
add_action('admin_init', 'RegistraOpcionesContacto');

function CreaMenuContacto() {
  add_submenu_page(
    "configuracion",
  	__("Contacto"), 
  	__("Contacto"), 
  	"manage_options", 
  	"contacto", 
  	"PaginaContacto"
  	);
}

function RegistraOpcionesContacto() {

  add_option("contacto_formulario_visibilidad","","","yes");
  add_option("contacto_formulario_email","","","yes");
  add_option("contacto_formulario_descripcion","","","yes");
  add_option("contacto_formulario_enlace_legal","","","yes");
  add_option("contacto_formulario_gracias","","","yes");

  register_setting("opciones_contacto", "contacto_formulario_visibilidad");
  register_setting("opciones_contacto", "contacto_formulario_email");
  register_setting("opciones_contacto", "contacto_formulario_descripcion");
  register_setting("opciones_contacto", "contacto_formulario_enlace_legal");
  register_setting("opciones_contacto", "contacto_formulario_gracias");
  
}

function PaginaContacto() {
  if (!current_user_can('manage_options'))
      wp_die(__("No tienes acceso a esta página."));
  ?>
  <div class="wrap">
    <h1><span class="dashicons dashicons-email-alt" style="font-size: 2rem; margin-right: 1rem;"></span> Página de Contacto <small>- Opciones de configuración</small></h1>
    
    <hr>

    <?php settings_errors(); ?>

    <form method="post" action="options.php">
      <?php settings_fields('opciones_contacto'); ?>

      <h2>Formulario</h2>
      <p>Controla la visualización del formulario de contacto.</p>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Mostrar Formulario</th>
          <td>
          <?php $options = get_option( "contacto_formulario_visibilidad" ); ?>
          <input type="checkbox" name="contacto_formulario_visibilidad" <?php checked( $options, 1 ); ?> value="1"> <span class="description">Desmarcar para ocultar el Formulario</span>
        </tr>
        <tr valign="top">
          <th scope="row">Email del formulario</th>
          <td><input type="text" name="contacto_formulario_email" size="40" value="<?php echo get_option('contacto_formulario_email'); ?>" />
          <p class="description">Introduce la dirección de correo donde quieres recibir los mensajes del formulario.</p></td>
        </tr>
        <tr valign="top">
          <th scope="row">Página de confirmación</th>
          <td><input type="text" name="contacto_formulario_gracias" size="40" value="<?php echo get_option('contacto_formulario_gracias'); ?>" /><span class="description">URL de la página</span><br>
          <p class="description">Página que contiene el mensaje de confirmación del envio del formulario. <br>Debes crearla primero. Si lo dejas vacio aparecerá un mensaje por defecto.</p></td>
        </tr>
        <tr valign="top">
          <th scope="row">Descripción del formulario</th>
          <td><textarea name="contacto_formulario_descripcion" cols="37" rows="10"><?php echo get_option('contacto_formulario_descripcion'); ?></textarea>
          <p class="description">El texto que saldrá bajo el titulo del formulario. <br>Si lo dejas vacio aparecerá un texto por defecto.</p></td>
        </tr>
        <tr valign="top">
          <th scope="row">Enlace texto legal</th>
          <td><input type="text" name="contacto_formulario_enlace_legal" size="40" value="<?php echo get_option('contacto_formulario_enlace_legal'); ?>" />
          <p class="description">Este es el enlace a la página donde están <br>las condiciones de uso y de privacidad.</p></td>
        </tr>
      </table>

      <p class="submit">
      	<input name="contacto_guardar" type="submit" class="button-primary" value="<?php _e('Guardar cambios') ?>" />
      </p>

    </form>
  </div>
<?php } ?>