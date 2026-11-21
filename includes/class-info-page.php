<?php
/**
 * Seite "Info und Updates" unter Medien.
 *
 * @package MGD_AI_Image_Labels
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Dashboard vom Baukasten: Info, Updates, Weitere Plugins, Installation melden - Lizenz bleibt aus
final class MGD_AI_Image_Labels_Info_Page {

	// Katalog-Kennung vom eigenen Plugin auf theme.michael-gahn.de
	public const SELF_SLUG = 'plugin-ki-kennzeichnung-wordpress';

	public const SELF_REPO = 'MGD-AI-Kennzeichnung-WordPress';

	public static function register(): void {
		add_action( 'admin_menu', array( self::class, 'menu' ) );
	}

	public static function menu(): void {
		add_media_page(
			'Info und Updates',
			'Info und Updates',
			'manage_options',
			MGD_AI_Image_Labels_Plugin::INFO_PAGE,
			array( self::class, 'render' )
		);
	}

	public static function render(): void {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( 'Nicht berechtigt.', '', array( 'response' => 403 ) );
		}
		$list  = \Mgd\AiImageLabels\Kit\Platform\WordPress\Setup::recommendations( MGD_AI_Image_Labels_Plugin::PRODUCT, 'wordpress', self::SELF_SLUG, self::fallback(), self::SELF_REPO );
		// parent leer = kein eigener Menüpunkt, Lizenz aus
		$dash = \Mgd\AiImageLabels\Kit\Platform\WordPress\Setup::dashboard( MGD_AI_Image_Labels_Plugin::PRODUCT, 'wordpress', MGD_AI_IMAGE_LABELS_VERSION, 'MGD AI Kennzeichnung', MGD_AI_Image_Labels_Plugin::$updater, $list, false, '' );
		if ( null === $dash ) {
			echo '<div class="wrap"><p>Die Seite konnte gerade nicht geladen werden.</p></div>';
			return;
		}
		$dash->page();
	}

	/**
	 * Ersatzliste aus plugin-catalog/plugins.json, falls theme.michael-gahn.de nicht antwortet.
	 *
	 * @return list<array{slug:string,name:string,description:string,version:string}>
	 */
	public static function fallback(): array {
		$raw  = file_get_contents( MGD_AI_IMAGE_LABELS_DIR . 'includes/plugin-catalog/plugins.json' );
		$data = is_string( $raw ) ? json_decode( $raw, true ) : null;
		$out  = array();
		foreach ( is_array( $data ) ? $data : array() as $repo => $row ) {
			if ( ! is_array( $row ) || empty( $row['slug'] ) ) {
				continue;
			}
			$out[] = array(
				'slug'        => (string) $row['slug'],
				'name'        => (string) ( $row['name'] ?? '' ),
				'description' => (string) ( $row['description'] ?? '' ),
				'version'     => '',
				'repo'        => (string) $repo,
			);
		}
		return $out;
	}
}
