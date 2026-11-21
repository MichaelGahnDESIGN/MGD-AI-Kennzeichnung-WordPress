<?php
/**
 * Plugin Name:       MGD AI Kennzeichnung WordPress
 * Plugin URI:         https://github.com/MichaelGahnDESIGN/MGD-AI-Kennzeichnung-WordPress
 * Description:       Sichere Grundlage für die transparente Kennzeichnung von KI-bezogenen Bildern in der WordPress-Mediathek.
 * Version:            1.1.0
 * Requires at least:  6.0
 * Requires PHP:       8.1
 * Author:             Michael Gahn DESIGN
 * Author URI:         https://michael-gahn.de/
 * Text Domain:        mgd-ai-image-labels
 * Update URI:         https://github.com/MichaelGahnDESIGN/MGD-AI-Kennzeichnung-WordPress
 *
 * Das Plugin ergänzt die WordPress-Mediathek um eine sichere Auswahl für
 * KI-Kennzeichnungen und gibt sie bei passenden WordPress- und Divi-5-Bildern
 * lokal sowie barrierefrei aus. Inhalte und Divi-Layouts werden nicht gespeichert.
 */

declare(strict_types=1);

// Direkte Aufrufe dieser Datei außerhalb von WordPress sicher beenden.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Zentrale Konstanten verhindern mehrfaches Initialisieren und erleichtern spätere Erweiterungen.
define( 'MGD_AI_IMAGE_LABELS_VERSION', '1.1.0' );
define( 'MGD_AI_IMAGE_LABELS_FILE', __FILE__ );
define( 'MGD_AI_IMAGE_LABELS_DIR', plugin_dir_path( __FILE__ ) );
define( 'MGD_AI_IMAGE_LABELS_URL', plugin_dir_url( __FILE__ ) );

require_once MGD_AI_IMAGE_LABELS_DIR . 'includes/class-plugin.php';

// Der Startpunkt registriert die klar getrennten, sicheren Plugin-Komponenten im WordPress-Lebenszyklus.
MGD_AI_Image_Labels_Plugin::boot();

// Baukasten aus MichaThemeV5-Pro > includes/Kit (bin/build-plugin-kit.php)
spl_autoload_register( static function ( string $class ): void {
	$prefix = 'Mgd\\AiImageLabels\\Kit\\';
	if ( str_starts_with( $class, $prefix ) ) {
		$file = MGD_AI_IMAGE_LABELS_DIR . 'includes/Kit/' . str_replace( '\\', '/', substr( $class, strlen( $prefix ) ) ) . '.php';
		if ( is_file( $file ) ) {
			require $file;
		}
	}
} );

// Updater vom Baukasten, startet auch den Install-Melder - alte GitHub-Updater (eigener + Admin-Tools) sind abgeschaltet
MGD_AI_Image_Labels_Plugin::$updater = \Mgd\AiImageLabels\Kit\Platform\WordPress\Setup::updater( __FILE__, MGD_AI_Image_Labels_Plugin::PRODUCT, 'wordpress', MGD_AI_IMAGE_LABELS_VERSION, 'MGD AI Kennzeichnung', admin_url( 'upload.php?page=' . MGD_AI_Image_Labels_Plugin::INFO_PAGE ) );
// Reste vom alten Updater wegräumen, 1x pro Version
\Mgd\AiImageLabels\Kit\Platform\WordPress\Setup::cleanupLegacy( MGD_AI_Image_Labels_Plugin::PRODUCT, MGD_AI_IMAGE_LABELS_VERSION, array( 'mgd_ail_github_latest_release', 'mgd_admin_release_mgd-ai-image-labels' ) );

// Link Einstellungen in der Plugin-Liste (kam vorher von den Admin-Tools)
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), static function ( array $links ): array {
	array_unshift( $links, '<a href="' . esc_url( admin_url( 'upload.php?page=mgd-ai-image-labels' ) ) . '">Einstellungen</a>' );
	return $links;
} );
