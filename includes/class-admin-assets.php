<?php
/**
 * Lokale Assets für die Verwaltungsansicht des Plugins.
 *
 * Styles und JavaScript werden ausschließlich auf der eigenen Medienseite
 * geladen. Das schützt die WordPress-Administration vor Seiteneffekten und
 * hält die zusätzliche Nutzlast sehr klein.
 *
 * @package MGD_AI_Image_Labels
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Kapselt das gezielte Laden von Styles und JavaScript im Plugin-Backend. */
final class MGD_AI_Image_Labels_Admin_Assets {

	/** Registriert die gezielte WordPress-Admin-Einbindung. */
	public static function register(): void {
		add_action( 'admin_enqueue_scripts', array( self::class, 'enqueue' ) );
	}

	/**
	 * Lädt ausschließlich auf der eigenen Medienseite lokale, versionierte Assets.
	 *
	 * @param string $hook_suffix Aktueller WordPress-Admin-Hook.
	 */
	public static function enqueue( string $hook_suffix ): void {
		if ( 'media_page_mgd-ai-image-labels' !== $hook_suffix ) {
			return;
		}

		wp_enqueue_style(
			'mgd-ail-admin-settings',
			MGD_AI_IMAGE_LABELS_URL . 'assets/css/admin-settings.css',
			array(),
			MGD_AI_IMAGE_LABELS_VERSION
		);

		wp_enqueue_script(
			'mgd-ail-settings-preview',
			MGD_AI_IMAGE_LABELS_URL . 'assets/js/settings-preview.js',
			array(),
			MGD_AI_IMAGE_LABELS_VERSION,
			true
		);
	}
}
