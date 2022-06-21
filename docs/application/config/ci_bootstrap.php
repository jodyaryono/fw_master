<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| CI Bootstrap 3 Configuration
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views
| when calling MY_Controller's render() function.
|
| See example and detailed explanation from:
| 	/application/config/ci_bootstrap_example.php
*/

$config['ci_bootstrap'] = array(

	// Site name
	'site_name' => 'Framework_master',

	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => '',

	// Default meta data
	'meta_data'	=> array(
		'author'		=> 'Jody Ayono',
		'description'	=> 'Jody Aryono',
		'keywords'		=> ''
	),



	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
			'assets/fontawesome/js/all.js',
		),
		'foot'	=> array(
			"assets/plugins/jquery-3.4.1.min.js",
			"assets/plugins/bootstrap/js/bootstrap.min.js",
			"assets/plugins/stickyfill/dist/stickyfill.min.js",
			"assets/js/main.js"
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800',
			'assets/plugins/bootstrap/css/bootstrap.min.css',
			'assets/plugins/elegant_font/css/style.css',
			'assets/plugins/prism/prism.css',
			'assets/css/styles.css'
		)
	),

	// Default CSS class for <body> tag
	'body_class' => 'landing-page',

	// Multilingual settings
	'languages' => array(
		'default'		=> 'en',
		'autoload'		=> array('general'),
		'available'		=> array(
			'en' => array(
				'label'	=> 'English',
				'value'	=> 'english'
			),
			'zh' => array(
				'label'	=> '繁體中文',
				'value'	=> 'traditional-chinese'
			),
			'cn' => array(
				'label'	=> '简体中文',
				'value'	=> 'simplified-chinese'
			),
			'es' => array(
				'label'	=> 'Español',
				'value' => 'spanish'
			)
		)
	),

	// Google Analytics User ID
	'ga_id' => '',

	// Menu items
	'menu' => array(
		'home' => array(
			'name'		=> 'Home',
			'url'		=> '',
		),
		'about' => array(
			'name'		=> 'About',
			'url'		=> 'modern/about',
		),
		'cart' => array(
			'name'		=> 'Cart',
			'url'		=> 'cart',
		),
		'register' => array(
			'name'		=> 'Register',
			'url'		=> 'register',
		),
		'portfolio' => array(
			'name'		=> 'Portolio',
			'url'			=> 'portfolio',
			'icon'		=> 'fa fa-cogs',
			'children'  => array(
			'portfolio 1'	=> 'portfolio/portfolio_1',
			'portfolio 2'	=> 'portfolio/portfolio_2',
			'portfolio 3'	=> 'portfolio/portfolio_3',
			'portfolio 4'	=> 'portfolio/portfolio_4',
			'portfolio Single'	=> 'portfolio/portfolio_single',
			)
		),
		'blog' => array(
			'name'		=> 'Blog',
			'url'			=> 'blog',
			'icon'		=> 'fa fa-cogs',
			'children'  => array(
			'Blog Home'	=> 'blog/home',
			'Blog Home 2'	=> 'blog/home2',
			'Blog Post'	=> 'blog/blog_post',

			)
		),
		'login' => array(
			'name'		=> 'Admin Login',
			'url'		=> 'admin',
		),
	),

	// Login page
	'login_url' => '',
	'copyright'=>'Framework_master',
	// Restricted pages
	'page_auth' => array(
	),

	// Email config
	'email' => array(
		'from_email'		=> '',
		'from_name'			=> '',
		'subject_prefix'	=> '',

		// Mailgun HTTP API
		'mailgun_api'		=> array(
			'domain'			=> '',
			'private_api_key'	=> ''
		),
	),

	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
	),
);

/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'ci_session_frontend';
