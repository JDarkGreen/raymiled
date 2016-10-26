<?php  /* Archivo que solo se encargará de cargas los scripts del tema 
	http://www.ey.com/PE/es/Home
*/

function load_custom_scripts()
{

	//cargar tether /
	wp_enqueue_script('tether', THEMEROOT . '/assets/js/vendor/tether.min.js', array('jquery'), '1.1.0', true);

	//cargar bootstrap v
	wp_enqueue_script('bootstrap', THEMEROOT . '/assets/js/vendor/bootstrap.min.js', array('jquery'), '3.3.6', true);	

	//Cargar Owl Carousel
	wp_enqueue_script('wp-owl-carousel-js', THEMEROOT . '/assets/js/vendor/owl.carousel.min.js', array('jquery'), '1.0', true);	

	//cargar sliderevolution
	wp_enqueue_script('revslidertools', THEMEROOT . '/assets/js/vendor/jquery.themepunch.plugins.min.js', array('jquery'), '1.0', true);	

	//cargar sliderevolution
	wp_enqueue_script('revslider', THEMEROOT . '/assets/js/vendor/jquery.themepunch.revolution.min.js', array('jquery'), '4.3.6', true);

	//cargar fancybox
	wp_enqueue_script('wp-fancybox-js', THEMEROOT . '/assets/js/vendor/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true);

	//cargar validador
	wp_enqueue_script('parsley', THEMEROOT . '/assets/js/vendor/parsley.min.js', array('jquery'), '2.3.11', true);
	wp_enqueue_script('p_idioma_es', THEMEROOT . '/assets/js/vendor/i18n/es.js', '' , false , true);

	/**[Cargar SlideBar]**/
	wp_enqueue_script('wp-slidebar-js', THEMEROOT . '/assets/js/vendor/slidebars.min.js', array('jquery'), '2.0.2', true);

	//custom script para videos de youtube
	wp_enqueue_script('custom_lazy_youtube', THEMEROOT . '/assets/js/source/youtube-lazy-load.js', array('jquery'), '1.0' , true );

	//custom script
	wp_enqueue_script('custom_script', THEMEROOT . '/assets/js/source/script.js', array('jquery'), '1.0' , true );

}

add_action('wp_enqueue_scripts', 'load_custom_scripts');



?>