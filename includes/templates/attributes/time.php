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
?>

<?php 

if($alldayevent == 'yes')
{
	$event_start = $start_date;
	?>
		
	<div class="tgse_date_all_day">
	<span class="tgse_time_icon tgse_icon"> <i class="fas fa-calendar-alt"></i></span>
	<span class="tgse_timerange"><?php echo date('Y-m-d', strtotime($event_start));?></span>
	</div>
	<div class="tgse_all_day_check">
	<span class="tgse_allday_icon tgse_icon"> <i class="fa fa-check-circle" aria-hidden="true"></i></span>
	<span class="tgse_all_day"><?php echo  esc_html__('All Day Event','ecfg-events'); ?></span>
	</div>
	<?php
}
else
{
	date_default_timezone_set($event_timezone);	/*Setting the timezone*/ 			
	$event_start_date = date('Y-m-d', strtotime($start_date));
	$event_start_time = date('h:i a', strtotime($start_date));
						
	
	$event_end_date = date('Y-m-d', strtotime($end_date));
	$event_end_time = date('h:i a', strtotime($end_date));
	$show_timezone  = $template_function->ECFG_option_field('gc-event-attributes','gc-event-attribute-timezome');
	if($event_start_date == $event_end_date)
	{
		$newdate = $event_start_date;
	}
	else
	{
		$newdate = $event_start_date.' - '.$event_end_date;
	}
	
	?>
	<div class="tgse_date_time">
	<span class="tgse_time_icon tgse_icon"> <i class="fas fa-calendar-alt"></i></span>
	<span class="tgse_timerange"><?php echo esc_attr($newdate);?></span>
	</div>

	<div class="tgse_time">
	<span class="tgse_time_icon tgse_icon"><i class="fas fa-clock"></i></span>
	<span class="tgse_timerange"><?php echo esc_attr($event_start_time).' - '.esc_attr($event_end_time) ;?></span>
	</div>
	<?php 
	if($show_timezone == 'on' || $show_timezone == '')
		{
	?>
	<div class="tgse_timezone">
	<span class="tgse_globe_icon tgse_icon"><i class="fas fa-globe"></i></span>
	<span class="tgse_timezone"><?php echo $event_timezone ;?></span>
	</div>
	
	<?php
		}/*timezone condition closes*/
	
}


   
 
?>	