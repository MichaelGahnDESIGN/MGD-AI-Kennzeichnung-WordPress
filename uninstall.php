<?php
/**
 * Deinstallieren: Abmelden bei theme.michael-gahn.de.
 *
 * Kennzeichnungen an den Bildern und die Einstellungen bleiben erhalten.
 *
 * @package MGD_AI_Image_Labels
 */

declare(strict_types=1);

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Kit laden wie in der Haupt-Datei
spl_autoload_register( static function ( string $class ): void {
	$prefix = 'Mgd\\AiImageLabels\\Kit\\';
	if ( str_starts_with( $class, $prefix ) ) {
		$file = __DIR__ . '/includes/Kit/' . str_replace( '\\', '/', substr( $class, strlen( $prefix ) ) ) . '.php';
		if ( is_file( $file ) ) {
			require $file;
		}
	}
} );

// Eintrag auf der Plattform weg + Kit-Optionen vom Produkt, wirft nie
\Mgd\AiImageLabels\Kit\Platform\WordPress\Setup::uninstall( 'mgd-ai-kennzeichnung-wordpress', 'wordpress' );
