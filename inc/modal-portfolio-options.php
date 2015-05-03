<?php
// Mise à jour des données par défaut
function modal_portfolio_update() {
	// Réglages de base
	$modal_portfolio_filters		= sanitize_text_field($_POST['modal_portfolio_filters']);
	$modal_portfolio_allFilter		= sanitize_text_field($_POST['modal_portfolio_allFilter']);
	$modal_portfolio_text_modal		= sanitize_text_field($_POST['modal_portfolio_text_modal']);
	$modal_portfolio_title_modal	= sanitize_text_field($_POST['modal_portfolio_title_modal']);
	$modal_portfolio_title_thumbnail= sanitize_text_field($_POST['modal_portfolio_title_thumbnail']);
	$modal_portfolio_close_button	= sanitize_text_field($_POST['modal_portfolio_close_button']);
	$modal_portfolio_css_path		= sanitize_text_field($_POST['modal_portfolio_css_path']);
	
	// Réglages de effets jQuery
	$modalOpacity		= sanitize_text_field($_POST['modal_portfolio_modalOpacity']);
	$overlayCloseClick	= sanitize_text_field($_POST['modal_portfolio_overlayCloseClick']);
	$colorOverlay		= sanitize_text_field($_POST['modal_portfolio_colorOverlay']);
	$overlayDuration	= sanitize_text_field($_POST['modal_portfolio_overlayDuration']);
	$hideShowDuration	= sanitize_text_field($_POST['modal_portfolio_hideShowDuration']);
	$openEffect			= sanitize_text_field($_POST['modal_portfolio_openEffect']);
	$thumbnailsEffect	= sanitize_text_field($_POST['modal_portfolio_thumbnailsEffect']);
	$openUpEffect		= sanitize_text_field($_POST['modal_portfolio_openUpEffect']);
	$openDownEffect		= sanitize_text_field($_POST['modal_portfolio_openDownEffect']);
	$openUpDuration		= sanitize_text_field($_POST['modal_portfolio_openUpDuration']);
	$openDownDuration	= sanitize_text_field($_POST['modal_portfolio_openDownDuration']);

	// Mise à jour des informations
	update_option("modal_portfolio_filters", $modal_portfolio_filters);
	update_option("modal_portfolio_allFilter", $modal_portfolio_allFilter);
	update_option("modal_portfolio_text_modal", $modal_portfolio_text_modal);
	update_option("modal_portfolio_title_modal", $modal_portfolio_title_modal);
	update_option("modal_portfolio_title_thumbnail", $modal_portfolio_title_thumbnail);
	update_option("modal_portfolio_close_button", $modal_portfolio_close_button);
	update_option("modal_portfolio_css_path", $modal_portfolio_css_path);
	update_option("modal_portfolio_modalOpacity", $modalOpacity);
	update_option("modal_portfolio_overlayCloseClick", $overlayCloseClick);
	update_option("modal_portfolio_colorOverlay", $colorOverlay);
	update_option("modal_portfolio_overlayDuration", $overlayDuration);
	update_option("modal_portfolio_hideShowDuration", $hideShowDuration);
	update_option("modal_portfolio_openEffect", $openEffect);
	update_option("modal_portfolio_thumbnailsEffect", $thumbnailsEffect);
	update_option("modal_portfolio_openUpEffect", $openUpEffect);
	update_option("modal_portfolio_openDownEffect", $openDownEffect);
	update_option("modal_portfolio_openUpDuration", $openUpDuration);
	update_option("modal_portfolio_openDownDuration", $openDownDuration);
}

