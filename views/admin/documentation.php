<?php
/**
 * Ansicht: Bedienungsdokumentation direkt in der Plugin-Verwaltung.
 *
 * @package MGD_AI_Image_Labels
 */

declare(strict_types=1);
?>
<section class="mgd-ail-admin-card">
	<h2>Dokumentation</h2>
	<p>MGD AI Kennzeichnung WordPress ergänzt die Mediathek um eine klare Statusauswahl. Das Plugin speichert nur Status, Position und Glas-Variante am jeweiligen Bild. Es lädt keine externen Skripte, übermittelt keine Bilddaten und verändert keine Bilddatei.</p>

	<div class="mgd-ail-documentation-steps">
		<div class="mgd-ail-documentation-step"><strong>1. Bild auswählen</strong>Öffne ein Bild in der WordPress-Mediathek und wähle unter „KI-Kennzeichnung“ den passenden Status.</div>
		<div class="mgd-ail-documentation-step"><strong>2. Darstellung prüfen</strong>Wähle Position und Glas-Variante. Die Vorschau im Medienmodal zeigt die Ausgabe direkt auf dem Bild.</div>
		<div class="mgd-ail-documentation-step"><strong>3. Bild verwenden</strong>Bei WordPress-Bildern, Beitragsbildern und unterstützten Divi-Ausgaben erscheint das Label automatisch. Für Hintergrundbilder nutze den Shortcode.</div>
	</div>

	<h3>Sprachen</h3>
	<p>Unter „Einstellungen“ kannst du die Label-Ausgabe auf <strong>Automatisch</strong>, <strong>Deutsch</strong> oder <strong>Englisch</strong> setzen. Automatisch übernimmt Deutsch bei einer deutschen WordPress-Sprache und sonst Englisch. Die Einstellung wirkt auf alle Labels und Shortcodes.</p>

	<h3>Shortcode für Hintergrundbilder</h3>
	<p>Gib dem Divi-Container die Klasse <code>mgd-ail-background-container</code> und füge darin ein Text- oder Code-Modul mit folgendem Shortcode ein:</p>
	<p><code>[mgd_ai_label image_id="123" class="mein-div" offset_x="24" offset_y="24"]</code></p>
	<p>Ersetze nur <code>123</code> durch die ID eines bereits gekennzeichneten Bildes. Der Status kann nicht über den Shortcode verändert werden.</p>

	<h3>Wichtige Hinweise</h3>
	<ul>
		<li>„Keine KI“ gibt kein sichtbares Label aus.</li>
		<li>Die Kennzeichnung ist eine Transparenzhilfe und ersetzt keine rechtliche Einzelfallprüfung.</li>
		<li>Bei Caches nach einer Änderung die betreffende Seite bzw. den Cache leeren.</li>
		<li>Für Hilfe und aktuelle Anleitungen nutze die <a href="https://github.com/MichaelGahnDESIGN/MGD-AI-Image-Labels/wiki" target="_blank" rel="noopener noreferrer">GitHub-Dokumentation</a> oder den <a href="https://michael-gahn.de/support/" target="_blank" rel="noopener noreferrer">Support</a>.</li>
	</ul>
</section>
