<?php
/**
 * Online Coach Theme Customizer
 *
 * @package Online Coach
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function online_coach_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class online_coach_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	function online_coach_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#ffaf36',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','online-coach'),			
			 'description'	=> __('More color options in PRO Version','online-coach'),	
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	// Slider Section		
	$wp_customize->add_section( 'slider_section', array(
            'title' => __('Slider Settings', 'online-coach'),
            'priority' => null,
            'description'	=> __('Featured Image Size Should be ( 1420x570 ) More slider settings available in PRO Version','online-coach'),		
        )
    );
	
	
	$wp_customize->add_setting('page-setting7',array(
			'sanitize_callback'	=> 'online_coach_sanitize_integer',
			'default' => 0,
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','online-coach'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'sanitize_callback'	=> 'online_coach_sanitize_integer',
			'default' => 0,
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','online-coach'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'sanitize_callback'	=> 'online_coach_sanitize_integer',
			'default' => 0,
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','online-coach'),
			'section'	=> 'slider_section'
	));	
	
	//Slider hide
	$wp_customize->add_setting('hide_slides',array(
			'sanitize_callback' => 'online_coach_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_slides', array(
    	    'section'   => 'slider_section',    	 
		    'label'     => __('Check This Option To Hide Slider','online-coach'),
    	    'type'      => 'checkbox'
     )); // Slider Section	
 
	
	
	// Home Welcome Section 	
	$wp_customize->add_section('section_first',array(
		'title'	=> __('Homepage Welcome Section','online-coach'),
		'description'	=> __('Select Page from the dropdown for first section','online-coach'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('page-setting1',	array(
			'sanitize_callback' => 'online_coach_sanitize_integer',
			'default' => 0,
		));
 
	$wp_customize->add_control(	'page-setting1',array('type' => 'dropdown-pages',			
			'section' => 'section_first',
	));
	
	//Hide Welcome Section
	$wp_customize->add_setting('hide_welcomesection',array(
			'sanitize_callback' => 'online_coach_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_welcomesection', array(
    	   'section'   => 'section_first',    	 
		    'label'     => __('Check This Option To Hide Welcome Section','online-coach'),
    	   'type'      => 'checkbox'
     )); // Welcome Section	
	
	// Home Three Boxes Section 	
	$wp_customize->add_section('section_second', array(
		'title'	=> __('Homepage Four Boxes Section','online-coach'),
		'description'	=> __('Select Pages from the dropdown for homepage four boxes section','online-coach'),
		'priority'	=> null
	));	
	
	
	$wp_customize->add_setting('page-column1',	array(
			'sanitize_callback' => 'online_coach_sanitize_integer',
			'default' => 0,
		));
 
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',			
			'section' => 'section_second',
	));	
	
	
	$wp_customize->add_setting('page-column2',	array(
			'sanitize_callback' => 'online_coach_sanitize_integer',
			'default' => 0,
		));
 
	$wp_customize->add_control(	'page-column2',array('type' => 'dropdown-pages',			
			'section' => 'section_second',
	));
	
	$wp_customize->add_setting('page-column3',	array(
			'sanitize_callback' => 'online_coach_sanitize_integer',
			'default' => 0,
		));
 
	$wp_customize->add_control(	'page-column3',array('type' => 'dropdown-pages',		
			'section' => 'section_second',
	));
	
	$wp_customize->add_setting('page-column4',	array(
			'sanitize_callback' => 'online_coach_sanitize_integer',
			'default' => 0,
		));
 
	$wp_customize->add_control(	'page-column4',array('type' => 'dropdown-pages',		
			'section' => 'section_second',
	));	//end three column part
	
	//Hide Page Boxes Column Section
	$wp_customize->add_setting('hide_pagefourboxes',array(
			'sanitize_callback' => 'online_coach_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_pagefourboxes', array(
    	   'section'   => 'section_second',    	 
		   'label'     => __('Check This Option To Hide Four Boxes','online-coach'),
    	   'type'      => 'checkbox'
     )); // Hide Page Boxes Column Section
	
	
	
	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Social Settings','online-coach'),				
			'description'	=> __('More social icon available in PRO Version','online-coach'),		
			'priority'		=> null
	));
	
	
	$wp_customize->add_setting('fb_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','online-coach'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','online-coach'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('insta_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('insta_link',array(
			'label'	=> __('Add instagram link here','online-coach'),
			'section'	=> 'social_sec',
			'setting'	=> 'insta_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','online-coach'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	$wp_customize->add_section('footer_area',array(
			'title'	=> __('Footer Area','online-coach'),
			'priority'	=> null,		
	));
		
	$wp_customize->add_setting('about_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('about_title',array(
			'label'	=> __('Add title for about us','online-coach'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_title'
	));	
		
	$wp_customize->add_setting( 'about_description', array(
			'default'	=> null,				
			'sanitize_callback' => 'online_coach_sanitize_html',
	) );

	$wp_customize->add_control( 'about_description', array(
			'type' => 'textarea',
			'label' => __( 'About Description', 'online-coach' ),   
			'section' => 'footer_area',   
			'setting'	=> 'about_description',
	) );
	
	$wp_customize->add_setting('menu_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('menu_title',array(
			'label'	=> __('Add title for menu','online-coach'),
			'section'	=> 'footer_area',
			'setting'	=> 'menu_title'
	));	
	
	$wp_customize->add_setting('newsfeed_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('newsfeed_title',array(
			'label'	=> __('Add title for latest news feed','online-coach'),
			'section'	=> 'footer_area',
			'setting'	=> 'newsfeed_title'
	));	
	
	$wp_customize->add_setting('contact_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('contact_title',array(
			'label'	=> __('Add title for footer contact info','online-coach'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_title'
	));
	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> null,
			'sanitize_callback'	=> 'online_coach_sanitize_html',
	));
	
	$wp_customize->add_control(	'contact_add', array(
				'type' => 'textarea',
				'label'	=> __('Add contact address here','online-coach'),
				'section'	=> 'footer_area',
				'setting'	=> 'contact_add'
	));
	$wp_customize->add_setting('contact_no',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> __('Add contact number here.','online-coach'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_no'
	));
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> __('Add you email here','online-coach'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_mail'
	)); 
	
	//footer hide
	$wp_customize->add_setting('hide_footer',array(
			'default' => true,
			'sanitize_callback' => 'online_coach_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_footer', array(
    	    'section'   => 'footer_area',    	 
		    'label'     => __('Check This Option To Hide Footer Area','online-coach'),
    	    'type'      => 'checkbox'
     )); // footer Section	
   
}
add_action( 'customize_register', 'online_coach_customize_register' );

function online_coach_sanitize_html( $html ) {
	return wp_filter_post_kses( $html );
}

//Integer
function online_coach_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function online_coach_custom_css(){
		?>
        	<style type="text/css"> 
					
					a, .blog_lists h2 a:hover,
					#sidebar ul li a:hover,
					.fourbox:hover h3,
					.cols-4 ul li a:hover, .cols-4 ul li.current_page_item a,					
					.phone-no strong,					
					.left a:hover,
					.blog_lists h4 a:hover,
					.recent-post h6 a:hover
					{ color:<?php echo esc_attr(get_theme_mod('color_scheme','#ffaf36')); ?>;}
					 
					
					.pagination .nav-links span.current, .pagination .nav-links a:hover,
					#commentform input#submit:hover,
					.slide_info .slide_more,							
					.nivo-controlNav a.active,				
					h3.widget-title,				
					.wpcf7 input[type='submit'],					
					.social-icons a:hover,
					a.ReadMore:hover,
					input.search-submit
					{ background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#ffaf36')); ?> !important;}
					
						
					.testclass
					{ border-color:<?php echo esc_attr(get_theme_mod('color_scheme','#ffaf36')); ?>;}
					
			</style> 
<?php 
}
         
add_action('wp_head','online_coach_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function online_coach_customize_preview_js() {
	wp_enqueue_script( 'online_coach_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'online_coach_customize_preview_js' );