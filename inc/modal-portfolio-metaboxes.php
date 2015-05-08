<?php
// Gestion de la metabox personnalisée
function add_portfolio_metabox() {
	add_meta_box('portfolio_ref_title', __('Titre de la vignette'), 'portfolio_ref_title', 'portfolio', 'normal', 'high');
}

// Ajout du formulaire correspondant à la metabox personnalisée (callback)
function portfolio_ref_title() {
	global $post;

	// Noncename nécessaire pour savoir d'où proviennent les données
	wp_nonce_field('portfolio_metabox', 'portfolio_metabox_nonce');
	
	// Récupère les données si le champ a déjà été rempli...
	$title_portfolio = get_post_meta($post->ID, 'portfolio_title', true);
	
	// Affiche le champ de formulaire supplémentaire
	_e('<p><em>Titre affiché lors du survol des vignettes dans la page des références (Porfolio)</em></p>', 'modal-portfolio');
	echo '<input type="text" name="portfolio_title" value="'.esc_attr($title_portfolio).'" class="widefat" />';
}

// Gestion de l'enregistrement de la metabox personnalisée
function save_portfolio_metabox() {
	global $post;

	// Vérifie que le noncename est valide !
	if(!wp_verify_nonce($_POST['portfolio_metabox_nonce'], 'portfolio_metabox')) {
		return $post->ID;
	}

	// Vérifie les permissions des utilisateurs
	if(!current_user_can('edit_post', $post->ID)) {
		return $post->ID;
	}

	// Récupère l'information du champ personnalisé
	$titre_vignette = sanitize_text_field($_POST['portfolio_title']);

	// Adapte les données en fonction de l'existence du champ personnalisé
	if(get_post_meta($post->ID, 'portfolio_title', false)) {
		update_post_meta($post->ID, 'portfolio_title', $titre_vignette);
	} else {
		add_post_meta($post->ID, 'portfolio_title', $titre_vignette);
	}
	
	// Supprime le champ personnalisé (donnée uniquement) s'il est vide
	if(!$titre_vignette) {
		delete_post_meta($post->ID, 'portfolio_title');
	}
}
add_action('save_post', 'save_portfolio_metabox');
?>