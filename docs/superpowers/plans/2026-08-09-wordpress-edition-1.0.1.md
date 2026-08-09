# Umsetzungsplan: WordPress-Edition 1.0.1

> Ziel: Das Plugin erhält den sichtbaren Namen **MGD AI Kennzeichnung WordPress**,
> eine zuverlässige sprachabhängige Label-Ausgabe, eine verständliche Verwaltung
> und vollständige Veröffentlichungsartefakte. Die technische Plugin-ID
> `mgd-ai-image-labels` bleibt unverändert, damit bestehende Installationen über
> den normalen WordPress-Updater aktualisiert werden können.

## 1. Grundlage und Regressionstests

**Dateien:**
- Ändern: `tests/test-plugin-options.php`
- Ändern: `tests/test-image-renderer.php`
- Ändern: `tests/test-shortcodes.php`
- Neu: `tests/test-label-translations.php`
- Neu: `tests/test-admin-assets.php`

**Vorgehen:**
1. Tests für die drei Sprachoptionen `auto`, `de` und `en` ergänzen.
2. Einen Test für die deutsche und englische Ausgabe jedes Label-Status erstellen.
3. Tests für das Laden der Backend-Assets nur auf der Plugin-Verwaltungsseite
   und für die neue Dokumentationsansicht ergänzen.
4. Tests zunächst rot ausführen.

## 2. Sprachservice und Ausgabe verbinden

**Dateien:**
- Neu: `includes/class-label-translations.php`
- Ändern: `includes/class-plugin-options.php`
- Ändern: `includes/class-image-renderer.php`
- Ändern: `includes/class-plugin.php`

**Vorgehen:**
1. Einen kleinen, zentralen Service für Label-Texte erstellen.
2. Die WordPress-Sprache nur im Modus „Automatisch“ auswerten; Deutsch für
   `de*`, sonst Englisch.
3. Alle Frontend-Ausgabewege – Bildinhalt, Divi-Runtime und Shortcodes – über
   den Service führen.
4. Die gespeicherten Statuswerte unverändert lassen, damit vorhandene Bilder
   keine Migration benötigen.

## 3. Verwaltungsoberfläche und Live-Vorschau

**Dateien:**
- Neu: `includes/class-admin-assets.php`
- Neu: `assets/css/admin-settings.css`
- Neu: `assets/js/settings-preview.js`
- Ändern: `includes/class-admin-page.php`
- Ändern: `views/admin/settings.php`
- Neu: `views/admin/documentation.php`
- Ändern: `views/admin/css-classes.php`
- Ändern: `views/admin/imprint.php`

**Vorgehen:**
1. Den Menüpunkt und alle sichtbaren Produktbezeichnungen umbenennen.
2. Die Einstellungen in klar getrennte Karten mit einer lokalen, barrierefreien
   Live-Vorschau gliedern.
3. Die Vorschau bei Änderungen von Design, Position und Sprache ohne Speichern
   aktualisieren und ausschließlich mit `textContent` befüllen.
4. Einen neuen Dokumentations-Tab mit sicheren Beispielansichten, Shortcodes,
   Einsatzgrenzen und Support-Links erstellen.
5. Das Stylesheet und JavaScript nur auf der Plugin-Seite laden.

## 4. Release, Dokumentation und Qualitätssicherung

**Dateien:**
- Ändern: `mgd-ai-image-labels.php`
- Ändern: `includes/class-plugin-presentation.php`
- Ändern: `includes/class-github-updater.php`
- Ändern: `README.md`
- Ändern: `CHANGELOG.md`
- Neu: `docs/release/1.0.1.md`
- Ändern: GitHub-Wiki (separates Wiki-Repository)

**Vorgehen:**
1. Version und sichtbare Bezeichnung auf `1.0.1` setzen, ohne den Update-Slug
   oder den Plugin-Ordner zu ändern.
2. README und Wiki um Sprache, Vorschau, Dokumentation, Updates und die
   Kompatibilitätsgrenzen (WooCommerce/Elementor) ergänzen.
3. Vollständige PHP-/JS-Tests, Lint, Paketprüfung, Secret-Scan und Diff-Check
   ausführen.
4. Release-ZIP bauen, Inhalt prüfen, Commit und Tag `v1.0.1` erstellen,
   anschließend GitHub-Release und Wiki veröffentlichen.

## Abnahme

- Upgrade von 0.6.x auf 1.0.1 wird als reguläres Update erkannt.
- Englisch/Deutsch/Automatisch ändern alle sichtbaren Labels konsistent.
- Backend-Vorschau spiegelt Label-Größe, Glasdesign, Position und Sprache.
- Es gibt keine externen Assets, Telemetrie oder sensiblen Informationen.
- ZIP, GitHub-Release, README und Wiki dokumentieren denselben Stand.
