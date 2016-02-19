<?php
	// remove homepage editor
	function remove_homepage_editor(){
		remove_menu_page( 'he_setting_page' );  
	} add_action( 'admin_menu', 'remove_homepage_editor',100 );
	
	// stylesheet of default homepage isn't 	
	function remove_he_stylesheets() {
	    	wp_dequeue_style('he_style'); 
	}add_action('wp_enqueue_scripts', 'remove_he_stylesheets',100);
	
	// theme update checker
	/*$MyUpdateChecker = new ThemeUpdateChecker(
	    'sensationred-lbc-child',
	    'https://kernl.us/api/v1/theme-updates/56bf7d295beefbf6327fc266/'
	);*/

	// load parent style
	function enqueue_parent_theme_styles() {
	   // wp_enqueue_style( 'sensationred', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'lbc-style',
	        get_stylesheet_directory_uri() . '/style.css',
	        array( 'default_stylesheet' ) // load this stylesheet after the parent css is loaded
	    );
	} add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_styles' );

	
	// add post type and add default categories 
	function create_lbc_posttypes() {
		// register the posttype
		register_post_type( 'evenementen', array(
				'hierarchical' => true,
				'labels' => array(
					'name' => __( 'evenementen', 'sensationred' ),
					'singular_name' => __( 'evenement', 'sensationred' )
				),
				'public' => true,
				'menu_icon'=> 'dashicons-calendar-alt',
				'rewrite' => array('slug' => 'evenementen'),			
				'supports' => array( 'title', 'editor', 'thumbnail' ),
				
			)
		);
		
		// register the categories
		register_taxonomy('sponsor_type',array('sponsoren'), array(
		    'hierarchical' => true,
		    'labels' => array(
				'name' => 'type'
			),
		    'show_ui' => true,
		    'query_var' => true,
		    'show_in_nav_menus' => true,
		    'rewrite' => array('slug' => 'sponsor_type'),
		    'has_archive' => true,
		  )); 
		  
		  
		// Create the category business partner 
		wp_insert_category(array('cat_name' => 'business club partner', 'taxonomy' => 'sponsor_type', 'category_nicename' => 'business-partner'));
				
		
	}	add_action( 'init', 'create_lbc_posttypes' );
	
?>