<?php  

/**
  * Definiendo las constantes para el tema
  *
  *
***/

/*********************************************************/
/* 	Define Constantes */
/*********************************************************/

define('THEMEROOT', get_stylesheet_directory_uri() );

define('IMAGES', THEMEROOT.'/assets/images');

define('LANG', 'this-theme-framework');

#Extraer todas las opciones de personalización
$options = get_option("theme_settings");

?>