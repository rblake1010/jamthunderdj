<?php
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
	// Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }

    function register_my_menu(){
        register_nav_menu('primarynav-menu',__('Primary Navigation Menu'));
    }
    add_action('init', 'register_my_menu');


    function awesome_script_enqueue(){
        // CSS Stylesheets
        wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/reset.css', array(), '1.0.0', 'all');
        wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all');
        wp_enqueue_style('customstyle', get_template_directory_uri() . '/fancybox/jquery.fancybox.css', array(), '1.0.0', 'all');
        wp_enqueue_style('customstyle', get_template_directory_uri() . '/bxslider/jquery.bxslider.css', array(), '1.0.0', 'all');
        wp_enqueue_style('customstyle', 'http://fonts.googleapis.com/css?family=Montserrat:400,700', array(), '1.0.0', 'all');
        // JS Scripts
        wp_enqueue_scripts('customjs', get_template_directory_uri() . '/js/modernizr.custom.67211.js', array(), '1.0.0', true );
        wp_enqueue_scripts('customjs', get_template_directory_uri() . '/bxslider/jquery.bxslider.js', array(), '1.0.0', true );
        wp_enqueue_scripts('customjs', get_template_directory_uri() . '/fancybox/jquery.fancybox.js', array(), '1.0.0', true );
        wp_enqueue_scripts('customjs', get_template_directory_uri() . '/fancybox/helpers/jquery.fancybox-media.js', array(), '1.0.0', true );
        wp_enqueue_scripts('customjs', get_template_directory_uri() . '/js/jquery.cycle.all.js', array(), '1.0.0', true );
        wp_enqueue_scripts('customjs', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true );
    }
    add_action('wp_enqueue_scripts', 'awesome_script_enqueue');

?>