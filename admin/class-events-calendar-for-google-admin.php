<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://blueplugins.com/
 * @since      1.0.0
 *
 * @package    ECFG_Events_Calendar_for_Google
 * @subpackage ECFG_Events_Calendar_for_Google/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and hook function
 *
 * @package    ECFG_Events_Calendar_for_Google
 * @subpackage ECFG_Events_Calendar_for_Google/admin
 * @author     Blue Plugins <rupinder.php@gmail.com>
 */
 
class ECFG_events_calendar_google_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function ECFG_admin_enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/events-calendar-for-google-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function ECFG_admin_enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/events-calendar-for-google-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public  function ECFG_admin_general_settings() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/cmb2_gc_options_fields.php';
	}
	

	public function ECFG_option_page_menu() {
	  // check user capabilities
	  if ( ! current_user_can( 'manage_options' ) ) {
		return;
	  }

	  //Get the active tab from the $_GET param
	  if(isset( $_GET['page'] ) &&  $_GET['page'] != '' )
	  {
			$page = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['page']); 
			if( $page == 'gc-general-settings' || $page == 'gc-event-attributes' || $page == 'gc-advanced-settings' || $page == 'gc-pro-features')
			{
				?>
				<!-- Our admin page content should all be inside .wrap -->
				
				<div class="wrap gc_option_page_menu">
				<!-- Here are our tabs -->
				<nav class="nav-tab-wrapper">
					<a href="?page=gc-general-settings" class="nav-tab <?php if($page==='gc-general-settings'):?>nav-tab-active<?php endif; ?>">General Settings</a>
					<a href="?page=gc-event-attributes" class="nav-tab <?php if($page==='gc-event-attributes'):?>nav-tab-active<?php endif; ?>">Event Attributes</a>
					<a href="?page=gc-advanced-settings" class="nav-tab <?php if($page==='gc-advanced-settings'):?>nav-tab-active<?php endif; ?>">Advanced Settings</a>
					<a href="?page=gc-pro-features" class="nav-tab <?php if($page==='gc-pro-features'):?>nav-tab-active<?php endif; ?>">Pro Features</a>
				</nav>
				</div>
				<?php
			}/*If statement closes here*/
	  }
	  
	 
	}
	
	public function ECFG_admin_settings_link($links) {
	    $mylink = array();
		$mylink[] = '<a style="font-weight: 700; color:#b76613;" target="_blank" href="https://blueplugins.com/events-calendar-for-google-pro/">Go Pro</a>';
		$mylink[] = '<a href="' . admin_url( 'admin.php?page=gc-general-settings' ) . '">Settings</a>';
		return array_merge( $mylink, $links );
	}
	
	/*Admin notice actions*/
	public function ECFG_notice_actions(){

		$ecfg_reviewed = isset($_GET['ecfg_reviewed']) ? sanitize_text_field( wp_unslash($_GET['ecfg_reviewed'])) : false;
		if($ecfg_reviewed){
			update_user_meta( get_current_user_id(), 'ecfg_reviewed', true );
		}
	}
	/*List Error Notices for Plugin updation*/
	public function ECFG_plugin_notice()
	{
		/*Rating system here*/
	    $ecfg_reviewed = get_user_meta( get_current_user_id(), 'ecfg_reviewed', true );
		$ecfg_activated_on = get_user_meta( get_current_user_id(), 'ecfg_activated_on', true );
		$now =  time();
		
        if($now < $ecfg_activated_on)
        {
			return;
		} 			
		if($ecfg_reviewed){
			return;
		}
		$this->ECFG_plugin_review_bar();
		
	}
	
	private function ECFG_plugin_review_bar()
	{
	$reviewed_url= add_query_arg(array('ecfg_reviewed' => true));
	 ?>
	 <div class="notice notice-info ecfg-admin-notice is-dismissible ecfg-review-wrapper">
			
			<div class="ecfg-review-content">
				<h3>Events Calendar for Google</h3>
				<p><?php echo esc_html('We are Glad to have you on board. Share your Experience about free version of the Events Calendar for Google plugin. Leave a review to help  wordpress community and help us serve you better.'); ?></p>
				<div class="buttons-row">
			        <a class="ecfg-notice-action ecfg-yes" onclick="window.open('https://wordpress.org/support/plugin/events-calendar-for-google/reviews/?rate=5#new-post', '_blank')">
			        	<?php echo esc_html("Leave a Review"); ?>
			        </a>

			        <a class="ecfg-notice-action ecfg-done" href="<?php echo esc_url($reviewed_url); ?>">
			        	<?php echo  esc_html('Never'); ?>
			        </a>

			     
				</div>
			</div>
		
	    </div>
    <?php 	 
	
	}
	
	

}
