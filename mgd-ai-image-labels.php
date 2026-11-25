<?php
/**
 * Plugin Name:       MGD AI Kennzeichnung
 * Plugin URI:        https://theme.michael-gahn.de/plugins/plugin-ki-kennzeichnung-wordpress
 * Description:       Kennzeichnet KI-bezogene Bilder in der Mediathek transparent und barrierefrei.
 * Version:           2.1.1
 * Requires at least: 6.5
 * Requires PHP:      8.1
 * Author:            Michael Gahn DESIGN
 * Author URI:        https://michael-gahn.de
 * License:           GPL-2.0-or-later
 * Update URI:        https://github.com/MichaelGahnDESIGN/MGD-AI-Kennzeichnung-WordPress
 * Text Domain:       mgd-ai-image-labels
 */

declare(strict_types=1);

// Direkte Aufrufe dieser Datei außerhalb von WordPress sicher beenden.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Zentrale Konstanten verhindern mehrfaches Initialisieren und erleichtern spätere Erweiterungen.
define( 'MGD_AI_IMAGE_LABELS_VERSION', '2.1.1' );
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

// Updater + MGD Tools Menü vom Baukasten (startet auch den Install-Melder)
use Mgd\AiImageLabels\Kit\Platform\WordPress\Setup;
use Mgd\AiImageLabels\Kit\Platform\WordPress\Tools;

MGD_AI_Image_Labels_Plugin::$updater = Setup::updater( __FILE__, 'mgd-ai-kennzeichnung-wordpress', 'wordpress', MGD_AI_IMAGE_LABELS_VERSION, 'MGD AI Kennzeichnung', Tools::url() );
// Reste vom alten Updater wegräumen, 1x pro Version
Setup::cleanupLegacy( 'mgd-ai-kennzeichnung-wordpress', MGD_AI_IMAGE_LABELS_VERSION, array( 'mgd_ail_github_latest_release', 'mgd_admin_release_mgd-ai-image-labels' ) );

// Einstellungsseite unter MGD Tools - Seiten-Kennung bleibt mgd-ai-image-labels
Setup::tools( __FILE__, 'mgd-ai-kennzeichnung-wordpress', 'wordpress', MGD_AI_IMAGE_LABELS_VERSION, 'MGD AI Kennzeichnung', MGD_AI_Image_Labels_Plugin::$updater, array(
	'slug'     => 'plugin-ki-kennzeichnung-wordpress',
	'repo'     => 'MGD-AI-Kennzeichnung-WordPress',
	'settings' => array(
		'page'   => 'mgd-ai-image-labels',
		'title'  => 'AI Kennzeichnung',
		'cap'    => 'manage_options',
		// alte Seite aus 1.1.x (Info und Updates unter Medien), Lesezeichen leiten um
		'legacy' => array( 'mgd-ai-image-labels-info' ),
		'render' => static function (): void { MGD_AI_Image_Labels_Admin_Page::render_page(); },
	),
	'license'  => false,
) );
