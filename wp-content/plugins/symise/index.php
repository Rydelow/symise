<?php
/*
Plugin Name:  Symise
Description:  Symise Auth.
Version:      1.0
Author:       (Hanu,Saroj,Sujana) 
Author URI:   sarojsahoo41@gmil.com,91-8658022345
*/
ob_start();
define('FILE_URL',site_url().'/wp-content/symise/');
define('fileurl',site_url().'/wp-content/themes/symise/assest/');
require plugin_dir_path( __FILE__ ) .'classes/Page.php';
require plugin_dir_path( __FILE__ ) .'classes/Enquiry.php';