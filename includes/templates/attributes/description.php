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
$show_desc  = $template_function->ECFG_option_field('gc-event-attributes','gc-event-attribute-description');

	if(isset($event_content) && $event_content != '' && $show_desc == 'on' || $show_desc == '' )
			{
			
			echo '<div class="tgse_description">
						<span>'.wp_trim_words( $event_content, 15, '...' ).'</span>
					</div>';
			}
		
	?>	