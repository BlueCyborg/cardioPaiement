<?php
/*
Plugin Name: Cardio-Paiement
Plugin URI: https://github.com/bluecyborg/Cardio-Message
Description: Ce plugin permet de gérer les abonnements des clients !
Version : 1.0
Author URI: https://github.com/bluecyborg/
Author: Mathys
*/

require 'contents/fonctions.php';
require 'modele/fonctionsBDD.php';

defined('ABSPATH') or die('Désolé, vous n\'avez pas l\'autorisation d\'accéder à cette page.');

define('CPA_FILE_PATH', plugin_dir_path(__FILE__));

// Register a new shortcode: [cr_custom_registration]
//add_shortcode( 'cr_custom_registration', 'custom_registration_shortcode' );
//require_once 'contents/redirection.php';

add_action('admin_menu', 'add_Admin_Link_4', 1);