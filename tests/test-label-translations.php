<?php
/**
 * Regressionstest für die zentrale, lokale Sprachauflösung der Labeltexte.
 *
 * Der Test hält die Ausgabe vollständig ohne WordPress-Installation prüfbar.
 */

declare(strict_types=1);

define( 'ABSPATH', __DIR__ . '/' );

$GLOBALS['mgd_ail_translation_options'] = array( 'language' => 'auto' );
$GLOBALS['mgd_ail_translation_locale']  = 'de_DE';

function get_option( string $option, $default = false ) {
	return 'mgd_ail_display_options' === $option ? $GLOBALS['mgd_ail_translation_options'] : $default;
}

function determine_locale(): string {
	return $GLOBALS['mgd_ail_translation_locale'];
}

require_once dirname( __DIR__ ) . '/includes/class-plugin-options.php';
require_once dirname( __DIR__ ) . '/includes/class-label-translations.php';

function mgd_ail_translation_assert_same( string $expected, string $actual, string $message ): void {
	if ( $expected !== $actual ) {
		throw new RuntimeException( $message . ' Erwartet: ' . $expected . '; erhalten: ' . $actual );
	}
}

mgd_ail_translation_assert_same( 'MIT KI ERSTELLT', MGD_AI_Image_Labels_Label_Translations::get_label( 'generated' ), 'Die automatische deutsche WordPress-Sprache wird übernommen.' );

$GLOBALS['mgd_ail_translation_options'] = array( 'language' => 'en' );
mgd_ail_translation_assert_same( 'AI GENERATED', MGD_AI_Image_Labels_Label_Translations::get_label( 'generated' ), 'Die englische Ausgabe überschreibt die WordPress-Sprache.' );

$GLOBALS['mgd_ail_translation_options'] = array( 'language' => 'de' );
mgd_ail_translation_assert_same( 'MIT KI BEARBEITET', MGD_AI_Image_Labels_Label_Translations::get_label( 'modified' ), 'Die deutsche Ausgabe übersetzt bearbeitete Bilder.' );
mgd_ail_translation_assert_same( 'TEILWEISE KI-GENERIERT', MGD_AI_Image_Labels_Label_Translations::get_label( 'partially-generated' ), 'Die deutsche Ausgabe übersetzt teilweise generierte Bilder.' );
mgd_ail_translation_assert_same( 'KI-DEEPFAKE', MGD_AI_Image_Labels_Label_Translations::get_label( 'deepfake' ), 'Die deutsche Ausgabe übersetzt Deepfakes.' );
mgd_ail_translation_assert_same( '', MGD_AI_Image_Labels_Label_Translations::get_label( 'none' ), 'Nicht gekennzeichnete Bilder erhalten keinen Labeltext.' );

echo "PASS: Labeltexte werden zentral und nachvollziehbar in Deutsch oder Englisch ausgegeben.\n";
