<?php /* Template Name: Página Contacto Template */
/**
 * Esta es la plantilla que despliega la informacion de la página
 * Contacto
 *
 */

/**
  * Objeto actual
  */
global $post;

/*
 * Obtener Header
 */
get_header(); 

/*
 * Extraer opciones del tema
 */
$options = get_option("theme_settings");

/*
 * Importar banner de Página
 */

include( locate_template('partials/banner-top-page.php') );

?>

<!-- Wrapper de Contenido / Contenedor Layout -->
<div class="pageWrapperLayout containerRelative">

	<!-- Contenedor Sección -->
	<section class="sectionContainerContact">

		<!-- Subtitulo -->
		<h4 class="subtitle-contact text-xs-center"> <?= __( 'Estar en contacto' , LANG ); ?></h4>

		<!-- Título -->
		<h2 class="title-contact text-xs-center text-uppercase"> <?= __( 'como encontrarnos' , LANG ); ?> </h2>

		<!-- Espacio --> <br/><br/>

		<!-- Items Row -->
		<div class="row text-xs-center">
			
			<!-- Item -->
			<div class="col-xs-12 col-sm-4">

				<!-- Item -->
				<div class="itemContact">

					<!-- Título -->
					<h2 class="text-uppercase"> <?= __( 'acerca de nosotros' , LANG ); ?> </h2>

					<!-- Informacion de Contacto -->
					<?php 
						$text_presentation = isset($options['theme_footer_text']) && !empty($options['theme_footer_text'] ) ? apply_filters( 'the_content' , $options['theme_footer_text'] ) : '';

						echo $text_presentation;
					?>
					
				</div> <!-- /.itemContact -->
				
			</div> <!-- /.col-xs-12 col-sm-4 -->
			
			<!-- Item -->
			<div class="col-xs-12 col-sm-4">

				<!-- Item -->
				<div class="itemContact">

					<!-- Título -->
					<h2 class="text-uppercase"> <?= __( 'horarios de apertura' , LANG ); ?> </h2>

					<!-- Informacion Atencion -->
					<?= isset($options['theme_atention_text']) ? apply_filters( 'the_content' , $options['theme_atention_text'] ) : ''; ?>
					
				</div> <!-- /.itemContact -->
				
			</div> <!-- /.col-xs-12 col-sm-4 -->
			
			<!-- Item -->
			<div class="col-xs-12 col-sm-4">

				<!-- Item -->
				<div class="itemContact">

					<!-- Título -->
					<h2 class="text-uppercase"> <?= __( 'contactos' , LANG ); ?> </h2>

					<!-- Informacion Dirección -->
					<?= isset($options['theme_address_text']) ? apply_filters('the_content' , $options['theme_address_text'] ) : ''; ?>
					
					<!-- Email -->
					<p class="featured">
						<?= isset($options['theme_email_text']) ? $options['theme_email_text'] : ''; ?>
					</p>
					
				</div> <!-- /.itemContact -->
				
			</div> <!-- /.col-xs-12 col-sm-4 -->

		</div> <!-- /.row -->

		<!-- Sección de Mapa -->
		<?php //Verificar si el mapa está seteado o no
	  		if( exist_map() ) : ?> <div id="canvas-map"></div>
		<?php endif; ?>	

		<!-- Formulario -->
		<form id="form-contacto" class="pageContacto__form" method="POST">

			<!-- Title -->
			<h2 class="text-uppercase title-formulary text-xs-center"> <?= __( '¿tiene alguna pregunta?' , LANG ); ?> </h2>

			<!-- Nombre -->
			<div class="pageContacto__form__group">
				<label for="input_name" class="sr-only">Nombres </label>
				<input type="text" id="input_name" name="input_name" placeholder="<?php _e( 'Nombre y Apellido:', LANG ); ?>" required />
			</div> <!-- /.pageContacto__form__group -->

			<!-- Email y telefono -->
			<div class="containerFlex">
			
				<!-- Email -->
				<div class="pageContacto__form__group special-group">
					<label for="input_email" class="sr-only">E-mail</label>
					<input type="email" id="input_email" name="input_email" placeholder="<?php _e( 'Email:', LANG ); ?>" data-parsley-trigger="change" required="" data-parsley-type-message="Escribe un email válido"/>
				</div> <!-- /.pageContacto__form__group -->	

				<!-- Teléfono -->
				<div class="pageContacto__form__group special-group">
					<label for="input_phone" class="sr-only">Teléfono</label>
					<input type="text" id="input_phone" name="input_phone" placeholder="Teléfono:" data-parsley-type='digits' data-parsley-type-message="Solo debe contener números" required="" />
				</div> <!-- /.pageContacto__form__group -->

			</div> <!-- / -->

			<!-- Dirección -->
			<div class="pageContacto__form__group">
				<label for="input_address" class="sr-only">Dirección </label>
				<input type="text" id="input_address" name="input_address" placeholder="<?php _e( 'Dirección:', LANG ); ?>" required />
			</div> <!-- /.pageContacto__form__group -->
			
			<!-- Mensaje -->
			<div class="pageContacto__form__group">
				<label for="input_message" class="sr-only"> Mensaje</label>
				<textarea name="input_message" id="input_message" placeholder="<?php _e( 'Mensaje:', LANG ); ?>" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Necesitas más de 20 caracteres" data-parsley-validation-threshold="10"></textarea>
			</div> <!-- /.pageContacto__form__group -->

			<!-- Espacio --> <br />
			
			<!-- Botón Enviar Mensaje -->
			<button type="submit" class="btn-show-more text-uppercase">
			enviar mensaje
			</button>

		</form> <!-- /#form-contacto -->

	</section><!-- /.sectionContainerContact -->

