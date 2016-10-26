<?php  
/**
** Metabox que agregar un campo personalizado para todos 
** los servicios en el cual setea la multiple data
**/

/*|-------------------------------------------------------------------------|*/
/*|----------------- METABOX DE CUIDADOS --------------------|*/
/*|-------------------------------------------------------------------------|*/

add_action( 'add_meta_boxes', 'cd_mb_service_data_care' );

//llamar funcion 
function cd_mb_service_data_care()
{   
    $array_custom_types = array('theme-services');

    //Solo en productos
    add_meta_box( 'mb-services-care', 'Multiples Datos: Cuidados', 'cd_mb_services_data_care_cb', $array_custom_types , 'normal', 'high' );
}

//customizar box
function cd_mb_services_data_care_cb( $post )
{
    // $post is already set, and contains an object: the WordPress post
    global $post;

    $values = get_post_custom( $post->ID );

    $current_care = isset( $values['mbservicecare'] ) ? $values['mbservicecare'][0] : '';

    #var_dump($current_data);

    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

    //seteando editores
    $settings_editor = array(
        'editor_height' => 250,
    );

    ?>
        <label for="mbservicecare"> Escribe Texto </label>
        <?php 
            $text_care = isset($current_care) ? $current_care : '';

            wp_editor( $text_care , 'mbservicecare' , $settings_editor ); 
        ?> 

    <?php    
}


//guardar la data
add_action( 'save_post', 'cd_mb_service_data_care_save' );

function cd_mb_service_data_care_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['mbservicecare'] ) )
        update_post_meta( $post_id, 'mbservicecare', $_POST['mbservicecare'] );
}



