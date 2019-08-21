<?php
include_once get_stylesheet_directory() . '/vendor/autoload.php';

$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/DoedeJaarsmaCommunicatie/fluffy-guacamole/',
	__FILE__,
	'tetterode'
);

add_theme_support('custom-logo');
add_theme_support('post-thumbnails');