</div> <!-- /.pageWrapperLayout containerRelative -->

<!-- Script Google Mapa -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNMUy9phyQwIbQgX3VujkkoV26-LxjbG0"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<?php //Verificar si el mapa está seteado o no
	  if( exist_map() ) : ?>

	<script type="text/javascript">	
		<?php  
			$lat = $options['theme_lat_coord'];
			$lng = $options['theme_long_coord'];

			$zoom_mapa = isset( $options['theme_zoom_mapa'] ) && !empty( $options['theme_zoom_mapa'] ) ? $options['theme_zoom_mapa'] : 16;
		?>

	    var map;
	    var lat = <?= $lat ?>;
	    var lng = <?= $lng ?>;

	    function initialize() {
	      //crear mapa
	      map = new google.maps.Map(document.getElementById('canvas-map'), {
	        center: {lat: lat, lng: lng},
	        zoom  : <?= $zoom_mapa; ?>,
	      });
	      //infowindow
	      <?php  

	      	$default_markup = "";

	      	if ( isset($options['theme_text_markup_map']) and !empty($options['theme_text_markup_map']) ) :
	      		$contenido_markup = trim( $options['theme_text_markup_map'] );

	      		$contenido_markup = !empty($contenido_markup) ? apply_filters("the_content" , $options['theme_text_markup_map']  ) : $default_markup;
	      	else:

	      		$contenido_markup = $default_markup;

	      	endif;
	      ?>

	      var contenido_markup = <?= json_encode( $contenido_markup ) ?>;

	      var infowindow  = new google.maps.InfoWindow({
	        content: contenido_markup
	      });
	      //icono
	      //var icono = "<?= IMAGES ?>/icon/contacto_icono_mapa.jpg";
	      //crear marcador
	      marker = new google.maps.Marker({
	        map      : map,
	        draggable: false,
	        animation: google.maps.Animation.DROP,
	        position : {lat: lat, lng: lng},
	        title    : "<?php _e(bloginfo('name') , LANG )?>",
	        //icon     : "<?= IMAGES . '/icon/icon_map.png' ?>",
	      });
	      //marker.addListener('click', toggleBounce);
	      marker.addListener('click', function() {
	        infowindow.open( map, marker);
	      });
	    }
	    google.maps.event.addDomListener(window, "load", initialize);
	</script>

<?php endif; ?>

<!-- Footer -->
<?php get_footer(); ?>