// Fonction CallBack (de add_submenu_page) pour les options du plugin
function modal_portfolio_options() {
	// Déclenche la fonction de mise à jour (upload)
	if(isset($_POST['modal_portfolio_action']) && $_POST['modal_portfolio_action'] == __('Enregistrer')) {
		modal_portfolio_update();
	}

	/*---------------------------------------------------------------------*/
	/*----------------------- Affichage des options -----------------------*/
	/*---------------------------------------------------------------------*/
	echo '<div class="wrap modal-portfolio-admin">';
	echo '<h2 class="icon">'; _e('Réglages de Modal Portfolio', 'modal-portfolio'); echo '</h2><br/>';
	echo '<div class="text">';
	_e('<strong>Modal portfolio</strong> est une extension destinée à afficher une galerie photo (portfolio) avec des modales (pop-in) contenant éventuellement une description personnalisable.', 'modal-portfolio'); echo "<br/>";
	_e('Il suffit d\'utiliser le shortcode <strong>[modal-portfolio]</strong> avec ou sans options pour afficher les références (<em>voir la documentation pour les options complémentaires</em>).', 'modal-portfolio'); echo "<br/>";
	_e('Plusieurs options sont permises afin de personnaliser au mieux l\'affichage dans les modales :', 'modal-portfolio'); echo '<br/>';
	echo '<ol>';
	echo '<li>'; _e('Afficher ou non le titre et la description dans la modale', 'modal-portfolio'); echo '</li>';
	echo '<li>'; _e('Afficher ou non le titre de vignette au survol', 'modal-portfolio'); echo '</li>';
	echo '<li>'; _e('Afficher ou non le bouton "Fermer" dans la fenêtre modale', 'modal-portfolio'); echo '</li>';
	echo '</ol>';
	_e('<em>N.B. : cette extension n\'est pas parfaite, n\'hésitez pas à contacter <a href="http://blog.internet-formation.fr" target="_blank">Mathieu Chartier</a>, le créateur du plugin, pour de plus amples informations.</em>', 'modal-portfolio'); 
	echo '<br/>';
	echo '</div>';
?>
<script type="application/javascript">
    jQuery(document).ready(function($) {  
		$("#slider-range-min").slider({
			range: "min",
			value: <?php echo get_option("modal_portfolio_modalOpacity"); ?>,
			min: 0,
			max: 100,
			slide: function(event, ui) {
				$("#modal_portfolio_modalOpacity").val(ui.value);
			}
		});
		$("#modal_portfolio_modalOpacity").val($("#slider-range-min").slider("value"));

		$("#slider-range-min1").slider({
			range: "min",
			value: <?php echo get_option("modal_portfolio_overlayDuration"); ?>,
			min: 0,
			max: 5000,
			step: 10,
			slide: function(event, ui) {
				$("#modal_portfolio_overlayDuration").val(ui.value);
			}
		});
		$("#modal_portfolio_overlayDuration").val($("#slider-range-min1").slider("value"));

		$("#slider-range-min2").slider({
			range: "min",
			value: <?php echo get_option("modal_portfolio_hideShowDuration"); ?>,
			min: 0,
			max: 5000,
			step: 10,
			slide: function(event, ui) {
				$("#modal_portfolio_hideShowDuration").val(ui.value);
			}
		});
		$("#modal_portfolio_hideShowDuration").val($("#slider-range-min2").slider("value"));
		
		$("#slider-range-min3").slider({
			range: "min",
			value: <?php echo get_option("modal_portfolio_openUpDuration"); ?>,
			min: 0,
			max: 5000,
			step: 10,
			slide: function(event, ui) {
				$("#modal_portfolio_openUpDuration").val(ui.value);
			}
		});
		$("#modal_portfolio_openUpDuration").val($("#slider-range-min3").slider("value"));
		
		$("#slider-range-min4").slider({
			range: "min",
			value: <?php echo get_option("modal_portfolio_openDownDuration"); ?>,
			min: 0,
			max: 5000,
			step: 10,
			slide: function(event, ui) {
				$("#modal_portfolio_openDownDuration").val(ui.value);
			}
		});
		$("#modal_portfolio_openDownDuration").val($("#slider-range-min4").slider("value"));
	});
</script>
<div class="block">
    <div class="col first-col">
    <!-- Formulaire de mise à jour des données -->
    <form method="post" action="">
        <h4><?php _e('Paramétrage général', 'modal-portfolio'); ?></h4>
        <p class="tr">
            <select name="modal_portfolio_filters" id="modal_portfolio_filters">
                <option value="1" <?php if(get_option("modal_portfolio_filters") == true) { echo 'selected="selected"'; } ?>><?php _e('Oui'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_filters") == false) { echo 'selected="selected"'; } ?>><?php _e('Non'); ?></option>
            </select>
            <label for="modal_portfolio_filters"><strong><?php _e('Afficher les filtres ?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('L\'option permet de masquer les filtres de catégories des portfolios.', 'modal-portfolio'); ?></em>
        </p>
        <p class="tr">
            <select name="modal_portfolio_allFilter" id="modal_portfolio_allFilter">
                <option value="1" <?php if(get_option("modal_portfolio_allFilter") == true) { echo 'selected="selected"'; } ?>><?php _e('Oui'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_allFilter") == false) { echo 'selected="selected"'; } ?>><?php _e('Non'); ?></option>
            </select>
            <label for="modal_portfolio_allFilter"><strong><?php _e('Afficher le filtre "Tout" ?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('L\'option permet de masquer le filtre qui affiche toutes les références.', 'modal-portfolio'); ?></em>
        </p>
        <p class="tr">
            <select name="modal_portfolio_text_modal" id="modal_portfolio_text_modal">
                <option value="1" <?php if(get_option("modal_portfolio_text_modal") == true) { echo 'selected="selected"'; } ?>><?php _e('Oui'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_text_modal") == false) { echo 'selected="selected"'; } ?>><?php _e('Non'); ?></option>
            </select>
            <label for="modal_portfolio_text_modal"><strong><?php _e('Afficher la description dans la fenêtre modale ?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('L\'option permet de modifier la fenêtre modale pour afficher l\'image avec ou sans description.', 'modal-portfolio'); ?></em>
        </p>
        <p class="tr">
            <select name="modal_portfolio_title_modal" id="modal_portfolio_title_modal">
                <option value="1" <?php if(get_option("modal_portfolio_title_modal") == true) { echo 'selected="selected"'; } ?>><?php _e('Oui'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_title_modal") == false) { echo 'selected="selected"'; } ?>><?php _e('Non'); ?></option>
            </select>
            <label for="modal_portfolio_title_modal"><strong><?php _e('Afficher le titre dans la fenêtre modale ?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('L\'option permet de modifier la fenêtre modale pour afficher l\'image avec ou sans titre.', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr">
            <select name="modal_portfolio_title_thumbnail" id="modal_portfolio_title_thumbnail">
                <option value="1" <?php if(get_option("modal_portfolio_title_thumbnail") == true) { echo 'selected="selected"'; } ?>><?php _e('Oui'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_title_thumbnail") == false) { echo 'selected="selected"'; } ?>><?php _e('Non'); ?></option>
            </select>
            <label for="modal_portfolio_title_thumbnail"><strong><?php _e('Afficher le titre et la catégorie au survol des vignettes ?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('L\'option permet de masquer les effets de texte au survol des vignettes.', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr">
            <select name="modal_portfolio_close_button" id="modal_portfolio_close_button">
                <option value="1" <?php if(get_option("modal_portfolio_close_button") == true) { echo 'selected="selected"'; } ?>><?php _e('Oui'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_close_button") == false) { echo 'selected="selected"'; } ?>><?php _e('Non'); ?></option>
            </select>
            <label for="modal_portfolio_close_button"><strong><?php _e('Afficher le bouton "Fermer" dans la fenêtre modale ?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('L\'option permet de masquer le bouton de fermeture.', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr">
			<input type="text" name="modal_portfolio_css_path" id="modal_portfolio_css_path" value="<?php echo get_option("modal_portfolio_css_path"); ?>" />
            <label for="modal_portfolio_css_path"><strong><?php _e('Chemin du fichier CSS du thème', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('L\'option permet de choisir une autre feuille de style si désirée (laisser vide pour n\'utiliser aucun CSS propre au plugin)', 'modal-portfolio'); ?><br/><?php echo plugins_url().'/modal-portfolio/css/portfolio.css '.__('par défaut.', 'modal-portfolio'); ?></em>
        </p>
		
    	<p class="submit">
        	<input type="submit" name="modal_portfolio_action" class="button-primary" value="<?php _e('Enregistrer', 'modal-portfolio'); ?>" />
        </p>
	</div>
	
	<div class="col">
        <h4><?php _e('Personnalisation des effets jQuery', 'modal-portfolio'); ?></h4>
		<p class="tr3">
			<span id="slider-range-min"></span>
            <input type="text" value="<?php echo get_option("modal_portfolio_modalOpacity"); ?>" name="modal_portfolio_modalOpacity" id="modal_portfolio_modalOpacity"/>
            <label for="modal_portfolio_modalOpacity"><strong><?php _e('Niveau d\'opacité du fond (overlay)', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Possibilité de masquer le fond en mettant la valeur à 0.', 'modal-portfolio'); ?></em>
        </p>
        <p class="tr">
            <select name="modal_portfolio_overlayCloseClick" id="modal_portfolio_overlayCloseClick">
                <option value="1" <?php if(get_option("modal_portfolio_overlayCloseClick") == true) { echo 'selected="selected"'; } ?>><?php _e('Oui'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_overlayCloseClick") == false) { echo 'selected="selected"'; } ?>><?php _e('Non'); ?></option>
            </select>
            <label for="modal_portfolio_overlayCloseClick"><strong><?php _e('Fermer la modale en cliquant sur le fond (overlay) ?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('L\'option permet de fermer la fenêtre modale sans appuyer sur le bouton "Fermer"', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr2">
            <input type="text" id="modal_portfolio_colorOverlay" name="modal_portfolio_colorOverlay" value="<?php echo get_option('modal_portfolio_colorOverlay'); ?>"/>
            <label for="modal_portfolio_colorOverlay"><strong><?php _e('Couleur du fond (overlay)', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Il est possible de masquer l\'overlay en vidant le champ.', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr3">
			<span id="slider-range-min1"></span>
            <input type="text" name="modal_portfolio_overlayDuration" id="modal_portfolio_overlayDuration"/>
            <label for="modal_portfolio_overlayDuration"><strong><?php _e('Durée d\'affichage du fond (en ms)', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Sélectionnez le nombre de millisecondes utiles pour afficher le fond', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr3">
			<span id="slider-range-min2"></span>
            <input type="text" name="modal_portfolio_hideShowDuration" id="modal_portfolio_hideShowDuration"/>
            <label for="modal_portfolio_hideShowDuration"><strong><?php _e('Durée d\'affichage de la modale et des contenus (en ms)', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Sélectionnez le nombre de millisecondes utiles pour afficher la modale et les contenus', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr">
            <select name="modal_portfolio_openEffect" id="modal_portfolio_openEffect">
                <option value="aucun" <?php if(get_option("modal_portfolio_openEffect") == "aucun") { echo 'selected="selected"'; } ?>><?php _e('Aucun', 'modal-portfolio'); ?></option>
                <option value="fadeIn" <?php if(get_option("modal_portfolio_openEffect") == "fadeIn") { echo 'selected="selected"'; } ?>><?php _e('fadeIn', 'modal-portfolio'); ?></option>
                <option value="fadeOut" <?php if(get_option("modal_portfolio_openEffect") == "fadeOut") { echo 'selected="selected"'; } ?>><?php _e('fadeOut', 'modal-portfolio'); ?></option>
                <option value="slideUp" <?php if(get_option("modal_portfolio_openEffect") == "slideUp") { echo 'selected="selected"'; } ?>><?php _e('SlideUp', 'modal-portfolio'); ?></option>
                <option value="slideDown" <?php if(get_option("modal_portfolio_openEffect") == "slideDown") { echo 'selected="selected"'; } ?>><?php _e('slideDown', 'modal-portfolio'); ?></option>
            </select>
            <label for="modal_portfolio_openEffect"><strong><?php _e('Effet de style appliqué à l\'ouverture de la fenêtre modale', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Seul l\'effet jQuery d\'ouverture prend en compte cette option !', 'modal-portfolio'); ?></em>
        </p>
        <p class="tr">
            <select name="modal_portfolio_thumbnailsEffect" id="modal_portfolio_thumbnailsEffect">
                <option value="1" <?php if(get_option("modal_portfolio_thumbnailsEffect") == true) { echo 'selected="selected"'; } ?>><?php _e('Oui', 'modal-portfolio'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_thumbnailsEffect") == false) { echo 'selected="selected"'; } ?>><?php _e('Non', 'modal-portfolio'); ?></option>
            </select>
            <label for="modal_portfolio_thumbnailsEffect"><strong><?php _e('Appliquer un effet pour le titre des vignettes ?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Bloque les effets jQuery sur les titres de vignettes', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr">
            <select name="modal_portfolio_openUpEffect" id="modal_portfolio_openUpEffect">
			<?php
				// Liste des effets de jQuery easing
				$easingEffects = array(__("Aucun", 'modal-portfolio'), "jswing", "def", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeInSine", "easeOutSine", "easeInOutSine", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeInBack", "easeOutBack", "easeInOutBack", "easeInBounce", "easeOutBounce", "easeInOutBounce");
				foreach($easingEffects as $effect) {
			?>
                <option value="<?php echo $effect; ?>" <?php if(get_option("modal_portfolio_openUpEffect") == $effect) { echo 'selected="selected"'; } ?>><?php echo $effect; ?></option>
			<?php
				}
			?>
            </select>
            <label for="modal_portfolio_openUpEffect"><strong><?php _e('Premier effet appliqué au texte de la vignette', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Effet appliqué au survol de la vignette !', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr3">
			<span id="slider-range-min3"></span>
            <input type="text" name="modal_portfolio_openUpDuration" id="modal_portfolio_openUpDuration"/>
            <label for="modal_portfolio_openUpDuration"><strong><?php _e('Durée du premier effet (en ms)', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Sélectionnez le nombre de millisecondes utiles pour le premier effet.', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr">
            <select name="modal_portfolio_openDownEffect" id="modal_portfolio_openDownEffect">
			<?php
				// Liste des effets de jQuery easing
				$easingEffects = array(__("Aucun", 'modal-portfolio'), "jswing", "def", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeInSine", "easeOutSine", "easeInOutSine", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeInBack", "easeOutBack", "easeInOutBack", "easeInBounce", "easeOutBounce", "easeInOutBounce");
				foreach($easingEffects as $effect) {
			?>
                <option value="<?php echo $effect; ?>" <?php if(get_option("modal_portfolio_openDownEffect") == $effect) { echo 'selected="selected"'; } ?>><?php echo $effect; ?></option>
			<?php
				}
			?>
            </select>
            <label for="modal_portfolio_openDownEffect"><strong><?php _e('Second effet appliqué au texte de la vignette', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Effet appliqué lorsque l\'on quitte le survol de la vignette !', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr3">
			<span id="slider-range-min4"></span>
            <input type="text" name="modal_portfolio_openDownDuration" id="modal_portfolio_openDownDuration"/>
            <label for="modal_portfolio_openDownDuration"><strong><?php _e('Durée du second effet (en ms)', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Sélectionnez le nombre de millisecondes utiles pour le second effet.', 'modal-portfolio'); ?></em>
        </p>
    </form>
	</div>
	<div class="clear"></div>
</div>
<?php
echo '</div>'; // Fin de la page d'admin
}
?>