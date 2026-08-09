<?php
/**
 * Strukturelle Regression für die ausschließlich lokale Verwaltungs-Vorschau.
 */

declare(strict_types=1);

$root = dirname( __DIR__ );
$files = array(
	'includes/class-admin-assets.php',
	'assets/css/admin-settings.css',
	'assets/js/settings-preview.js',
	'views/admin/documentation.php',
);

foreach ( $files as $file ) {
	if ( ! is_file( $root . '/' . $file ) ) {
		throw new RuntimeException( 'Die WordPress-Edition benötigt diese getrennte Datei: ' . $file );
	}
}

$assets = file_get_contents( $root . '/includes/class-admin-assets.php' );
$script = file_get_contents( $root . '/assets/js/settings-preview.js' );

if ( false === $assets || false === $script ) {
	throw new RuntimeException( 'Die Verwaltungs-Assets konnten nicht gelesen werden.' );
}

if ( false === strpos( $assets, "media_page_mgd-ai-image-labels" ) ) {
	throw new RuntimeException( 'Die Verwaltungs-Assets müssen auf die eigene Medienseite begrenzt bleiben.' );
}

if ( false === strpos( $script, 'textContent' ) || false !== strpos( $script, 'innerHTML' ) ) {
	throw new RuntimeException( 'Die Vorschau darf Labeltexte nur sicher als TextContent verarbeiten.' );
}

echo "PASS: Die Verwaltungsoberfläche nutzt getrennte lokale Assets und eine sichere Vorschau.\n";
