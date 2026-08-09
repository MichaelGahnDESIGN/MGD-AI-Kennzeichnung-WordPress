# MGD AI Kennzeichnung WordPress 1.0.1 – Verwaltungsdesign

## Ziel

Die Verwaltungsseite wird eine klare deutschsprachige Arbeitsoberfläche.
Der sichtbare Produktname lautet **MGD AI Kennzeichnung WordPress**.
Der technische Plugin-Slug, die Metaschlüssel und der Update-Kanal bleiben unverändert.
So bleiben bestehende Installationen und gespeicherte Kennzeichnungen kompatibel.

## Globale Sprache für sichtbare Labels

Die strikt validierte Option `language` erlaubt nur `auto`, `de` und `en`.

| Wert | Wirkung |
| --- | --- |
| `auto` | WordPress-Sprache: alle `de*`-Locales ergeben Deutsch, sonst Englisch. |
| `de` | Deutsche Labels. |
| `en` | Englische Labels. |

Die WordPress-Verwaltung bleibt deutsch.
Die Wahl gilt für Frontend, Shortcodes und die Backend-Vorschau.
Sie verändert keine Medienmetadaten.

| Status | Deutsch | Englisch |
| --- | --- | --- |
| `generated` | Mit KI erstellt | AI GENERATED |
| `partially-generated` | Teilweise KI generiert | AI PARTIALLY GENERATED |
| `modified` | Mit KI bearbeitet | AI MODIFIED |
| `deepfake` | KI-generiert / täuschend echt | AI DEEPFAKE |

`none` erzeugt kein sichtbares Label.
`class-label-translations.php` kapselt Texte und Sprachregeln zentral.
Damit verwenden Mediathek, Renderer, Shortcodes und Vorschau denselben Wortlaut.

## Studio-Panel

Der Einstellungen-Tab hat drei klar getrennte Bereiche:

1. **Ausgabe & Sprache**: Sprache, Standardposition, Glasvariante.
2. **Gestaltung**: Schriftgröße, Außen- und Innenabstände, Radius, Unschärfe.
3. **Live-Vorschau**: dieselben CSS-Klassen und validierten Variablen wie im Frontend.

`assets/js/settings-preview.js` reagiert nur auf lokale Formularänderungen.
Es sendet keine Anfrage und speichert nichts automatisch.
`assets/css/admin-settings.css` gestaltet ausschließlich die Plugin-Verwaltung.

## Dokumentation mit lokalen Screenshots

Der Dokumentations-Tab behandelt Mediathek, Status, Sprachlogik, WordPress- und
Divi-Bilder, Beitragsbilder, Blogmodule, Hintergrund-Shortcodes, Caching,
Fehlersuche und Barrierefreiheit.

Die Bebilderung liegt unter `assets/docs/`.
Sie enthält keine Zugangsdaten, personenbezogenen Daten oder Drittinhalte.
Jeder Screenshot erhält Alt-Text und Bildunterschrift.

## Struktur

| Datei | Aufgabe |
| --- | --- |
| `includes/class-label-translations.php` | Sichere Textauswahl und Sprachauflösung |
| `includes/class-plugin-options.php` | Sprache, Standardwert und Sanitization |
| `includes/class-admin-page.php` | Produktname und Dokumentationsreiter |
| `views/admin/settings.php` | Studio-Panel, Sprachfeld und Canvas |
| `views/admin/documentation.php` | Lokale, verständliche Anleitung |
| `assets/js/settings-preview.js` | Nicht-speichernde Vorschau-Aktualisierung |
| `assets/css/admin-settings.css` | Eng begrenztes Admin-Design |
| `assets/docs/*.png` | Lokale Anleitungsbilder |

## Sicherheit und Abnahme

- Optionen nutzen die WordPress Settings API und eine vollständige Whitelist.
- Ein unbekannter Sprachwert fällt auf `auto` zurück.
- Der neue Tab kommt aus einer festen Reiterliste und lädt keine fremde Datei.
- Vorschau und Dokumentation verwenden keine externen Ressourcen.
- Tests folgen Rot-Grün: Übersetzungen, Optionen, Renderer, Reiter und Paket.
- Die manuelle Abnahme prüft Deutsch, Englisch und Automatisch bei WordPress,
  Divi 5, Beitragsbild, Blogmodul und Hintergrund-Shortcode.

## Nicht im Umfang

- Shopware, Shopify, JTL Shop oder Elementor-spezifische Erweiterungen.
- Automatische KI-Erkennung und eine Sprache pro Bild.
