<?php 

global $post; 
	

/*****************************************************************/
/**- COMUNES **/
/******************************************************************/

/**[ INCLUIR METABOX DE BANNER DE PÁGINA ]**/
include("metabox/common/mb_custom_banner.php");

/**[ INCLUIR METABOX DE GALERÍA ]**/
include("metabox/common/mb_custom_gallery.php");


/******************************************************************/
/**- SLIDER HOME **/
/******************************************************************/

/**[ INCLUIR METABOX DE REVOLUTION EFFECT ]**/
include("metabox/slider-home/mb_revolution_slider.php");


/******************************************************************/
/**- SERVICIOS **/
/******************************************************************/

/**[ INCLUIR METABOX DE MULTIPLES DATOS ]**/
/*include("metabox/services/mb_service_cortes.php");
include("metabox/services/mb_service_color.php");
include("metabox/services/mb_service_care.php");
include("metabox/services/mb_service_lisos.php");
include("metabox/services/mb_service_makeup.php");*/

/******************************************************************/
/**- PRODUCTOS **/
/******************************************************************/

/*Metabox de Precio*/
include('metabox/products/mb_price_product.php' );
/*Metabox de Calificación*/
include('metabox/products/mb_qualify_product.php' );




