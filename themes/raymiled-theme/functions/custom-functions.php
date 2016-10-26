<?php  

/***
*---------------------------------------
* FUNCIONES PERSONALIZADAS 
*---------------------------------------
***/

$options = get_option("theme_settings");

/**
* Definir si el mapa existe o no
*
**/

function exist_map()
{
	global $options;

	if( isset($options['theme_lat_coord']) && !empty($options['theme_lat_coord']) && isset($options['theme_long_coord']) && !empty($options['theme_long_coord']) ) :

	return true;
	
	else: return false; endif;
}


/**
* ---------------------------------------------------------------
* -- REDES SOCIALES
* ---------------------------------------------------------------
**/

include( 'custom-functions/functions-social-links.php' );

/**
* ---------------------------------------------------------------
* -- BANNER DE PÁGINA
* ---------------------------------------------------------------
**/

include( 'custom-functions/functions-banner-page.php' );


/**
* ---------------------------------------------------------------
* -- CONSEGUIR GALERIA DEL POST SI EXISTE METABOX DE GALERIA
* ---------------------------------------------------------------
**/

include( 'custom-functions/functions-gallery-post.php' );


/**
* ---------------------------------------------------------------
* -- EXTRAER EL ID DE VIDEO DE YOUTUBE
* ---------------------------------------------------------------
**/

if( stream_resolve_include_path('custom-functions/functions-get-id-youtube.php') ):
	include( 'custom-functions/functions-get-id-youtube.php' );
endif;
