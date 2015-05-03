<?php
/*
 * Plugin Name: Modal Portfolio
 * Plugin URI: http://www.internet-formation.fr
 * Description: Portfolio de références avec modale et texte basé sur http://hadouweb.fr/creer-plugin-portfolio-wordpress/
 * Version: 1.0
 * Author: Mathieu Chartier
 * Author URI: http://www.mathieu-chartier.com
*/
// Version du plugin
global $modal_portfolio_version;
$modal_portfolio_version = "1.0";

// Gestion des langues
function modal_portfolio_lang() {
   $path = dirname(plugin_basename(__FILE__)).'/lang/';
   load_plugin_textdomain('modal-portfolio', NULL, $path);
}
add_action('plugins_loaded', 'modal_portfolio_lang');

// Fonction lancée lors de l'activation ou de la desactivation de l'extension
register_activation_hook( __FILE__, 'modal_portfolio_installation');
register_deactivation_hook( __FILE__, 'modal_portfolio_desinstallation');

// Réglages par défaut (enregistrement des options)
function modal_portfolio_installation() {
	global $modal_portfolio_version;

	// Valeurs par défaut
	add_option("modal_portfolio_filters", true);
	add_option("modal_portfolio_text_modal", true);
	add_option("modal_portfolio_title_modal", true);
	add_option("modal_portfolio_title_thumbnail", true);
	add_option("modal_portfolio_close_button", true);
	add_option("modal_portfolio_modalOpacity", 70);
	add_option("modal_portfolio_overlayCloseClick", true);
	add_option("modal_portfolio_colorOverlay", "#666666");
	add_option("modal_portfolio_overlayDuration", 200);
	add_option("modal_portfolio_hideShowDuration", 400);
	add_option("modal_portfolio_openEffect", "fadeIn");
	add_option("modal_portfolio_thumbnailsEffect", true);
	add_option("modal_portfolio_openUpEffect", "easeOutQuad");
	add_option("modal_portfolio_openDownEffect", "easeInQuad");
	add_option("modal_portfolio_openUpDuration", 600);
	add_option("modal_portfolio_openDownDuration", 300);
	
	// Prise en compte de la version en cours
	add_option("modal_portfolio_version", $modal_portfolio_version);
}

// Quand l'extension est désactivée, les options sont supprimées...
function modal_portfolio_desinstallation() {
	// Suppression des options
	delete_option("modal_portfolio_filters");
	delete_option("modal_portfolio_text_modal");
	delete_option("modal_portfolio_title_modal");
	delete_option("modal_portfolio_title_thumbnail");
	delete_option("modal_portfolio_close_button");
	delete_option("modal_portfolio_modalOpacity");
	delete_option("modal_portfolio_overlayCloseClick");
	delete_option("modal_portfolio_colorOverlay");
	delete_option("modal_portfolio_overlayDuration");
	delete_option("modal_portfolio_hideShowDuration");
	delete_option("modal_portfolio_openEffect");
	delete_option("modal_portfolio_thumbnailsEffect");
	delete_option("modal_portfolio_openUpEffect");
	delete_option("modal_portfolio_openDownEffect");
	delete_option("modal_portfolio_openUpDuration");
	delete_option("modal_portfolio_openDownDuration");
	
	// Suppression de la version du plugin
	delete_option("modal_portfolio_version");
}

// Inclusion des menus personnalisés
include('inc/modal-portfolio-menus.php');

// Inclusion de la metabox supplémentaire (titre de la vignette)
include('inc/modal-portfolio-metaboxes.php');

// Inclusion du shortcode
include('inc/modal-portfolio-shortcode.php');

// Activation des images à la Une (obligatoire !)
add_theme_support('post-thumbnails');

// Liste des scripts et CSS utiles
function modal_portfolio_scripts() {
    wp_enqueue_script('isotope', plugins_url().'/modal-portfolio/js/isotope.min.js', array(), '2.0.0', true);
    wp_enqueue_script('simplemodal', plugins_url().'/modal-portfolio/js/jquery.simplemodal.1.4.4.min.js', array(), '1.4.4', true);
	
	// Variables passées au fichier portfolio.js
	$params = array(
		'modalOpacity'		=> get_option("modal_portfolio_modalOpacity"),
		'overlayCloseClick'	=> get_option("modal_portfolio_overlayCloseClick"),
		'colorOverlay'		=> get_option("modal_portfolio_colorOverlay"),
		'overlayDuration'	=> get_option("modal_portfolio_overlayDuration"),
		'hideShowDuration'	=> get_option("modal_portfolio_hideShowDuration"),
		'openEffect'		=> get_option("modal_portfolio_openEffect"),
		'thumbnailsEffect'	=> get_option("modal_portfolio_thumbnailsEffect"),
		'openUpEffect'		=> get_option("modal_portfolio_openUpEffect"),
		'openDownEffect'	=> get_option("modal_portfolio_openDownEffect"),
		'openUpDuration'	=> get_option("modal_portfolio_openUpDuration"),
		'openDownDuration'	=> get_option("modal_portfolio_openDownDuration"),
	);
    wp_enqueue_script('portfolio-script', plugins_url().'/modal-portfolio/js/portfolio.js', array(), '1.0', true);
	wp_localize_script('portfolio-script', 'parametres', $params);
    wp_enqueue_style('portfolio-css', plugins_url().'/modal-portfolio/css/portfolio.css');
}
add_action('wp_enqueue_scripts', 'modal_portfolio_scripts');

// Ajout d'une feuille de style pour l'admin
function modal_portfolio_admin_scripts_CSS() {
	$style	= plugins_url('css/modal-portfolio-admin.css', __FILE__);
	wp_enqueue_style('modal-portfolio-admin', $style, 15);
	
	// Style du slider range
	wp_enqueue_style("range-style", "//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css");
	
	// Ajout des scripts utiles pour le plugin
	wp_enqueue_script('iris-colorpicker-script', plugins_url('/js/iris.min.js', __FILE__), array('jquery', 'jquery-ui'), false, true);
	wp_enqueue_script('colorpicker-script', plugins_url('/js/colorpicker-script.js', __FILE__), array('wp-color-picker'), false, true);
	wp_enqueue_script('jquery-ui-slider');
}
add_action('admin_enqueue_scripts', 'modal_portfolio_admin_scripts_CSS');
?>