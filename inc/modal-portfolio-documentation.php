<?php
// Fonction d'affichage de la page d'aide et de réglages de l'extension
function modal_portfolio_documentation() {
?>
<div class="wrap modal-portfolio-admin">
	<h2><span class="icon"><span><?php _e('Documentation', 'modal-portfolio'); ?></h2><br/>
	<div class="text">
	<?php _e('<strong>Modal portfolio</strong> est un plugin de galeries d\'images constituant un portfolio avec filtres et effets de style.<br/>L\'extension utilise un système de shortcode <strong>[modal-portfolio]</strong> avec options (décrites ci-dessous).', 'modal-portfolio'); ?>
	<br/>
	<?php _e('La documentation ci-dessous explique l\'installation et le fonctionnement global du plugin.', 'modal-portfolio'); ?>
	<br/>
	<?php _e('<em>N.B. : n\'hésitez pas à contacter <a href="http://blog.internet-formation.fr" target="_blank">Mathieu Chartier</a>, le créateur du plugin, pour de plus amples informations.</em>', 'modal-portfolio'); ?>
	<br/>
	</div>
    <div class="block">
        <div class="col first-col">
           	<h4><?php _e('Personnalisation du plugin', 'modal-portfolio'); ?></h4>
        	<p class="tr"><?php _e('1. Régler les options générales', 'modal-portfolio'); ?></p>
            <div class="tr-info">
            	<p><?php _e('Afficher les blocs et gérer les effets désirés', 'modal-portfolio'); ?></p>
                <ol>
                    <li><?php _e('Choisissez les blocs préférentiels à afficher', 'modal-portfolio'); ?></li>
                    <li><?php _e('Optimisez l\'affichage des blocs avec des effets jQuery personnalisables', 'modal-portfolio'); ?></li>
                </ol>
            </div>
        </div>
        <div class="col">
        	<h4><?php _e('Captures d\'écran', 'modal-portfolio'); ?></h4>
        	<p class="tr"><a href="<?php echo plugins_url('../screenshot-1.png',__FILE__); ?>" target="_blank"><img src="<?php echo plugins_url('../screenshot-1.png',__FILE__); ?>" alt="Capture Modal Portfolio 1"/></a></p>
        </div>
		<div class="clear"></div>
    </div>
    <div class="block">
        <div class="col first-col">
        	<p class="tr"><?php _e('2. Créer les catégories du portfolio', 'modal-portfolio'); ?></p>
            <div class="tr-info">
            	<p><?php _e('Installation simple et rapide !', 'modal-portfolio'); ?></p>
                <ol>
                    <li><?php _e('Créez des catégories parentes et enfants (si désirées).', 'modal-portfolio'); ?></li>
                    <li><?php _e('Veillez à ne pas faire trop de descendances (catégories et sous-catégories, pas plus...).', 'modal-portfolio'); ?></li>
                    <li><?php _e('N.B. : le plugin fonctionne bien sur deux niveaux mais peut avoir quelques soucis quand il y a plusieurs niveaux de sous-catégories si vous ne cochez pas les catégories parentes...', 'modal-portfolio'); ?></li>
                </ol>
            </div>
        </div>
        <div class="col">
        	<p class="tr"><a href="<?php echo plugins_url('../screenshot-2.png',__FILE__); ?>" target="_blank"><img src="<?php echo plugins_url('../screenshot-2.png',__FILE__); ?>" alt="Capture Modal Portfolio 2"/></a></p>
        </div>
		<div class="clear"></div>
    </div>
	<div class="block">
        <div class="col first-col">
        	<p class="tr"><?php _e('3. Ajouter le shortcode [modal-portfolio] adapté', 'modal-portfolio'); ?></p>
            <div class="tr-info">
            	<p><?php _e('Plusieurs options possibles', 'modal-portfolio'); ?></p>
                <ol>
                    <li><?php _e('Utilisez le shortcode [modal-portfolio] pour tout afficher.', 'modal-portfolio'); ?></li>
                    <li><?php _e('Utilisez le shortcode [modal-portfolio categorie_parente="nom_categorie"] pour n\'afficher que les références de la catégorie choisie.', 'modal-portfolio'); ?></li>
                    <li><?php _e('Utilisez le shortcode [modal-portfolio parents=1] pour afficher les catégories parentes dans les filtres (masquées par défaut).', 'modal-portfolio'); ?></li>
                    <li><?php _e('Couplez les deux options si nécessaire comme dans la capture ci-jointe.', 'modal-portfolio'); ?></li>
                </ol>
            </div>
        </div>
        <div class="col">
        	<p class="tr"><a href="<?php echo plugins_url('../screenshot-3.png',__FILE__); ?>" target="_blank"><img src="<?php echo plugins_url('../screenshot-3.png',__FILE__); ?>" alt="Capture Modal Portfolio 3"/></a></p>
        </div>
		<div class="clear"></div>
    </div>
	<div class="block">
        <div class="col first-col">
        	<p class="tr"><?php _e('4. Ajouter les références', 'modal-portfolio'); ?></p>
            <div class="tr-info">
            	<p><?php _e('Simple et rapide :', 'modal-portfolio'); ?></p>
                <ol>
                    <li><?php _e('Ajouter un titre à votre item de portfolio.', 'modal-portfolio'); ?></li>
                    <li><?php _e('Remplissez la description si vous utilisez la fonctionnalité.', 'modal-portfolio'); ?></li>
                    <li><?php _e('Ajouter un titre pour le survol des vignettes (optionnel).', 'modal-portfolio'); ?></li>
                    <li><?php _e('Choisissez l\'image à la Une comme image de portfolio ou de galerie.', 'modal-portfolio'); ?></li>
                </ol>
            </div>
        </div>
        <div class="col">
        	<p class="tr"><a href="<?php echo plugins_url('../screenshot-4.png',__FILE__); ?>" target="_blank"><img src="<?php echo plugins_url('../screenshot-4.png',__FILE__); ?>" alt="Capture Modal Portfolio 4"/></a></p>
        </div>
		<div class="clear"></div>
    </div>
</div>
<?php
} // Fin de la fonction Callback
?>