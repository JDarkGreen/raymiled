<?php
/**
 * La plantilla que muestra el footer
 *
 * Contiene el cierre de la div #content y todo el contenido después de
 *
 * @package WordPress
 * @subpackage Aqua Spa
 * @since Aqua Spa 1.0
 */

//Extraer todas las opciones de personalización
$options = get_option("theme_settings");

//var_dump($options);

?>
	
	<footer id="mainFooter" class="mainFooter">
		
		<!-- Wrapper de Contenido / Contenedor Layout -->
		<div class="pageWrapperLayout containerFlex">

			<!-- Item Footer Logo -->
			<div class="itemFooter">

				<!-- Logo -->
				<h2 id="logo-footer">
					<img src="<?= IMAGES ?>/logo.png" alt="<?php bloginfo('description'); ?>" class="img-fluid d-block m-x-auto" />
				</h2> <!-- /.logo -->

				<!-- Texto Presentación -->
				<?php 
					$text_footer = isset($options['theme_footer_text']) && !empty($options['theme_footer_text'] ) ? apply_filters( 'the_content' , $options['theme_footer_text'] ) : '';

					echo $text_footer;
				?>  

			</div> <!-- /.itemFooter -->

			<!-- Item Footer Contacto -->
			<div class="itemFooter">

				<h2 class="title-footer text-uppercase"> <?= __("Contacto" , LANG );?> </h2>

				<!-- Menu de Datos -->
				<ul class="menuContactoFooter">
					
					<!-- Celulares -->	
					<li>
						<!-- Icon -->
						<i class="fa fa-whatsapp" aria-hidden="true"></i>

						<?php  
							for ( $i=1 ;  $i <= 5 ;  $i++) 
							{ 
								$cel = isset($options['theme_cel_text_'.$i]) ? $options['theme_cel_text_'.$i] : '';

								echo $i !== 1 && !empty($cel) ? ' - ' : '';
								echo $cel;

							}
						?>
					</li>

					<!-- Teléfonos -->
					<?php /*
					<li>
						<!-- Icon -->
						<i class="fa fa-phone" aria-hidden="true"></i>

						<?php  
							for ( $i=1 ;  $i <= 5 ;  $i++) 
							{ 
								$phone = isset($options['theme_phone_text_'.$i]) ? $options['theme_phone_text_'.$i] : '';

								echo $i !== 1 && !empty($phone) ? ' - ' : '';
								echo $phone;

							}
						?>
					</li> */ ?>

					<!-- Email -->
					<li class="featured">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<?= isset($options['theme_email_text']) ? $options['theme_email_text'] : ''; ?>
					</li>
					
				</ul> <!-- /.menuContactoFooter -->

				<!-- Menu redes sociales -->
				<?php include( locate_template('partials/social/menu-footer-social.php') ); ?>

				<br/>

				<!-- Texto web -->
				<div class="text-web"> www.raymipistasled.com </div>

			</div> <!-- /.itemFooter -->

			<!-- Item Footer Reservas -->
			<div class="itemFooter">

				<h2 class="title-footer text-uppercase"> <?= __("Reservas" , LANG );?> </h2>

				<!-- Menu de Datos -->
				<ul class="menuContactoFooter">
							
					<!-- Direccion -->
					<li class="address">
						<i class="fa fa-home" aria-hidden="true"></i>
						<?= isset($options['theme_address_text']) ? apply_filters('the_content' , $options['theme_address_text'] ) : ''; ?>
					</li>	

					<!--  Atencion -->
					<li>
						<i class="fa fa-clock-o" aria-hidden="true"></i>
						<?= isset($options['theme_atention_text']) ? $options['theme_atention_text'] : ''; ?>
					</li>
					
				</ul> <!-- /.menuContactoFooter -->

				<!-- Espacio --> <br />

				<!-- Desarrollo -->
				<div class="mainFooter__develop">
					<?= '&copy; ' . date('Y') . ' RAYMIPISTASLED Derechos reservados Desing by'; ?>
					<a href="http://www.ingenioart.com/" target="_blank"> INGENIOART</a>
				</div>

			</div> <!-- /.itemFooter -->

		</div> <!-- /.pageWrapperLayout  -->
		
	</footer> <!-- /.#mainFooter -->
	
	</div> <!-- /end sliderbar container -->

	<?php wp_footer(); ?>

	
	<script> var url = "<?= THEMEROOT ?>"; </script>


</body>
</html>
