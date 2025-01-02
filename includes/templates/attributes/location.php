<?php
/**
 * List Design 1
 * 
 * @package Blog Designer Pack
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$show_location = $template_function->ECFG_option_field('gc-event-attributes','gc-event-attribute-location');
?>
<?php 
       
		if((isset($event_location) && $event_location != '') && ($show_location == 'on' || $show_location == '') )
		{
			$gmap_link =  'https://maps.google.com/maps?q='.$event_location;
			?>
		<div class="tgse_location">
		<span class="tgse_location_icon tgse_icon"><li class="fa fa-map-marker-alt"></li></span>
		<span class="tgse_location_adress"><?php echo wp_kses_post($event_location);?></span>
		<a href="<?php echo $gmap_link;?>"> <?php echo esc_html__('View on Map','ecfg-events'); ?> </a>
			
		</div>
		<?php 
        } 
		
?>	