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
$show_readmore  = $template_function->ECFG_option_field('gc-event-attributes','gc-event-attribute-readmore');
?>
<?php 
		if($show_readmore == 'on' || $show_readmore == '')
		{
		?>
		<div class="tgse_readmore">
		<a class="tgse_readmore_link" href="<?php echo esc_url($event_link);?>" target="_blank"><?php echo  esc_html__('Read More','ecfg-events'); ?></a>
		</div>
		<?php
		}
?>