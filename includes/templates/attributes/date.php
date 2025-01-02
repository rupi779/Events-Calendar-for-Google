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
date_default_timezone_set($event_timezone);
if(isset($start_date) && $start_date != '' )
   {
   	$date_design = $template_function->ECFG_option_group_field('gc-advanced-settings','gc_date_section_style','date_design');
	$date_design = isset($date_design) ? $date_design : 'style_1';
?>
   
	 <div class="tgse_date tgse_date_<?php echo esc_attr($date_design); ?>">
			<div class="tgse_date_day"><?php echo date('d', strtotime($start_date));?></div>
			<div class="tgse_date_month"><?php echo date('M', strtotime($start_date));?></div>
	 </div>
	  
	  <?php } ?>