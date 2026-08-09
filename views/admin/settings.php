<?php
/**
 * Ansicht: Globale Standards und lokale Live-Vorschau.
 *
 * @var array<string, string> $options Bereits streng validierte Anzeigeoptionen.
 *
 * @package MGD_AI_Image_Labels
 */

declare(strict_types=1);

$resolved_language = MGD_AI_Image_Labels_Label_Translations::get_language();
$labels_de         = MGD_AI_Image_Labels_Label_Translations::get_labels( 'de' );
$labels_en         = MGD_AI_Image_Labels_Label_Translations::get_labels( 'en' );
?>
<div class="mgd-ail-admin-grid">
	<div>
		<section class="mgd-ail-admin-card">
			<h2>Globale Label-Standards</h2>
			<p>Diese Werte gelten als Ausgangspunkt für alle Kennzeichnungen. Pro Bild bleiben Status, Position und Glas-Variante weiterhin separat in der Mediathek auswählbar.</p>

			<form action="options.php" method="post" data-mgd-ail-settings-form>
				<?php settings_fields( MGD_AI_Image_Labels_Plugin_Options::OPTION_NAME ); ?>
				<?php do_settings_sections( MGD_AI_Image_Labels_Plugin_Options::OPTION_NAME ); ?>

				<table class="form-table" role="presentation">
					<tr>
						<th scope="row"><label for="mgd-ail-language">Sprache der Labels</label></th>
						<td>
							<select id="mgd-ail-language" name="mgd_ail_display_options[language]">
								<option value="auto"<?php echo selected( 'auto', $options['language'], false ); ?>>Automatisch (WordPress-Sprache)</option>
								<option value="de"<?php echo selected( 'de', $options['language'], false ); ?>>Deutsch</option>
								<option value="en"<?php echo selected( 'en', $options['language'], false ); ?>>Englisch</option>
							</select>
							<p class="description">„Automatisch“ verwendet Deutsch bei einer deutschen WordPress-Sprache, sonst Englisch.</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="mgd-ail-font-size">Schriftgröße</label></th>
						<td><input id="mgd-ail-font-size" name="mgd_ail_display_options[font_size]" type="number" min="6" max="24" value="<?php echo esc_attr( $options['font_size'] ); ?>"> px <p class="description">Erlaubt sind 6 bis 24 Pixel.</p></td>
					</tr>
					<tr>
						<th scope="row"><label for="mgd-ail-offset">Abstand zum Bildrand</label></th>
						<td><input id="mgd-ail-offset" name="mgd_ail_display_options[offset]" type="number" min="0" max="96" value="<?php echo esc_attr( $options['offset'] ); ?>"> px</td>
					</tr>
					<tr>
						<th scope="row"><label for="mgd-ail-padding-y">Innenabstand oben/unten</label></th>
						<td><input id="mgd-ail-padding-y" name="mgd_ail_display_options[padding_y]" type="number" min="2" max="24" value="<?php echo esc_attr( $options['padding_y'] ); ?>"> px</td>
					</tr>
					<tr>
						<th scope="row"><label for="mgd-ail-padding-x">Innenabstand links/rechts</label></th>
						<td><input id="mgd-ail-padding-x" name="mgd_ail_display_options[padding_x]" type="number" min="4" max="40" value="<?php echo esc_attr( $options['padding_x'] ); ?>"> px</td>
					</tr>
					<tr>
						<th scope="row"><label for="mgd-ail-radius">Eckenradius</label></th>
						<td><input id="mgd-ail-radius" name="mgd_ail_display_options[radius]" type="number" min="0" max="999" value="<?php echo esc_attr( $options['radius'] ); ?>"> px</td>
					</tr>
					<tr>
						<th scope="row"><label for="mgd-ail-blur">Glasun­schärfe</label></th>
						<td><input id="mgd-ail-blur" name="mgd_ail_display_options[blur]" type="number" min="0" max="24" value="<?php echo esc_attr( $options['blur'] ); ?>"> px</td>
					</tr>
					<tr>
						<th scope="row"><label for="mgd-ail-theme">Standard-Glasvariante</label></th>
						<td><select id="mgd-ail-theme" name="mgd_ail_display_options[theme]"><option value="auto"<?php echo selected( 'auto', $options['theme'], false ); ?>>Automatisch</option><option value="light"<?php echo selected( 'light', $options['theme'], false ); ?>>Hell</option><option value="dark"<?php echo selected( 'dark', $options['theme'], false ); ?>>Dunkel</option></select></td>
					</tr>
					<tr>
						<th scope="row"><label for="mgd-ail-position">Standard-Position</label></th>
						<td><select id="mgd-ail-position" name="mgd_ail_display_options[position]"><option value="bottom-right"<?php echo selected( 'bottom-right', $options['position'], false ); ?>>Unten rechts</option><option value="bottom-left"<?php echo selected( 'bottom-left', $options['position'], false ); ?>>Unten links</option><option value="top-right"<?php echo selected( 'top-right', $options['position'], false ); ?>>Oben rechts</option><option value="top-left"<?php echo selected( 'top-left', $options['position'], false ); ?>>Oben links</option></select></td>
					</tr>
				</table>

				<?php submit_button( 'Globale Standards speichern' ); ?>
			</form>
		</section>
	</div>

	<aside class="mgd-ail-admin-card mgd-ail-preview-card">
		<h2>Live-Vorschau</h2>
		<p>Diese Vorschau aktualisiert sich nur lokal im Browser. Sie speichert nichts und verwendet dieselben Designwerte wie das Frontend.</p>
		<div class="mgd-ail-preview-canvas" data-mgd-ail-settings-preview data-auto-language="<?php echo esc_attr( $resolved_language ); ?>" data-label-de="<?php echo esc_attr( $labels_de['generated'] ); ?>" data-label-en="<?php echo esc_attr( $labels_en['generated'] ); ?>">
			<span class="mgd-ail-badge mgd-ail-status-generated mgd-ail-position-<?php echo esc_attr( $options['position'] ); ?> mgd-ail-theme-<?php echo esc_attr( $options['theme'] ); ?>" role="note"><span class="mgd-ail-badge__text"><?php echo esc_html( MGD_AI_Image_Labels_Label_Translations::get_label( 'generated' ) ); ?></span></span>
		</div>
		<p class="mgd-ail-preview-meta">Bildbezogene Einstellungen aus der Mediathek haben Vorrang vor diesen globalen Startwerten.</p>
	</aside>
</div>

<section class="mgd-ail-admin-card">
	<h2>Shortcodes und Hintergrundbilder</h2>
	<p><code>[mgd_ai_label image_id="123" class="mein-div" offset_x="24" offset_y="24"]</code></p>
	<p>Für einen Hintergrund-Container ergänze zusätzlich die CSS-Klasse <code>mgd-ail-background-container</code>. Die vollständige Anleitung steht im Reiter „CSS-Klassen“.</p>
</section>
