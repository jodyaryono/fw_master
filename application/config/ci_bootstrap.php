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
			'assets/vendor/jquery/jquery.slim.min.js',
			'https://cdn.jsdelivr.net/npm/vue@2.6.12',
			'https://cdn.jsdelivr.net/npm/axios@0.12.0/dist/axios.min.js',
			'https://cdn.jsdelivr.net/npm/lodash@4.13.1/lodash.min.js',
			'https://unpkg.com/babel-polyfill/dist/polyfill.min.js',
			'https://unpkg.com/bootstrap-vue@2.21.2/dist/bootstrap-vue.js',
			'https://unpkg.com/bootstrap-vue@2.21.2/dist/bootstrap-vue-icons.js',
			'https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js',
			'assets/dist/js/qrious.min.js'
		),
		'foot'	=> array(
			'assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
			'assets/dist/js/iconify.js',
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			//'assets/vendor/bootstrap/css/bootstrap.min.css',
			'https://unpkg.com/bootstrap@4.5.3/dist/css/bootstrap.min.css',
			'https://unpkg.com/bootstrap-vue@2.21.2/dist/bootstrap-vue.css'
		)
	),

	// Default CSS class for <body> tag
	'body_class' => '',

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
		// 'about' => array(
		// 	'name'		=> 'About',
		// 	'url'		=> 'modern/about',
		// ),
		// 'cart' => array(
		// 	'name'		=> 'Cart',
		// 	'url'		=> 'cart',
		// ),
		// 'register' => array(
		// 	'name'		=> 'Register',
		// 	'url'		=> 'register',
		// ),
		// 'portfolio' => array(
		// 	'name'		=> 'Portolio',
		// 	'url'			=> 'portfolio',
		// 	'icon'		=> 'fa fa-cogs',
		// 	'children'  => array(
		// 	'portfolio 1'	=> 'portfolio/portfolio_1',
		// 	'portfolio 2'	=> 'portfolio/portfolio_2',
		// 	'portfolio 3'	=> 'portfolio/portfolio_3',
		// 	'portfolio 4'	=> 'portfolio/portfolio_4',
		// 	'portfolio Single'	=> 'portfolio/portfolio_single',
		// 	)
		// ),
		// 'blog' => array(
		// 	'name'		=> 'Blog',
		// 	'url'			=> 'blog',
		// 	'icon'		=> 'fa fa-cogs',
		// 	'children'  => array(
		// 	'Blog Home'	=> 'blog/home',
		// 	'Blog Home 2'	=> 'blog/home2',
		// 	'Blog Post'	=> 'blog/blog_post',
		//
		// 	)
		// ),
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
