<?php /* Template Name: Contacto */ ?>
<?php include('includes/opciones/_variables.php'); ?>
<?php get_header(); ?>

<div class="contenedor">

	<!-- WIDGETS -->

	<div class="row sin-margen--abajo">
		<div class="small-12 columns">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('contacto-arriba') ) : ?>
			<?php endif; ?>
		</div>
	</div>

	<!-- DATOS DE CONTACTO -->
			
	<div class="row" data-equalizer data-equalize-on="medium">
		<div class="small-12 medium-6 columns">
			<div class="large callout fondo-granate" data-equalizer-watch>
				<h2 class="logo-texto sin-margen"><?php echo $organizacion_nombre ?></h2>
				<h5><?php echo $organizacion_direccion ?></h5>
				<div class="media-object">
					<?php 
						if ($icono_hora_ver == 1) {
						?>
						<div class="media-object-section">
							<i class="fa fa-clock-o fa-3x"></i>
						</div>
					<?php } ?>
					<div class="media-object-section">
						<p>
							<strong>
								<?php echo $organizacion_horario_am ?><br>
								<?php echo $organizacion_horario_pm ?>
							</strong>
						</p>
					</div>
				</div>
				<div class="media-object">
					<?php 
						if ($icono_telefono_ver == 1) {
						?>
						<div class="media-object-section">
							<i class="fa fa-phone fa-3x"></i>
						</div>
					<?php } ?>
					<div class="media-object-section">
						<h3 class="sin-margen"><?php echo $organizacion_telefono ?></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="small-12 medium-6 columns">
			<div class="destacado-media flex-video" data-equalizer-watch>
				<?php echo $organizacion_mapa ?>
			</div>
		</div>
	</div>

	<!-- FORMULARIO -->

	<?php 
		if ($formulario_ver == 1) {
		?>
		<div class="row sin-margen--abajo">
			<h5 class="titulo texto-centrado">Formulario de contacto</h5>
			<div class="small-12 columns texto-centrado">
				<?php
				if ($formulario_descripcion !== '') { ?>
					<p><?php echo $formulario_descripcion ?></p>
				<?php } 
				else { ?>
					<p>Envianos un mensaje y nos pondremos en contacto contigo lo antes posible.</p>
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="small-12 medium-8 large-centered column">
				<form action="https://formspree.io/<?php echo $formulario_email ?>" method="POST">
					<div class="row">
						<div class="small-12 columns">
							<label>Nombre
								<input name="nombre" type="text" placeholder="">
							</label>
							<label>Email de contacto
								<input name="email" type="text" placeholder="">
							</label>
							<label>Teléfono (opcional)
								<input name="telefono" type="text" placeholder="">
							</label>
						</div>
						<div class="medium-12 columns">
							<label>
								Mensaje
								<textarea name="mensaje" placeholder="" rows="8" required></textarea>
							</label>
						</div>
						<div class="small-12 medium-6 columns">
							<fieldset>
								<input type="checkbox" value="Legal" id="Legal" required><label for="Legal">Acepto la <a href="<?php echo $formulario_enlace ?>">política de privacidad</a> de datos</label>
							</fieldset>
						</div>
						<div class="small-12 medium-6 columns">
							<input class="button flota-derecha" type="submit" value="Enviar">
							<input class="button secondary flota-derecha" type="reset" value="Borrar">
							<input type="hidden" name="_next" value="<?php echo $formulario_gracias ?>" />
							<input type="hidden" name="_subject" value="Nuevo mensaje desde el fomulario de <?php bloginfo( 'name' ); ?>" />
							<input type="text" name="_gotcha" style="display:none" />
						</div>
					</div>
				</form>
			</div>
		</div>
	<?php } ?>

	<!-- WIDGETS -->

	<div class="row sin-margen--abajo">
		<div class="small-12 columns">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('contacto-abajo') ) : ?>

			<?php endif; ?>
		</div>
	</div>

</div> <!-- /.contenedor -->

<?php get_footer(); ?>