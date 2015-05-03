<?php
// Ajout du post-type personnalisé (portfolio) et des menus correspondants
function custom_post_type() {
    $labels = array(
        'name'                => __('Portfolio', 'modal-portfolio'),
        'singular_name'       => __('Portfolio', 'modal-portfolio'),
        'all_items'           => __('Toutes les références', 'modal-portfolio'),
        'view_item'           => __('Voir la référence', 'modal-portfolio'),
        'add_new_item'        => __('Ajouter une référence', 'modal-portfolio'),
        'add_new'             => __('Ajouter', 'modal-portfolio'),
        'edit_item'           => __('Editer une référence', 'modal-portfolio'),
        'update_item'         => __('Mettre à jour', 'modal-portfolio'),
        'search_items'        => __('Rechercher une référence', 'modal-portfolio'),
        'not_found'           => __('Aucun résultat', 'modal-portfolio'),
        'not_found_in_trash'  => __('Aucun résultat dans la corbeille', 'modal-portfolio')
    );
    $args = array(
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail'),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-format-gallery',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => false,
        'capability_type'     => 'post',
		'register_meta_box_cb'=> 'add_portfolio_metabox', // Ajoute une metabox personnalisée
		//'rewrite'			  => array('slug' => 'portfolio') // Réécriture d'URL
    );
    register_post_type('portfolio', $args);
}
add_action( 'init', 'custom_post_type', 0 );
 
// Ajout de l'item Catégories pour gérer les portfolios
function portfolio_category() {
    register_taxonomy(
        'project-cat',
        'portfolio',
        array(
            'label' => __('Catégories', 'modal-portfolio'),
            'rewrite' => array('slug' => 'portfolio'),
            'hierarchical' => true,
			'show_admin_column' => true
        )
    );
}
add_action('init', 'portfolio_category');

// Ajout d'un sous-menu d'options et de documentation
add_action('admin_menu', 'modal_portfolio_submenu_page');
function modal_portfolio_submenu_page() {
	add_submenu_page('edit.php?post_type=portfolio', __('Options', 'modal-portfolio'), __('Options', 'modal-portfolio'), 'manage_options', 'portfolio', 'modal_portfolio_options');
	add_submenu_page('edit.php?post_type=portfolio', __('Documentation', 'modal-portfolio'), __('Documentation', 'modal-portfolio'), 'manage_options', 'portfolio-documentation', 'modal_portfolio_documentation');
}
include('modal-portfolio-options.php');
include('modal-portfolio-documentation.php');

// Ajout du filtre par catégorie (dans la section "toutes les références")
add_action('restrict_manage_posts', 'modal_portfolio_filter');
function modal_portfolio_filter() {
	global $typenow;
   
    if($typenow == 'portfolio') {
		$taxonomy = 'project-cat'; 
		wp_dropdown_categories(array(
			'show_option_all' =>  __('Voir toutes les catégories', 'modal-portfolio'),
			'taxonomy'        =>  $taxonomy,
			'name'            =>  $taxonomy,
			'orderby'         =>  'name',
			'selected'        =>  $_GET[$taxonomy],
			'hierarchical'    =>  true,
			'show_count'      =>  true,
			'hide_empty'      =>  true
		));
	}
}
add_action('request', 'modal_portfolio_filter_request');
function modal_portfolio_filter_request($request) {
    if(is_admin() && isset($request['post_type']) && $request['post_type'] == 'portfolio') {
		$taxonomy = 'project-cat';
        $request[$taxonomy] = get_term_by('id', $request[$taxonomy], $taxonomy)->slug;
    }
    return $request;
}
?>