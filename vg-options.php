<?php
// Place bellow into your theme's functions.php file
// if(!class_exists('VG_Options')){
//   require_once( dirname( __FILE__ ) . '/options/vg-options.php' ); // Load Options Panel
// }


/*
 * 
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 * Also if running on windows you may have url problems, which can be fixed by defining the framework url first
 *
 */
if(!class_exists('VG_Options')){
	require_once( dirname( __FILE__ ) . '/options.php' );
}

/*
 * 
 * Custom function for filtering the sections array given by theme, good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for urls, and dir will NOT be available at this point in a child theme, so you must use
 * get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function add_another_section($sections){
	
	//$sections = array();
	$sections[] = array(
		'title' => __('A Section added by hook', 'vg-opts'),
		'desc' => __('<p class="description">This is a section created by adding a filter to the sections array, great to allow child themes, to add/remove sections from the options.</p>', 'vg-opts'),
		'icon' => 'icon-star',
		'fields' => array()
		);
	
	return $sections;
	
}//function
//add_filter('vg-opts-sections-twenty_eleven', 'add_another_section');


/*
 * 
 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){
	
	//$args['dev_mode'] = false;
	
	return $args;
	
}//function
//add_filter('vg-opts-args-twenty_eleven', 'change_framework_args');


/*
 * Start Editing
 */

function setup_framework_options(){
$args = array();

//Set it to dev mode to view the class settings/info in the form - default is false
$args['dev_mode'] = true;

//Choose to disable the import/export feature
$args['show_import_export'] = true;

//google api key MUST BE DEFINED IF YOU WANT TO USE GOOGLE WEBFONTS
//you must active "Web Fonts Developer API" under Services tab! https://code.google.com/apis/console/
$args['google_api_key'] = '';

//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
//$args['stylesheet_override'] = true;

//Add HTML before the form
$args['intro_text'] = __('<p>This is the HTML which can be displayed before the form, it isnt required, but more info is always better. Anything goes in terms of markup here, any HTML.</p>', 'vg-opts');

//Setup custom links in the footer for share icons
$args['share_icons']['twitter'] = array(
	'link' => 'http://twitter.com/owldesign',
	'title' => 'Folow me on Twitter', 
	'img' => 'icon-twitter-sign'
);

//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
$args['opt_name'] = 'twenty_eleven';

//Custom menu icon
//$args['menu_icon'] = '';

//Custom menu title for options page - default is "Options"
$args['menu_title'] = __('Theme Options', 'vg-opts');

//Custom Page Title for options page - default is "Options"
$args['page_title'] = __('Theme Options', 'vg-opts');

//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "vg_theme_options"
$args['page_slug'] = 'vg_theme_options';

//Custom page capability - default is set to "manage_options"
//$args['page_cap'] = 'manage_options';

//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
//$args['page_type'] = 'submenu';

//parent menu - default is set to "themes.php" (Appearance)
//the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'themes.php';

//custom page location - default 100 - must be unique or will override other items
$args['page_position'] = 27;

//Custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';

//Want to disable the sections showing as a submenu in the admin? uncomment this line
//$args['allow_sub_menu'] = false;
		
//Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition		
$args['help_tabs'][] = array(
							'id' => 'vg-opts-1',
							'title' => __('Theme Information 1', 'vg-opts'),
							'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'vg-opts')
							);
$args['help_tabs'][] = array(
							'id' => 'vg-opts-2',
							'title' => __('Theme Information 2', 'vg-opts'),
							'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'vg-opts')
							);

//Set the Help Sidebar for the options page - no sidebar by default										
$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'vg-opts');



$sections = array();

$sections[] = array(
				'title' => __('Getting Started', 'vg-opts'),
				'desc' => __('<p class="description">This is the description field for the Section. HTML is allowed</p>', 'vg-opts'),
				'icon' => 'icon-exclamation'
				//'fields' => array()
				);

				
