<?php
/**
 *	DELEGACIÓN
 * 	----------
 */
add_action('admin_menu', 'CreaMenuOrganizacion');
add_action('admin_init', 'RegistraOpcionesOrganizacion');

function CreaMenuOrganizacion() {
  add_submenu_page(
  	"configuracion",
  	__("Organización"), 
  	__("Organización"), 
  	"manage_options", 
  	"delegacion", 
  	"DatosOrganizacion"
  	);
}

function RegistraOpcionesOrganizacion() {

  add_option("organizacion_nombre","","","yes");
  add_option("organizacion_direccion","","","yes");
  add_option("organizacion_telefono","","","yes");
  add_option("organizacion_horario_am","","","yes");
  add_option("organizacion_horario_pm","","","yes");
  add_option("organizacion_mapa","","","yes");
  add_option("organizacion_twitter","","","yes");
  add_option("organizacion_facebook","","","yes");
  add_option("organizacion_youtube","","","yes");
  add_option("organizacion_instagram","","","yes");

  register_setting("opciones_delegacion", "organizacion_nombre");
  register_setting("opciones_delegacion", "organizacion_direccion");
  register_setting("opciones_delegacion", "organizacion_telefono");
  register_setting("opciones_delegacion", "organizacion_horario_am");
  register_setting("opciones_delegacion", "organizacion_horario_pm");
  register_setting("opciones_delegacion", "organizacion_mapa");
  register_setting("opciones_delegacion", "organizacion_twitter");
  register_setting("opciones_delegacion", "organizacion_facebook");
  register_setting("opciones_delegacion", "organizacion_youtube");
  register_setting("opciones_delegacion", "organizacion_instagram");
}

function DatosOrganizacion() {
    if (!current_user_can('manage_options'))
        wp_die(__("No tienes acceso a esta página."));
    ?> 

    <div class="wrap">
      <h1><span class="dashicons dashicons-admin-generic" style="font-size: 2rem; margin-right: 1rem;"></span>  Organización <small>- Datos referentes a esta organización</small></h1>
    
      <hr>

      <?php settings_errors(); ?>

      <form method="post" action="options.php">
        <?php settings_fields('opciones_delegacion'); ?>

				<h2>Datos de contacto</h2>
				<p>Estos son los datos de contacto de la organización, aparecerán en el footer y en la página de contacto.</p>
        <table class="form-table">
          <tr valign="top">
            <th scope="row">Nombre de la organización</th>
            <td><input type="text" name="organizacion_nombre" size="40" value="<?php echo get_option('organizacion_nombre'); ?>" />
            <p class="description">Ej: Podem Balears</p></td>
          </tr>
          <tr valign="top">
            <th scope="row">Dirección de la sede</th>
            <td><input type="text" name="organizacion_direccion" size="40" value="<?php echo get_option('organizacion_direccion'); ?>" /></td>
          </tr>
          <tr valign="top">
            <th scope="row">Teléfono de contacto</th>
            <td><input type="text" name="organizacion_telefono" size="40" value="<?php echo get_option('organizacion_telefono'); ?>" /></td>
          </tr>
          <tr valign="top">
            <th scope="row">Horario de mañanas</th>
            <td><input type="text" name="organizacion_horario_am" size="40" value="<?php echo get_option('organizacion_horario_am'); ?>" /></td>
          </tr>
          <tr valign="top">
            <th scope="row">Horario de tardes</th>
            <td><input type="text" name="organizacion_horario_pm" size="40" value="<?php echo get_option('organizacion_horario_pm'); ?>" /></td>
          </tr>
          <tr valign="top">
            <th scope="row">Mapa</th>
            <td><textarea name="organizacion_mapa" cols="37" rows="10"><?php echo get_option('organizacion_mapa'); ?></textarea>
            <p class="description">Pega aquí el código de Google Maps</p></td>
          </tr>
        </table>

        <hr>

        <h2>Perfiles sociales</h2>
        <p>Enlaces a los perfiles oficiales en redes sociales de esta organización.</p>
        <table class="form-table">
          <tr valign="top">
            <th scope="row">Twitter</th>
            <td><input type="text" name="organizacion_twitter" size="40" value="<?php echo get_option('organizacion_twitter'); ?>" />
            <p class="description">URL de Twitter</p></td>
          </tr>
          <tr valign="top">
            <th scope="row">Facebook</th>
            <td><input type="text" name="organizacion_facebook" size="40" value="<?php echo get_option('organizacion_facebook'); ?>" />
            <p class="description">URL de Facebook</p></td>
          </tr>
          <tr valign="top">
            <th scope="row">YouTube</th>
            <td><input type="text" name="organizacion_youtube" size="40" value="<?php echo get_option('organizacion_youtube'); ?>" />
            <p class="description">URL de YouTube</p></td>
          </tr>
          <tr valign="top">
            <th scope="row">Instagram</th>
            <td><input type="text" name="organizacion_instagram" size="40" value="<?php echo get_option('organizacion_instagram'); ?>" />
            <p class="description">URL de Instagram</p></td>
          </tr>
        </table>

        <p class="submit">
        	<input type="submit" class="button-primary" value="<?php _e('Guardar cambios') ?>" />
        </p>

      </form>
    </div>
    <?php
}
?>