<?php
/**
 * VW Book Store Theme Customizer
 *
 * @package VW Book Store
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_book_store_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_book_store_custom_controls' );

function vw_book_store_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_book_store_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-book-store' ),
	    'description' => __( 'Description of what this panel does.', 'vw-book-store' ),
	) );

	$wp_customize->add_section( 'vw_book_store_left_right', array(
    	'title'      => __( 'General Settings', 'vw-book-store' ),
		'priority'   => 30,
		'panel' => 'vw_book_store_panel_id'
	) );

	$wp_customize->add_setting('vw_book_store_width_option',array(
        'default' => __('Full Width','vw-book-store'),
        'sanitize_callback' => 'vw_book_store_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Book_Store_Image_Radio_Control($wp_customize, 'vw_book_store_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-book-store'),
        'description' => __('Here you can change the width layout of Website.','vw-book-store'),
        'section' => 'vw_book_store_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_book_store_theme_options',array(
        'default' => __('Right Sidebar','vw-book-store'),
        'sanitize_callback' => 'vw_book_store_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_book_store_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-book-store'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-book-store'),
        'section' => 'vw_book_store_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-book-store'),
            'Right Sidebar' => __('Right Sidebar','vw-book-store'),
            'One Column' => __('One Column','vw-book-store'),
            'Three Columns' => __('Three Columns','vw-book-store'),
            'Four Columns' => __('Four Columns','vw-book-store'),
            'Grid Layout' => __('Grid Layout','vw-book-store')
        ),
	));

	$wp_customize->add_setting('vw_book_store_page_layout',array(
        'default' => __('One Column','vw-book-store'),
        'sanitize_callback' => 'vw_book_store_sanitize_choices'
	));
	$wp_customize->add_control('vw_book_store_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-book-store'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-book-store'),
        'section' => 'vw_book_store_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-book-store'),
            'Right Sidebar' => __('Right Sidebar','vw-book-store'),
            'One Column' => __('One Column','vw-book-store')
        ),
	) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_book_store_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_book_store_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Book_Store_Toggle_Switch_Custom_Control( $wp_customize, 'vw_book_store_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-book-store' ),
		'section' => 'vw_book_store_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_book_store_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_book_store_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Book_Store_Toggle_Switch_Custom_Control( $wp_customize, 'vw_book_store_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-book-store' ),
		'section' => 'vw_book_store_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_book_store_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_book_store_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Book_Store_Toggle_Switch_Custom_Control( $wp_customize, 'vw_book_store_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-book-store' ),
        'section' => 'vw_book_store_left_right'
    )));

    $wp_customize->add_setting('vw_book_store_loader_icon',array(
        'default' => __('Two Way','vw-book-store'),
        'sanitize_callback' => 'vw_book_store_sanitize_choices'
	));
	$wp_customize->add_control('vw_book_store_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-book-store'),
        'section' => 'vw_book_store_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-book-store'),
            'Dots' => __('Dots','vw-book-store'),
            'Rotate' => __('Rotate','vw-book-store')
        ),
	) );

	//Topbar
	$wp_customize->add_section('vw_book_store_topbar',array(
		'title'	=> __('Topbar','vw-book-store'),
		'description'=> __('This section will appear in the Topbar','vw-book-store'),
		'panel' => 'vw_book_store_panel_id',
	));	

	$wp_customize->add_setting( 'vw_book_store_topbar_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_book_store_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Book_Store_Toggle_Switch_Custom_Control( $wp_customize, 'vw_book_store_topbar_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Topbar','vw-book-store' ),
          'section' => 'vw_book_store_topbar'
    )));

    //Sticky Header
	$wp_customize->add_setting( 'vw_book_store_sticky_header',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_book_store_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Book_Store_Toggle_Switch_Custom_Control( $wp_customize, 'vw_book_store_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-book-store' ),
        'section' => 'vw_book_store_topbar'
    )));

    $wp_customize->add_setting( 'vw_book_store_search_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_book_store_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Book_Store_Toggle_Switch_Custom_Control( $wp_customize, 'vw_book_store_search_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Search','vw-book-store' ),
          'section' => 'vw_book_store_topbar'
    )));

    $wp_customize->add_setting('vw_book_store_header_my_account_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Book_Store_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_book_store_header_my_account_icon',array(
		'label'	=> __('Add My Account Icon','vw-book-store'),
		'transport' => 'refresh',
		'section'	=> 'vw_book_store_topbar',
		'setting'	=> 'vw_book_store_header_my_account_icon',
		'type'		=> 'icon'
	)));
	
	$wp_customize->add_setting('vw_book_store_my_account_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_book_store_my_account_text',array(
		'label'	=> __('My Account Text','vw-book-store'),
		'section'=> 'vw_book_store_topbar',
		'setting'=> 'vw_book_store_my_account_text',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_book_store_my_account_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vw_book_store_my_account_link',array(
		'label'	=> __('My Account Link','vw-book-store'),
		'section'=> 'vw_book_store_topbar',
		'setting'=> 'vw_book_store_my_account_link',
		'type'=> 'url'
	));

	$wp_customize->add_setting('vw_book_store_help_icon',array(
		'default'	=> 'far fa-question-circle',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Book_Store_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_book_store_help_icon',array(
		'label'	=> __('Add Help Icon','vw-book-store'),
		'transport' => 'refresh',
		'section'	=> 'vw_book_store_topbar',
		'setting'	=> 'vw_book_store_help_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_book_store_help_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_book_store_help_text',array(
		'label'	=> __('Help Text','vw-book-store'),
		'section'=> 'vw_book_store_topbar',
		'setting'=> 'vw_book_store_help_text',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_book_store_help_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vw_book_store_help_link',array(
		'label'	=> __('Help Link','vw-book-store'),
		'section'=> 'vw_book_store_topbar',
		'setting'=> 'vw_book_store_help_link',
		'type'=> 'url'
	));

	$wp_customize->add_setting('vw_book_store_email_icon',array(
		'default'	=> 'far fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Book_Store_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_book_store_email_icon',array(
		'label'	=> __('Add Email Icon','vw-book-store'),
		'transport' => 'refresh',
		'section'	=> 'vw_book_store_topbar',
		'setting'	=> 'vw_book_store_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_book_store_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_book_store_email',array(
		'label'	=> __('Add Email Address','vw-book-store'),
		'section'=> 'vw_book_store_topbar',
		'setting'=> 'vw_book_store_email',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_book_store_cart_icon',array(
		'default'	=> 'fas fa-shopping-bag',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Book_Store_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_book_store_cart_icon',array(
		'label'	=> __('Add Cart Icon','vw-book-store'),
		'transport' => 'refresh',
		'section'	=> 'vw_book_store_topbar',
		'setting'	=> 'vw_book_store_cart_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_book_store_cart_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vw_book_store_cart_link',array(
		'label'	=> __('Add Cart page url','vw-book-store'),
		'section'=> 'vw_book_store_topbar',
		'setting'=> 'vw_book_store_cart_link',
		'type'=> 'url'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_book_store_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-book-store' ),
		'priority'   => null,
		'panel' => 'vw_book_store_panel_id'
	) );

	$wp_customize->add_setting( 'vw_book_store_slider_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_book_store_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Book_Store_Toggle_Switch_Custom_Control( $wp_customize, 'vw_book_store_slider_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Slider','vw-book-store' ),
          'section' => 'vw_book_store_slidersettings'
    )));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_book_store_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_book_store_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_book_store_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-book-store' ),
			'description' => __('Slider image size (1500 x 600)','vw-book-store'),
			'section'  => 'vw_book_store_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('vw_book_store_slider_content_option',array(
        'default' => __('Center','vw-book-store'),
        'sanitize_callback' => 'vw_book_store_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Book_Store_Image_Radio_Control($wp_customize, 'vw_book_store_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-book-store'),
        'section' => 'vw_book_store_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_book_store_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_book_store_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-book-store' ),
		'section'     => 'vw_book_store_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_book_store_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_book_store_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_book_store_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_book_store_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-book-store' ),
	'section'     => 'vw_book_store_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_book_store_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-book-store'),
      '0.1' =>  esc_attr('0.1','vw-book-store'),
      '0.2' =>  esc_attr('0.2','vw-book-store'),
      '0.3' =>  esc_attr('0.3','vw-book-store'),
      '0.4' =>  esc_attr('0.4','vw-book-store'),
      '0.5' =>  esc_attr('0.5','vw-book-store'),
      '0.6' =>  esc_attr('0.6','vw-book-store'),
      '0.7' =>  esc_attr('0.7','vw-book-store'),
      '0.8' =>  esc_attr('0.8','vw-book-store'),
      '0.9' =>  esc_attr('0.9','vw-book-store')
	),
	));

	//Book Store
	$wp_customize->add_section( 'vw_book_store_book_store' , array(
    	'title'      => __( 'Trending Products', 'vw-book-store' ),
		'priority'   => null,
		'panel' => 'vw_book_store_panel_id'
	) );

	for ( $count = 0; $count <= 0; $count++ ) {

		$wp_customize->add_setting( 'vw_book_shop_product_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_book_store_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'vw_book_shop_product_page' . $count, array(
			'label'    => __( 'Select Page', 'vw-book-store' ),
			'section'  => 'vw_book_store_book_store',
			'type'     => 'dropdown-pages'
		));
	}

	//Blog Post
	$wp_customize->add_section('vw_book_store_blog_post',array(
		'title'	=> __('Blog Post Settings','vw-book-store'),
		'panel' => 'vw_book_store_panel_id',
	));	

	$wp_customize->add_setting( 'vw_book_store_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_book_store_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Book_Store_Toggle_Switch_Custom_Control( $wp_customize, 'vw_book_store_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-book-store' ),
        'section' => 'vw_book_store_blog_post'
    )));

    $wp_customize->add_setting( 'vw_book_store_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_book_store_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Book_Store_Toggle_Switch_Custom_Control( $wp_customize, 'vw_book_store_toggle_author',array(
		'label' => esc_html__( 'Author','vw-book-store' ),
		'section' => 'vw_book_store_blog_post'
    )));

    $wp_customize->add_setting( 'vw_book_store_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_book_store_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Book_Store_Toggle_Switch_Custom_Control( $wp_customize, 'vw_book_store_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-book-store' ),
		'section' => 'vw_book_store_blog_post'
    )));

    $wp_customize->add_setting( 'vw_book_store_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_book_store_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-book-store' ),
		'section'     => 'vw_book_store_blog_post',
		'type'        => 'range',
		'settings'    => 'vw_book_store_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_book_store_blog_layout_option',array(
        'default' => __('Default','vw-book-store'),
        'sanitize_callback' => 'vw_book_store_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Book_Store_Image_Radio_Control($wp_customize, 'vw_book_store_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-book-store'),
        'section' => 'vw_book_store_blog_post',
        'choices' => array(
            'Default' => get_template_directory_uri().'/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_book_store_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_book_store_button_text',array(
		'label'	=> __('Add Button Text','vw-book-store'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-book-store' ),
        ),
		'section'=> 'vw_book_store_blog_post',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_book_store_404_page',array(
		'title'	=> __('404 Page Settings','vw-book-store'),
		'panel' => 'vw_book_store_panel_id',
	));	

	$wp_customize->add_setting('vw_book_store_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_book_store_404_page_title',array(
		'label'	=> __('Add Title','vw-book-store'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-book-store' ),
        ),
		'section'=> 'vw_book_store_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_book_store_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_book_store_404_page_content',array(
		'label'	=> __('Add Text','vw-book-store'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-book-store' ),
        ),
		'section'=> 'vw_book_store_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_book_store_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_book_store_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-book-store'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-book-store' ),
        ),
		'section'=> 'vw_book_store_404_page',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('vw_book_store_responsive_media',array(
		'title'	=> __('Responsive Media','vw-book-store'),
		'panel' => 'vw_book_store_panel_id',
	));

	$wp_customize->add_setting( 'vw_book_store_resp_topbar_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_book_store_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Book_Store_Toggle_Switch_Custom_Control( $wp_customize, 'vw_book_store_resp_topbar_hide_show',array(
          'label' => esc_html__( 'Show / Hide Topbar','vw-book-store' ),
          'section' => 'vw_book_store_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_book_store_stickyheader_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_book_store_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Book_Store_Toggle_Switch_Custom_Control( $wp_customize, 'vw_book_store_stickyheader_hide_show',array(
          'label' => esc_html__( 'Sticky Header','vw-book-store' ),
          'section' => 'vw_book_store_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_book_store_resp_slider_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_book_store_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Book_Store_Toggle_Switch_Custom_Control( $wp_customize, 'vw_book_store_resp_slider_hide_show',array(
          'label' => esc_html__( 'Show / Hide Slider','vw-book-store' ),
          'section' => 'vw_book_store_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_book_store_metabox_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_book_store_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Book_Store_Toggle_Switch_Custom_Control( $wp_customize, 'vw_book_store_metabox_hide_show',array(
          'label' => esc_html__( 'Show / Hide Metabox','vw-book-store' ),
          'section' => 'vw_book_store_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_book_store_sidebar_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_book_store_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Book_Store_Toggle_Switch_Custom_Control( $wp_customize, 'vw_book_store_sidebar_hide_show',array(
          'label' => esc_html__( 'Show / Hide Sidebar','vw-book-store' ),
          'section' => 'vw_book_store_responsive_media'
    )));

    $wp_customize->add_setting('vw_book_store_res_open_menus_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Book_Store_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_book_store_res_open_menus_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-book-store'),
		'transport' => 'refresh',
		'section'	=> 'vw_book_store_responsive_media',
		'setting'	=> 'vw_book_store_res_open_menus_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_book_store_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Book_Store_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_book_store_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-book-store'),
		'transport' => 'refresh',
		'section'	=> 'vw_book_store_responsive_media',
		'setting'	=> 'vw_book_store_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	//Content Creation
	$wp_customize->add_section( 'vw_book_store_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-book-store' ),
		'priority' => null,
		'panel' => 'vw_book_store_panel_id'
	) );

	$wp_customize->add_setting('vw_book_store_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Book_Store_Content_Creation( $wp_customize, 'vw_book_store_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-book-store' ),
		),
		'section' => 'vw_book_store_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-book-store' ),
	) ) );


	//Footer Text
	$wp_customize->add_section('vw_book_store_footer',array(
		'title'	=> __('Footer','vw-book-store'),
		'description'=> __('This section will appear in the footer','vw-book-store'),
		'panel' => 'vw_book_store_panel_id',
	));	
	
	$wp_customize->add_setting('vw_book_store_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_book_store_footer_text',array(
		'label'	=> __('Copyright Text','vw-book-store'),
		'section'=> 'vw_book_store_footer',
		'setting'=> 'vw_book_store_footer_text',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_book_store_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_book_store_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Book_Store_Toggle_Switch_Custom_Control( $wp_customize, 'vw_book_store_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-book-store' ),
      	'section' => 'vw_book_store_footer'
    )));

    $wp_customize->add_setting('vw_book_store_scroll_top_icon',array(
		'default'	=> 'fas fa-angle-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Book_Store_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_book_store_scroll_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-book-store'),
		'transport' => 'refresh',
		'section'	=> 'vw_book_store_footer',
		'setting'	=> 'vw_book_store_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_book_store_scroll_top_alignment',array(
        'default' => __('Right','vw-book-store'),
        'sanitize_callback' => 'vw_book_store_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Book_Store_Image_Radio_Control($wp_customize, 'vw_book_store_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-book-store'),
        'section' => 'vw_book_store_footer',
        'settings' => 'vw_book_store_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/layout1.png',
            'Center' => get_template_directory_uri().'/images/layout2.png',
            'Right' => get_template_directory_uri().'/images/layout3.png'
    ))));	
}

add_action( 'customize_register', 'vw_book_store_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Book_Store_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Book_Store_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Book_Store_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Book Store Pro', 'vw-book-store' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-book-store' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/bookstore-wordpress-theme/'),
		)));

		$manager->add_section(new VW_Book_Store_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-book-store' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-book-store' ),
			'pro_url'  => admin_url('themes.php?page=vw_book_store_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-book-store-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-book-store-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Book_Store_Customize::get_instance();