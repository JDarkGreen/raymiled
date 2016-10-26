<?php  


/*-----------------------------------*
** TELEFONOS
*------------------------------------*/
add_settings_section( PREFIX."_themePage_section_phone" , __( 'Personalizar Teléfonos:' , 'LANG' ), 'custom_settings_section_phone_callback', 'customThemePageEmpresa' );

function custom_settings_section_phone_callback()
{ 
	echo __( 'Coloca los números correspondientes', 'LANG' );
}



//TELEFONO
add_settings_field( 'theme_phone_text_1', __( 'Numero Telefono 1', 'LANG' ), 'custom_phone_render', 'customThemePageEmpresa', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_phone_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' id='theme_phone_text_1' class='js-field-ajax' value='<?= !empty($options['theme_phone_text_1']) ? $options['theme_phone_text_1'] : "" ; ?>'>
	<?php
}



//TELEFONO
add_settings_field( 'theme_phone_text_2', __( 'Número Telefono 2', 'LANG' ), 'custom_phone2_render', 'customThemePageEmpresa', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_phone2_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' id='theme_phone_text_2' class='js-field-ajax' value='<?= !empty($options['theme_phone_text_2']) ? $options['theme_phone_text_2'] : "" ; ?>'>
	<?php
}



//CELULAR
add_settings_field( 'theme_cel_text_1', __( 'Numero Celular 1', 'LANG' ), 'custom_cel_render', 'customThemePageEmpresa', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_cel_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' id='theme_cel_text_1' class='js-field-ajax' value='<?= !empty($options['theme_cel_text_1']) ? $options['theme_cel_text_1'] : "" ; ?>'>
	<?php
}



//CELULAR 2
add_settings_field( 'theme_cel_text_2', __( 'Numero Celular 2', 'LANG' ), 'custom_cel2_render', 'customThemePageEmpresa', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_cel2_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' id='theme_cel_text_2' class='js-field-ajax' value='<?= !empty($options['theme_cel_text_2']) ? $options['theme_cel_text_2'] : "" ; ?>'>
	<?php
}


/*-----------------------------*
* SECCION EMAIL 
*-------------------------------*/

add_settings_section( PREFIX."_themePage_section_email" , __( 'Personalizar Email:' , 'LANG' ), 'custom_settings_section_email_callback', 'customThemePageEmpresa' );

function custom_settings_section_email_callback()
{ 
	echo __( 'Coloca email(s) correspondientes', 'LANG' );
}


//EMAIL
add_settings_field( 'theme_email_text', __( 'Email Empresa:', 'LANG' ), 'custom_email_render', 'customThemePageEmpresa', PREFIX."_themePage_section_email" );
//Renderizado 
function custom_email_render() 
{ 
	$options = get_option( 'theme_settings' ); 

	?>
	<input type='text' id='theme_email_text' class='js-field-ajax' value='<?= !empty($options['theme_email_text']) ? $options['theme_email_text'] : "" ; ?>'>
	<?php
}



/*-----------------------------*
* SECCION UBICACIÓN
*------------------------------*/
add_settings_section( PREFIX."_themePage_section_address" , __( 'Personalizar Dirección:' , 'LANG' ), 'custom_settings_section_address_callback', 'customThemePageEmpresa' );

function custom_settings_section_address_callback()
{ 
	echo __( 'Coloca dirección correspondiente', 'LANG' );
}


//DIRECCIÓN
add_settings_field( 'theme_address_text', __( 'Dirección Empresa:', 'LANG' ), 'custom_address_render', 'customThemePageEmpresa', PREFIX."_themePage_section_address" );
//Renderizado 
function custom_address_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>

	<textarea id="theme_address_text" class='js-field-ajax textarea-field' ><?= !empty($options['theme_address_text']) ? $options['theme_address_text'] : "" ; ?></textarea>

	<?php
}



/*----------------------*
* SECCION ATENCIÓN
*------------------------*/
add_settings_section( PREFIX."_themePage_section_atention" , __( 'Personalizar Horario Atención:' , 'LANG' ), 'custom_settings_section_atention_callback', 'customThemePageEmpresa' );

function custom_settings_section_atention_callback()
{ 
	echo __( 'Coloca horario de atención', 'LANG' );
}


//ATENCIÓN
add_settings_field( 'theme_atention_text', __( 'Horario de atención:', 'LANG' ), 'custom_atention_render', 'customThemePageEmpresa', PREFIX."_themePage_section_atention" );
//Renderizado 
function custom_atention_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<textarea id="theme_atention_text" class='js-field-ajax textarea-field'><?= !empty($options['theme_atention_text']) ? $options['theme_atention_text'] : "" ; ?></textarea>
	<?php
}





?>