$sections[] = array(
				'icon' => 'icon-text-width',
				'title' => __('Text Fields', 'vg-opts'),
				'desc' => __('<p class="description">This is the Description. Again HTML is allowed2</p>', 'vg-opts'),
				'fields' => array(
					array(
						'id' => '1', //must be unique
						'type' => 'text', //builtin fields include:
										  //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
						'title' => __('Text Option', 'vg-opts'),
						'sub_desc' => __('This is a little space under the Field Title in the Options table, additonal info is good in here.', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						//'validate' => '', //builtin validation includes: email|html|html_custom|no_html|js|numeric|url
						//'msg' => 'custom error message', //override the default validation error message for specific fields
						//'std' => '', //This is a default value, used to set the options on theme activation, and if the user hits the Reset to defaults Button
						//'class' => '' //Set custom classes for elements if you want to do something a little different - default is "regular-text"
						),
					array(
						'id' => '2',
						'type' => 'text',
						'title' => __('Text Option - Email Validated', 'vg-opts'),
						'sub_desc' => __('This is a little space under the Field Title in the Options table, additonal info is good in here.', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'validate' => 'email',
						'msg' => 'custom error message',
						'std' => 'test@test.com'
						),
					array(
						'id' => 'multi_text',
						'type' => 'multi_text',
						'title' => __('Multi Text Option', 'vg-opts'),
						'sub_desc' => __('This is a little space under the Field Title in the Options table, additonal info is good in here.', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts')
						),
					array(
						'id' => '3',
						'type' => 'text',
						'title' => __('Text Option - URL Validated', 'vg-opts'),
						'sub_desc' => __('This must be a URL.', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'validate' => 'url',
						'std' => 'http://theme.com'
						),
					array(
						'id' => '4',
						'type' => 'text',
						'title' => __('Text Option - Numeric Validated', 'vg-opts'),
						'sub_desc' => __('This must be numeric.', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'validate' => 'numeric',
						'std' => '0',
						'class' => 'small-text'
						),
					array(
						'id' => 'comma_numeric',
						'type' => 'text',
						'title' => __('Text Option - Comma Numeric Validated', 'vg-opts'),
						'sub_desc' => __('This must be a comma seperated string of numerical values.', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'validate' => 'comma_numeric',
						'std' => '0',
						'class' => 'small-text'
						),
					array(
						'id' => 'no_special_chars',
						'type' => 'text',
						'title' => __('Text Option - No Special Chars Validated', 'vg-opts'),
						'sub_desc' => __('This must be a alpha numeric only.', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'validate' => 'no_special_chars',
						'std' => '0'
						),
					array(
						'id' => 'str_replace',
						'type' => 'text',
						'title' => __('Text Option - Str Replace Validated', 'vg-opts'),
						'sub_desc' => __('You decide.', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'validate' => 'str_replace',
						'str' => array('search' => ' ', 'replacement' => 'thisisaspace'),
						'std' => '0'
						),
					array(
						'id' => 'preg_replace',
						'type' => 'text',
						'title' => __('Text Option - Preg Replace Validated', 'vg-opts'),
						'sub_desc' => __('You decide.', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'validate' => 'preg_replace',
						'preg' => array('pattern' => '/[^a-zA-Z_ -]/s', 'replacement' => 'no numbers'),
						'std' => '0'
						),
					array(
						'id' => 'custom_validate',
						'type' => 'text',
						'title' => __('Text Option - Custom Callback Validated', 'vg-opts'),
						'sub_desc' => __('You decide.', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'validate_callback' => 'validate_callback_function',
						'std' => '0'
						),
					array(
						'id' => '5',
						'type' => 'textarea',
						'title' => __('Textarea Option - No HTML Validated', 'vg-opts'), 
						'sub_desc' => __('All HTML will be stripped', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'validate' => 'no_html',
						'std' => 'No HTML is allowed in here.'
						),
					array(
						'id' => '6',
						'type' => 'textarea',
						'title' => __('Textarea Option - HTML Validated', 'vg-opts'), 
						'sub_desc' => __('HTML Allowed (wp_kses)', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => 'HTML is allowed in here.'
						),
					array(
						'id' => '7',
						'type' => 'textarea',
						'title' => __('Textarea Option - HTML Validated Custom', 'vg-opts'), 
						'sub_desc' => __('Custom HTML Allowed (wp_kses)', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'validate' => 'html_custom',
						'std' => 'Some HTML is allowed in here.',
						'allowed_html' => array('') //see http://codex.wordpress.org/Function_Reference/wp_kses
						),
					array(
						'id' => '8',
						'type' => 'textarea',
						'title' => __('Textarea Option - JS Validated', 'vg-opts'), 
						'sub_desc' => __('JS will be escaped', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'validate' => 'js'
						),
					array(
						'id' => '9',
						'type' => 'editor',
						'title' => __('Editor Option', 'vg-opts'), 
						'sub_desc' => __('Can also use the validation methods if required', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'std' => 'OOOOOOhhhh, rich editing.'
						)
					,
					array(
						'id' => 'editor2',
						'type' => 'editor',
						'title' => __('Editor Option 2', 'vg-opts'), 
						'sub_desc' => __('Can also use the validation methods if required', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'std' => 'OOOOOOhhhh, rich editing2.'
						)
					)
				);
$sections[] = array(
				'icon' => 'icon-ok',
				'title' => __('Radio/Checkbox Fields', 'vg-opts'),
				'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'vg-opts'),
				'fields' => array(
					array(
						'id' => '10',
						'type' => 'checkbox',
						'title' => __('Checkbox Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'std' => '1'// 1 = on | 0 = off
						),
					array(
						'id' => '11',
						'type' => 'multi_checkbox',
						'title' => __('Multi Checkbox Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for multi checkbox options
						'std' => array('1' => '1', '2' => '0', '3' => '0')//See how std has changed? you also dont need to specify opts that are 0.
						),
					array(
						'id' => '12',
						'type' => 'radio',
						'title' => __('Radio Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
						'std' => '2'
						),
					array(
						'id' => '13',
						'type' => 'radio_img',
						'title' => __('Radio Image Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'options' => array(
										'1' => array('title' => 'Opt 1', 'img' => 'images/align-none.png'),
										'2' => array('title' => 'Opt 2', 'img' => 'images/align-left.png'),
										'3' => array('title' => 'Opt 3', 'img' => 'images/align-center.png'),
										'4' => array('title' => 'Opt 4', 'img' => 'images/align-right.png')
											),//Must provide key => value(array:title|img) pairs for radio options
						'std' => '2'
						),
					array(
						'id' => 'radio_img',
						'type' => 'radio_img',
						'title' => __('Radio Image Option For Layout', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This uses some of the built in images, you can use them for layout options.', 'vg-opts'),
						'options' => array(
										'1' => array('title' => '1 Column', 'img' => VG_OPTIONS_URL.'img/1col.png'),
										'2' => array('title' => '2 Column Left', 'img' => VG_OPTIONS_URL.'img/2cl.png'),
										'3' => array('title' => '2 Column Right', 'img' => VG_OPTIONS_URL.'img/2cr.png')
											),//Must provide key => value(array:title|img) pairs for radio options
						'std' => '2'
						)																		
					)
				);
$sections[] = array(
				'icon' => 'icon-align-justify',
				'title' => __('Select Fields', 'vg-opts'),
				'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'vg-opts'),
				'fields' => array(
					array(
						'id' => '14',
						'type' => 'select',
						'title' => __('Select Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for select options
						'std' => '2'
						),
					array(
						'id' => '15',
						'type' => 'multi_select',
						'title' => __('Multi Select Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
						'std' => array('2','3')
						)									
					)
				);
$sections[] = array(
				'icon' => 'icon-cog',
				'title' => __('Custom Fields', 'vg-opts'),
				'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'vg-opts'),
				'fields' => array(
					array(
						'id' => '16',
						'type' => 'color',
						'title' => __('Color Option', 'vg-opts'), 
						'sub_desc' => __('Only color validation can be done on this field type', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'std' => '#FFFFFF'
						),
					array(
						'id' => 'color_gradient',
						'type' => 'color_gradient',
						'title' => __('Color Gradient Option', 'vg-opts'), 
						'sub_desc' => __('Only color validation can be done on this field type', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'std' => array('from' => '#000000', 'to' => '#FFFFFF')
						),
					array(
						'id' => '17',
						'type' => 'date',
						'title' => __('Date Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts')
						),
					array(
						'id' => '18',
						'type' => 'button_set',
						'title' => __('Button Set Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts'),
						'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
						'std' => '2'
						),
					array(
						'id' => '19',
						'type' => 'upload',
						'title' => __('Upload Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts')
						),
					array(
						'id' => 'pages_select',
						'type' => 'pages_select',
						'title' => __('Pages Select Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This field creates a drop down menu of all the sites pages.', 'vg-opts'),
						'args' => array()//uses get_pages
						),
					array(
						'id' => 'pages_multi_select',
						'type' => 'pages_multi_select',
						'title' => __('Pages Multiple Select Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This field creates a Multi Select menu of all the sites pages.', 'vg-opts'),
						'args' => array('number' => '5')//uses get_pages
						),
					array(
						'id' => 'posts_select',
						'type' => 'posts_select',
						'title' => __('Posts Select Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This field creates a drop down menu of all the sites posts.', 'vg-opts'),
						'args' => array('numberposts' => '10')//uses get_posts
						),
					array(
						'id' => 'posts_multi_select',
						'type' => 'posts_multi_select',
						'title' => __('Posts Multiple Select Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This field creates a Multi Select menu of all the sites posts.', 'vg-opts'),
						'args' => array('numberposts' => '10')//uses get_posts
						),
					array(
						'id' => 'tags_select',
						'type' => 'tags_select',
						'title' => __('Tags Select Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This field creates a drop down menu of all the sites tags.', 'vg-opts'),
						'args' => array('number' => '10')//uses get_tags
						),
					array(
						'id' => 'tags_multi_select',
						'type' => 'tags_multi_select',
						'title' => __('Tags Multiple Select Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This field creates a Multi Select menu of all the sites tags.', 'vg-opts'),
						'args' => array('number' => '10')//uses get_tags
						),
					array(
						'id' => 'cats_select',
						'type' => 'cats_select',
						'title' => __('Cats Select Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This field creates a drop down menu of all the sites cats.', 'vg-opts'),
						'args' => array('number' => '10')//uses get_categories
						),
					array(
						'id' => 'cats_multi_select',
						'type' => 'cats_multi_select',
						'title' => __('Cats Multiple Select Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This field creates a Multi Select menu of all the sites cats.', 'vg-opts'),
						'args' => array('number' => '10')//uses get_categories
						),
					array(
						'id' => 'menu_select',
						'type' => 'menu_select',
						'title' => __('Menu Select Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This field creates a drop down menu of all the sites menus.', 'vg-opts'),
						//'args' => array()//uses wp_get_nav_menus
						),
					array(
						'id' => 'select_hide_below',
						'type' => 'select_hide_below',
						'title' => __('Select Hide Below Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This field requires certain options to be checked before the below field will be shown.', 'vg-opts'),
						'options' => array(
									'1' => array('name' => 'Opt 1 field below allowed', 'allow' => 'true'),
									'2' => array('name' => 'Opt 2 field below hidden', 'allow' => 'false'),
									'3' => array('name' => 'Opt 3 field below allowed', 'allow' => 'true')
									),//Must provide key => value(array) pairs for select options
						'std' => '2'
						),
					array(
						'id' => 'menu_location_select',
						'type' => 'menu_location_select',
						'title' => __('Menu Location Select Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This field creates a drop down menu of all the themes menu locations.', 'vg-opts')
						),
					array(
						'id' => 'checkbox_hide_below',
						'type' => 'checkbox_hide_below',
						'title' => __('Checkbox to hide below', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This field creates a checkbox which will allow the user to use the next setting.', 'vg-opts'),
						),
						array(
						'id' => 'post_type_select',
						'type' => 'post_type_select',
						'title' => __('Post Type Select Option', 'vg-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'vg-opts'),
						'desc' => __('This field creates a drop down menu of all registered post types.', 'vg-opts'),
						//'args' => array()//uses get_post_types
						),
					array(
						'id' => 'custom_callback',
						//'type' => 'nothing',//doesnt need to be called for callback fields
						'title' => __('Custom Field Callback', 'vg-opts'), 
						'sub_desc' => __('This is a completely unique field type', 'vg-opts'),
						'desc' => __('This is created with a callback function, so anything goes in this field. Make sure to define the function though.', 'vg-opts'),
						'callback' => 'my_custom_field'
						),
					array(
						'id' => 'google_webfonts',
						'type' => 'google_webfonts',//doesnt need to be called for callback fields
						'title' => __('Google Webfonts', 'vg-opts'), 
						'sub_desc' => __('This is a completely unique field type', 'vg-opts'),
						'desc' => __('This is a simple implementation of the developer API for Google webfonts. Preview selection will be coming in future releases.', 'vg-opts')
						)							
					)
				);

$sections[] = array(
				'icon' => 'icon-crop',
				'title' => __('Non Value Fields', 'vg-opts'),
				'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'vg-opts'),
				'fields' => array(
					array(
						'id' => '20',
						'type' => 'text',
						'title' => __('Text Field', 'vg-opts'), 
						'sub_desc' => __('Additional Info', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts')
						),
					array(
						'id' => '21',
						'type' => 'divide'
						),
					array(
						'id' => '22',
						'type' => 'text',
						'title' => __('Text Field', 'vg-opts'), 
						'sub_desc' => __('Additional Info', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts')
						),
					array(
						'id' => '23',
						'type' => 'info',
						'desc' => __('<p class="description">This is the info field, if you want to break sections up.</p>', 'vg-opts')
						),
					array(
						'id' => '24',
						'type' => 'text',
						'title' => __('Text Field', 'vg-opts'), 
						'sub_desc' => __('Additional Info', 'vg-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'vg-opts')
						)				
					)
				);
				
				
	$tabs = array();
			
	if (function_exists('wp_get_theme')){
		$theme_data = wp_get_theme();
		$theme_uri = $theme_data->get('ThemeURI');
		$description = $theme_data->get('Description');
		$author = $theme_data->get('Author');
		$version = $theme_data->get('Version');
		$tags = $theme_data->get('Tags');
	}else{
		$theme_data = get_theme_data(trailingslashit(get_stylesheet_directory()).'style.css');
		$theme_uri = $theme_data['URI'];
		$description = $theme_data['Description'];
		$author = $theme_data['Author'];
		$version = $theme_data['Version'];
		$tags = $theme_data['Tags'];
	}	

	$theme_info = '<div class="vg-opts-section-desc">';
	$theme_info .= '<p class="vg-opts-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'vg-opts').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
	$theme_info .= '<p class="vg-opts-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'vg-opts').$author.'</p>';
	$theme_info .= '<p class="vg-opts-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'vg-opts').$version.'</p>';
	$theme_info .= '<p class="vg-opts-theme-data description theme-description">'.$description.'</p>';
	$theme_info .= '<p class="vg-opts-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'vg-opts').implode(', ', $tags).'</p>';
	$theme_info .= '</div>';



	$tabs['theme_info'] = array(
		'icon' => 'icon-info-sign',
		'title' => __('Theme Information', 'vg-opts'),
		'content' => $theme_info
		);
	
	if(file_exists(trailingslashit(get_stylesheet_directory()).'README.html')){
		$tabs['theme_docs'] = array(
			'icon' => 'icon-book',
			'title' => __('Documentation', 'vg-opts'),
			'content' => nl2br(file_get_contents(trailingslashit(get_stylesheet_directory()).'README.html'))
			);
	}//if

	global $VG_Options;
	$VG_Options = new VG_Options($sections, $args, $tabs);

}//function
add_action('init', 'setup_framework_options', 0);

/*
 * 
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}//function

/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value){
	
	$error = false;
	$value =  'just testing';
	/*
	do your validation
	
	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/
	
	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;
	
}//function
?>