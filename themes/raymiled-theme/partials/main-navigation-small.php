<?php  
/**
 *  Archivo Partial que muestra 
 *  el menu de navegacion principal en mobile
**/

/**
  * Todas las funciones se encuentran en functions/custom-functions.php
  */

?>

<nav id="mainNavigation" class="mainNavigation">
	
	<!-- Logo -->
	<h1 id="mainLogo">
		<a href="<?= site_url(); ?>">
			<img src="<?= $logo_theme_url; ?>" alt="<?php bloginfo('description'); ?>" class="img-fluid d-block m-x-auto" />
		</a>
	</h1> <!-- /.mainLogo -->
	
	<?php 
		wp_nav_menu(
			array(
			'menu_class'     => 'left-menu',
			'theme_location' => 'left-menu'
		));

		wp_nav_menu(
			array(
			'menu_class'     => 'right-menu',
			'theme_location' => 'right-menu'
		));
	?>
	
</nav> <!-- /.mainNavigation -->