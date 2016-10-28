<?php  
/**
  * ARCHIVO PARTIAL QUE MUESTRA EL BANNER HACIA EL CONTACTO
***/

$page_contacto      = get_page_by_title('Contacto');

$page_contacto_link = !empty($page_contacto) ? get_permalink( $page_contacto->ID ) : '#';

?>

<section id="sectionBannerContacto" class="containerRelative">

	<div class="content-text m-x-auto containerFlex containerAlignContent text-xs-center">

		<!-- Titulo -->
		<h2 class=""> <?= __("Alquiler de Pistas Leds" , LANG ); ?></h2>
		<!-- Boton -->
		<a href="<?= $page_contacto_link; ?>" class="btn-show-more text-uppercase"> Contáctenos </a>

	</div> <!-- /.content-text -->

</section> <!-- /.sectionBannerContacto -->