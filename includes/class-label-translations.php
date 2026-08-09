<?php
/**
 * Zentrale, lokale Texte für sichtbare KI-Bildkennzeichnungen.
 *
 * Die Klasse übersetzt ausschließlich die vier festen Statuswerte des Plugins.
 * Sie fragt keine externen Dienste ab und speichert keine Besucherdaten.
 * Dadurch ist die Label-Ausgabe bei WordPress-, Divi- und Shortcode-Bildern
 * immer identisch und unabhängig von einer Übersetzungsdatei verfügbar.
 *
 * @package MGD_AI_Image_Labels
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Löst die gewünschte Ausgabe in Deutsch oder Englisch sicher auf. */
final class MGD_AI_Image_Labels_Label_Translations {

	/** @var array<string, array<string, string>> Feste, lokal gepflegte Label-Texte. */
	private const LABELS = array(
		'de' => array(
			'generated'           => 'MIT KI ERSTELLT',
			'partially-generated' => 'TEILWEISE KI-GENERIERT',
			'modified'            => 'MIT KI BEARBEITET',
			'deepfake'            => 'KI-DEEPFAKE',
		),
		'en' => array(
			'generated'           => 'AI GENERATED',
			'partially-generated' => 'AI PARTIALLY GENERATED',
			'modified'            => 'AI MODIFIED',
			'deepfake'            => 'AI DEEPFAKE',
		),
	);

	/** Liefert den passenden sichtbaren Text oder für einen ungültigen Status einen Leerwert. */
	public static function get_label( string $status ): string {
		$language = self::get_language();

		return self::LABELS[ $language ][ $status ] ?? '';
	}

	/** Liefert alle Texte einer Sprache für eine sichere, rein lokale Vorschau. */
	public static function get_labels( string $language = '' ): array {
		if ( ! in_array( $language, array( 'de', 'en' ), true ) ) {
			$language = self::get_language();
		}

		return self::LABELS[ $language ];
	}

	/** Bestimmt die Einstellung oder leitet im Automatikmodus aus WordPress ab. */
	public static function get_language(): string {
		$options = MGD_AI_Image_Labels_Plugin_Options::get_options();
		$setting = $options['language'] ?? 'auto';

		if ( 'de' === $setting || 'en' === $setting ) {
			return $setting;
		}

		$locale = function_exists( 'determine_locale' )
			? determine_locale()
			: ( function_exists( 'get_locale' ) ? get_locale() : 'en_US' );

		return is_string( $locale ) && 0 === strpos( strtolower( $locale ), 'de' ) ? 'de' : 'en';
	}
}
