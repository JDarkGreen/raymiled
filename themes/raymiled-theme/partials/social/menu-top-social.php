<?php  
/**
 *  Archivo Partial que muestra las redes 
 *  sociales en la barra superior header 
**/

/**
  * Todas las funciones se encuentran en functions/custom-functions.php
  */

?>

<ul class="menu-social-link pull-sm-left">
	
	<!-- Si existe facebook -->
	<?php if( has_facebook() ) : ?>
		<li class="facebook">
			<a href="<?= get_facebook(); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
		</li>
	<?php endif; ?>	

	<!-- Si existe twitter -->
	<?php if( has_twitter() ) : ?>
		<li class="twitter">
			<a href="<?= get_twitter(); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
		</li>
	<?php endif; ?>

	<!-- Si existe linkedin -->
	<?php if( has_linkedin() ) : ?>
		<li class="linkedin">
			<a href="<?= get_linkedin(); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
		</li>
	<?php endif; ?>

</ul> <!-- /.menu-social-link -->
                                                                                                                                        </ul>