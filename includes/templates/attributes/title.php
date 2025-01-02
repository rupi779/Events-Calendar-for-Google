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
$title_tag = $template_function->ECFG_option_group_field('gc-advanced-settings','gc_event_desc_style','title_tag');
$title_tag = isset($title_tag )?$title_tag : 'h4';
$show_title =  $template_function->ECFG_option_field('gc-event-attributes','gc-event-attribute-title');

?>
<?php 
   if(isset($event_title) && $event_title != '' && $show_title == 'on' || $show_title == '')
   {
	   
	echo '<div class="tgse_title"><'.esc_attr($title_tag).'>'. esc_attr($event_title) .'</'.esc_attr($title_tag).'></div>';
	
   }
   ?>