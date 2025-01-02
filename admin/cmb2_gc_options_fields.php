<?php
$default_timezone = date_default_timezone_get();
$website_timezone = wp_timezone_string();
$gc_options = new_cmb2_box( array(
			'id'           => 'gc-general-settings',
			'title'        => 'GC Events',
			'object_types' => array( 'options-page' ),
			'option_key'      => 'gc-general-settings', // The option key and admin menu page slug.
			'icon_url'        => 'dashicons-calendar-alt',
			'capability'      => 'edit_posts', 
		    'save_button'     => 'Save General Settings',
		) );
		
		$gc_options->add_field(array(
			'name' => 'Google Api Key',
			'desc' => "<strong>Create and Add Google Api to connect your calender .<a href='https://console.cloud.google.com/apis/credentials'>Get Your Api Credentials Here</a></strong>",
			'id'   => 'gc_events_api_key',
			'type' => 'text',
			'attributes' => array(
				'required' => 'required',
			),
		) );
		$gc_options->add_field(array(
			'name' => 'Google Calender ID',
			'desc' => '<strong>Enter ID of particular calender which events you want to list .<a href="https://calendar.google.com/calendar">Get your Calender ID</a></strong>',
			'id'   => 'gc_calender_id',
			'type' => 'text',
			'attributes' => array(
				'required' => 'required',
			),
		) );
		$gc_options->add_field(array(
			'name' => 'Select Events Layouts',
			'desc' => 'Select style to list your events at frontend',
			'id'   => 'gc_calender_layout',
			  'type'             => 'select',
				'default'          => 'grid',
				'options'          => array(
					'grid' => __( 'Grid', 'cmb2' ),
					'list'   => __( 'List', 'cmb2' ),
					'google_calender'     => __( 'Google Calender', 'cmb2' ),
				),
				'attributes' => array(
				'required' => 'required',
			    ),
		) );
		
		$gc_options->add_field( array(
			'name' => 'Use Below Shortcode On any Page/Post',
			'desc' => '<h3>[ECFG_calender_events]</h3><hr> ',
			'type' => 'title',
			'id'   => 'gc_shortcode'
		) );
			
		/*
		* Setting panel for events attributes to show
		*/
		
		$gc_options = new_cmb2_box( array(
			'id'           => 'gc-event-attributes',
			'title'        => 'Event Attributes',
			'object_types' => array( 'options-page' ),
			'option_key'      => 'gc-event-attributes', 
			'parent_slug'     => 'admin.php?page=gc-general-settings',
			'capability'      => 'edit_posts', 
			'save_button'     => 'Save Event Attributes',
		) );
		
			
		$gc_options->add_field( array( 
		'name'        => 'Event Title',
	    'id'	  => 'gc-event-attribute-title',
	    'type'    => 'radio_inline',
		'options' => array(
				'on' => __( 'Show', 'cmb2' ),
				'off'   => __( 'Hide', 'cmb2' ),
			),
         'default' => 'on',
         ) );
		 
		$gc_options->add_field( array( 
		'name'        => 'Event Desription',
	    'id'	  => 'gc-event-attribute-description',
	     'type'    => 'radio_inline',
		'options' => array(
				'on' => __( 'Show', 'cmb2' ),
				'off'   => __( 'Hide', 'cmb2' ),
			),
         'default' => 'on',
         ) );
		 
		$gc_options->add_field( array( 
		'name'        => 'Event Location',
	    'id'	  => 'gc-event-attribute-location',
	     'type'    => 'radio_inline',
		'options' => array(
				'on' => __( 'Show', 'cmb2' ),
				'off'   => __( 'Hide', 'cmb2' ),
			),
         'default' => 'on',
         ) );  
        
		$gc_options->add_field( array( 
		'name'        => 'Event Timezone',
	    'id'	  => 'gc-event-attribute-timezome',
	     'type'    => 'radio_inline',
		'options' => array(
				'on' => __( 'Show', 'cmb2' ),
				'off'   => __( 'Hide', 'cmb2' ),
			),
         'default' => 'on',
         ) );  
        
		
        $gc_options->add_field( array( 
		'name'        => 'Read More Link',
	    'id'	  => 'gc-event-attribute-readmore',
	     'type'    => 'radio_inline',
		'options' => array(
				'on' => __( 'Show', 'cmb2' ),
				'off'   => __( 'Hide', 'cmb2' ),
			),
         'default' => 'on',
         ) ); 		
		
		 
		
		
		/*
		* Setting panel for events Global color settings to show
		*/
		
		$gc_options = new_cmb2_box( array(
			'id'           => 'gc-advanced-settings',
			'title'        => 'Advanced Settings ',
			'object_types' => array( 'options-page' ),
			'option_key'      => 'gc-advanced-settings', 
			'parent_slug'     => 'admin.php?page=gc-general-settings',
			'capability'      => 'edit_posts', 
			'save_button'     => 'Save Advance Settings',
		) );
		
		/*New date section group formation*/
		$date_section = $gc_options->add_field( array(
			'id'          => 'gc_date_section_style',
			'type'        => 'group',
			'repeatable'  => false,
			'options'     => array(
				'group_title'       => 'Events Date Section', 
				 'closed'         => true, // true to have the groups closed by default
				// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
			),
		) );
		
		$gc_options->add_group_field( $date_section, array(
			'name'             => 'Select Date Section style',
			'desc'             => 'This section will change the look of date section. Choose your best option',
			'id'               => 'date_design',
			'type'             => 'select',
			'default'          => 'style_1',
			'options'          => array(
				'style_1' => 'Style 1',
				'style_2'   =>'Style 2',
			),
		) ); 
		$gc_options->add_group_field( $date_section, array(
			'name'    => 'Background Color',
			'desc'    => 'Change the Background Color of Date Section ',
			'id'      => 'date-bc-color',
			'type'    => 'colorpicker',
			'default' => '#08267c',
		) );
		$gc_options->add_group_field( $date_section, array(
			'name'    => 'Text Color',
			'desc'    => 'This will change color of "date section text".',
			'id'      => 'date-text-color',
			'type'    => 'colorpicker',
			'default' => '#ffffff',
		) );
		
						
		
		/*New event description group formation*/
		$event_desc_style = $gc_options->add_field( array(
			'id'          => 'gc_event_desc_style',
			'type'        => 'group',
			'repeatable'  => false,
			'options'     => array(
				'group_title'       => 'Events Details/Description Section',
				 'closed'         => true, // true to have the groups closed by default
				// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
			),
		) );
	
		$gc_options->add_group_field( $event_desc_style, array(
			'name'             => 'Event Title Tag',
			'desc'             => 'Select your prefered title tag for design and Seo Puposes',
			'id'               => 'title_tag',
			'type'             => 'select',
			'default'          => 'h4',
			'options'          => array(
				'h1' => 'H1',
				'h2'   =>'H2',
				'h3'   => 'H3',
				'h4'   => 'H4',
			),
		) ); 
		$gc_options->add_group_field( $event_desc_style, array(
			'name'    => 'Background Color',
			'desc'    => 'Change the Background Color of Description Section ',
			'id'      => 'desc-bc-color',
			'type'    => 'colorpicker',
			'default' => '#ffffff',
		) );
		$gc_options->add_group_field( $event_desc_style, array(
			'name'    => 'Title Color',
			'desc'    => 'This will change color of description section Title',
			'id'      => 'title_color',
			'type'    => 'colorpicker',
			'default' => '#08267c',
		) );
		$gc_options->add_group_field( $event_desc_style, array(
			'name'    => 'Icon Color',
			'desc'    => 'This will change color of icons in Description section',
			'id'      => 'icon_color',
			'type'    => 'colorpicker',
			'default' => '#08267c',
		) );
	
		
		/*New Button style group formation*/
		
		$button_style = $gc_options->add_field( array(
			'id'          => 'gc_button_style',
			'type'        => 'group',
			'repeatable'  => false,
			'options'     => array(
				'group_title'       => 'Buttons Style / Calendar View style',
				 'closed'         => true, // true to have the groups closed by default
				// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
			),
		) );
		$gc_options->add_group_field( $button_style, array(
			'desc'    => 'This section changes color for all buttons on your selected layout. But If your selected layout is "Google calendar" this section will apply colors to event title, calendar header and buttons',
			'id'      => 'button_title',
			'type'    => 'title',
			
		) );
		
		/*Button style here*/			
		$gc_options->add_group_field( $button_style, array(
			'name'    => 'Button Color',
			'desc'    => 'Change the background of button.',
			'id'      => 'button_bc',
			'type'    => 'colorpicker',
			'default' => '#08267c',
		) );
		
		$gc_options->add_group_field( $button_style, array(
			'name'    => 'Button Text Color',
			'desc'    => 'Change the color of button text',
			'id'      => 'button_text',
			'type'    => 'colorpicker',
			'default' => '#ffffff',
		) );
		
		/*Button hover style here*/		
		$gc_options->add_group_field( $button_style, array(
			'name'    => 'Button Hover Color',
			'desc'    => 'Change the background of button on hover',
			'id'      => 'button_bc_hover',
			'type'    => 'colorpicker',
			'default' => '#08267c',
		) );
		
		$gc_options->add_group_field( $button_style, array(
			'name'    => 'Button Hover Text Color',
			'desc'    => 'Change the color of button text on hover',
			'id'      => 'button_text_hover',
			'type'    => 'colorpicker',
			'default' => '#ffffff',
		) );
		
		/**pagination section for events**/
		$pagination_options = $gc_options->add_field( array(
			'id'          => 'gc_pagination',
			'type'        => 'group',
			'repeatable'  => false,
			'options'     => array(
				'group_title'       => 'Pagiantion/Load More ', 
				 'closed'         => true, // true to have the groups closed by default
				
			),
		) );
		$gc_options->add_group_field( $pagination_options, array(
			'name' => 'Events Per Page',
			'desc' => 'Select how many events to load for pagination. Set 0 to list all events',
			'id'   => 'gc_event_per_page',
			'type'             => 'text',
			'attributes' => array(
				'type' => 'number',
				'pattern' => '\d*',
			),
			'sanitization_cb' => 'absint',
				'escape_cb'       => 'absint',
		) );

		/**Timezone setting for Events**/
		$timezone_options = $gc_options->add_field( array(
			'id'          => 'gc_event_timezone',
			'type'        => 'group',
			'repeatable'  => false,
			'options'     => array(
				'group_title'       => 'Event Timezone Settings  ', 
				 'closed'         => true, // true to have the groups closed by default
				
			),
		) );

		$gc_options->add_group_field( $timezone_options, array(
			'name'    => 'Timezone Preference',
			'desc'    => 'Select which is prefered timezone setting for listing events.
			              Your Website Timezone Is : '.$website_timezone.'</br>',
			'id'      => 'gc_timezone_preference',
			'type'    => 'radio',
			'select_all_button' => false,
			'default' => 'website',
			'options' => array(
				'custom' => 'Select a custom Timezone',
				'default_cal'=>'Same As Events Intialization.',

			),
		) );

		$gc_options->add_group_field( $timezone_options, array(
			'name' => 'Select a Custom Timezone',
			'desc' => 'You can select a custom time region for listing your events and calendar',
			'id'   => 'gc_custom_timezone', 
			'type' => 'select_timezone',
		) );


		
		/*
		* Setting panel for Pro version Fetures
		*/
		
		$gc_options = new_cmb2_box( array(
			'id'           => 'gc-pro-features',
			'title'        => 'Go Pro  ',
			'object_types' => array( 'options-page' ),
			'option_key'      => 'gc-pro-features', 
			'parent_slug'     => 'admin.php?page=gc-general-settings',
			'capability'      => 'edit_posts', 
			'save_button'     => 'save',
		) );
		$search =  plugin_dir_url( dirname( __FILE__ ) ) . 'admin/pro-advance-search.png';
		$image =  plugin_dir_url( dirname( __FILE__ ) ) . 'admin/pro-features.png';
		$html = '<div class ="gc_pro_banner">
		        <div class="gc_pro_link"><a target="_blank" href="https://blueplugins.com/events-calendar-for-google-pro/" class="try_pro">Try Pro Version</a></div>
		         <img class="p_details" src="'.$search.'">
				<img class="p_details" src="'.$image.'">
				  <div class="gc_pro_link"><a target="_blank" href="https://blueplugins.com/events-calendar-for-google-pro/" class="try_pro">Try Pro Version</a></div>
				</div>';
		
		$gc_options->add_field( array(
			'desc' => $html,
			'type' => 'title',
			'id'   => 'gc_pro_link',
		) );

    //Add more field as custom meta

	