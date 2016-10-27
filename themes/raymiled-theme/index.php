<?php
	/*
	 * Obtener Header
	 */
	get_header(); 

	/*
	 * Extraer opciones del tema
	 */
	$options = get_option("theme_settings");

	/*
	 * Importar partial de slider
	 */
	include( locate_template('partials/slider-home/slider-home-revolution.php') );

	/*
	 * Importar Section Partial de Servicios
	 */
	if( stream_resolve_include_path('partials/home/section-services.php') ):
		include( locate_template('partials/home/section-services.php') );
	endif;

	/*
	 * Importar partial de contacto
	 */
	include( locate_template('partials/section-contact-banner.php') );

	/*
	 * Importar Section Partial de Videos
	 */
	if( stream_resolve_include_path('partials/home/section-videos.php') ):
		include( locate_template('partials/home/section-videos.php') );
	endif;
?>

<!-- Contenedor Común de Sección -->
<section class="containerCommonSection">
	
	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout containerRelative">
		
		<!-- Título -->
		<h2 class="titleCommon__section text-uppercase text-xs-center"> 
		<span> Nosotros </span> </h2>

	</div> <!-- /.pageWrapperLayout containerRelative -->

	<?php

	/*
	 * Importar Sección de Página Nosotros
	 */

	include( locate_template('partials/nosotros/section-nosotros.php') );
	?>

</section> <!-- /.containerCommonSection -->


<?php
/*
 * Importar partial de miscelaneo
 */
include( locate_template('partials/home/section-miscelaneo.php') );
?>

<!-- Footer -->
<?php get_footer(); ?>
