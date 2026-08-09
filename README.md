# MGD AI Kennzeichnung WordPress

Ein schlankes WordPress-Plugin für die transparente, barrierefreie Kennzeichnung von Bildern, bei deren Erstellung oder Bearbeitung KI beteiligt war.

Es ergänzt die WordPress-Mediathek um eine Auswahl pro Bild und gibt ein dezentes Label direkt auf dem Bild aus. Das Plugin lädt keine externen Schriften, Skripte, Analysewerkzeuge oder Tracking-Dienste.

> **Hinweis:** Die Entscheidung, ob und wie Inhalte gekennzeichnet werden müssen, hängt vom konkreten Inhalt, Verwendungszweck und geltendem Recht ab. Dieses Plugin ist ein technisches Hilfsmittel und keine Rechtsberatung.

## Dokumentation

Die vollständige, fortlaufend gepflegte Anleitung liegt im
[GitHub-Wiki](https://github.com/MichaelGahnDESIGN/MGD-AI-Kennzeichnung-WordPress/wiki).
Die wichtigsten Einstiege:

| Thema | Inhalt |
| --- | --- |
| [Installation und Updates](https://github.com/MichaelGahnDESIGN/MGD-AI-Kennzeichnung-WordPress/wiki/Installation-und-Updates) | ZIP-Installation, GitHub-Updates, Backup und Rückfallweg |
| [Kennzeichnen und Vorschau](https://github.com/MichaelGahnDESIGN/MGD-AI-Kennzeichnung-WordPress/wiki/Kennzeichnen-und-Vorschau) | Arbeitsschritte in Mediathek und Divi-5-Medienmodal |
| [Divi, Beitragsbilder und Blogmodule](https://github.com/MichaelGahnDESIGN/MGD-AI-Kennzeichnung-WordPress/wiki/Divi,-Beitragsbilder-und-Blogmodule) | Unterstützung für Bildmodule, Beitragsbilder, Archive und Lazy Loading |
| [Hintergrundbilder und Shortcodes](https://github.com/MichaelGahnDESIGN/MGD-AI-Kennzeichnung-WordPress/wiki/Hintergrundbilder-und-Shortcodes) | Label auf einem Divi-Hintergrundbild ausgeben |
| [Einstellungen und AI-Philosophie](https://github.com/MichaelGahnDESIGN/MGD-AI-Kennzeichnung-WordPress/wiki/Einstellungen-und-AI-Philosophie) | Globale Gestaltung, CSS-Klassen und Transparenzseite |
| [Fehlersuche und Support](https://github.com/MichaelGahnDESIGN/MGD-AI-Kennzeichnung-WordPress/wiki/Fehlersuche-und-Support) | Prüfschritte für Cache, Blogkarten und Beitragsbilder |
| [Sicherheit und Rechtliches](https://github.com/MichaelGahnDESIGN/MGD-AI-Kennzeichnung-WordPress/wiki/Sicherheit,-Datenschutz-und-Rechtliches) | Datenfluss, Grenzen und verantwortliche Meldung von Sicherheitslücken |

Der [Sicherheits- und Herkunftscheck vom 9. August 2026](https://github.com/MichaelGahnDESIGN/MGD-AI-Kennzeichnung-WordPress/blob/main/docs/SICHERHEITS-UND-HERKUNFTSPRUEFUNG-2026-08-09.md)
dokumentiert zusätzlich Umfang, Ergebnis und Grenzen der aktuellen Prüfung.

## Funktionen

- Auswahl direkt in den Anhang-Details der WordPress-Mediathek
- Fünf Statuswerte: Keine KI, Mit KI erstellt, Teilweise KI generiert, Mit KI bearbeitet und Deepfake / täuschend echt
- Position des Labels in allen vier Bildecken
- Helle, dunkle oder automatische Glas-Variante
- Lokale, datensparsame Ausgabe ohne Drittanbieter
- Barrierefreie Semantik; Deepfake-Hinweise enthalten einen erweiterten Screenreader-Text
- Unterstützung für WordPress-Bilder, Beitragsbilder sowie Divi-5- und klassische Divi-Bildmodule
- Eigener Speichern-Button für eine nachvollziehbare Medienbearbeitung – auch im separaten Medienfenster des Divi-5-Builders
- Zentrale Verwaltung unter **Medien → AI Kennzeichnung** mit Einstellungen, Dokumentation, CSS-Klassen, AI-Philosophie und Impressum
- Drei Sprachausgaben für sichtbare Labels: Automatisch (WordPress-Sprache), Deutsch und Englisch
- Lokale Live-Vorschau der globalen Design- und Sprachwerte direkt in der Plugin-Verwaltung
- Globale, streng validierte Standards für Schriftgröße, Abstände, Radius, Glasunschärfe, Standard-Position und Glas-Variante
- Sicherer Hintergrundbild-Shortcode für Divi-Container: `[mgd_ai_label]`
- Redaktionell pflegbare AI-Philosophie mit Shortcode und vorsichtiger, optionaler Seitenerstellung
- Professionelles, lokal ausgeliefertes Icon und Banner im WordPress-Update- und Detaildialog
- Native Detailansicht in der Pluginliste mit Installation, FAQ und Änderungsprotokoll
- Website-, Dokumentations-, Support- und GitHub-Links; externe Links öffnen sicher in einem neuen Tab

## Voraussetzungen

- WordPress 6.0 oder neuer
- PHP 8.1 oder neuer
- Schreibrechte für die normale WordPress-Plugin-Installation

## Installation

1. Lade unter **Plugins → Installieren → Plugin hochladen** eine Release-ZIP hoch.
2. Aktiviere **MGD AI Kennzeichnung WordPress**.
3. Öffne unter **Medien → Mediathek** ein Bild in den Anhang-Details.
4. Wähle bei **KI-Kennzeichnung** den passenden Status, die Position und die Glas-Variante.
5. Klicke auf **Kennzeichnung speichern**.
6. Leere bei Bedarf den Seiten- oder CDN-Cache und kontrolliere die Ausgabe im Frontend.

Die Einstellungen werden als drei WordPress-Anhangsmetadaten gespeichert. Beim Plugin-Update bleiben sie erhalten.

### Sicher speichern – auch im Divi-5-Builder

Der Button **Kennzeichnung speichern** speichert Status, Position und Glas-Variante für genau den gerade geöffneten Medien-Anhang. Im Divi-5-Medienfenster läuft die Medienbibliothek in einem separaten Builder-Fenster. Deshalb wird der schlanke, lokale Speichern-Handler gezielt auch dort geladen und arbeitet ohne Abhängigkeit von jQuery. Er sucht bewusst zuerst innerhalb des sichtbaren Anhang-Details-Dialogs und nicht global in der Seite. So werden die Werte nicht versehentlich aus einem verdeckten oder vorherigen Dialog gelesen. Nach erfolgreicher Speicherung kann der Anhang gewechselt oder das Medienfenster neu geöffnet werden; die drei Werte werden erneut aus den WordPress-Anhangsmetadaten geladen.

### Live-Vorschau im Medienmodal

Die Vorschau im geöffneten Medienmodal reagiert direkt auf Status, Ecke und Glas-Variante. Sie ist absichtlich nur eine Vorschau: Weder Bilddatei noch Metadaten werden dadurch geändert und es wird keine Anfrage an einen externen Dienst gesendet. Erst **Kennzeichnung speichern** übernimmt die drei Werte für den Anhang.

Die Vorschau verwendet dieselben Label-Klassen und proportionalen Innenabstände wie die Frontend-Ausgabe. Dadurch bleibt sie bei unterschiedlicher Modalgröße auf der sichtbaren Bildfläche in der gewählten Ecke. Sie ist eine verlässliche Stilvorschau; das finale Layout hängt zusätzlich vom jeweiligen Theme, der ausgegebenen Bildgröße und gegebenenfalls dessen CSS ab.

## Kennzeichnungsarten und Sprache

| Auswahl | Sichtbares Label | Zweck |
| --- | --- | --- |
| Keine KI | Kein Label | Keine Kennzeichnung ausgeben |
| Mit KI erstellt | `AI GENERATED` | Bild wurde vollständig oder überwiegend mit KI erzeugt |
| Teilweise KI generiert | `AI PARTIALLY GENERATED` | Bild enthält erkennbare, KI-generierte Bestandteile |
| Mit KI bearbeitet | `AI MODIFIED` | Bestehendes Bild wurde mit KI wesentlich verändert |
| Deepfake / täuschend echt | `AI DEEPFAKE` | Bild kann einen authentischen Eindruck erwecken |

Unter **Medien → AI Kennzeichnung → Einstellungen** kann die sichtbare Ausgabe
auf **Automatisch**, **Deutsch** oder **Englisch** gesetzt werden. Im Modus
„Automatisch“ orientiert sich das Plugin an der WordPress-Sprache: `de_*`
liefert deutsche Labels, alle anderen Sprachen englische Labels. Der technische
Status eines Bildes bleibt dabei unverändert; ein Sprachwechsel benötigt keine
Migration und verändert keine Bilddatei.

## Gestaltung und Barrierefreiheit

Das Badge ist bewusst klein und dezent. Position, helle/dunkle Glasoptik und ein kontrastreicher Fallback sorgen dafür, dass es auf unterschiedlichen Motiven erkennbar bleibt.

- Die sichtbare Kennzeichnung nutzt `role="note"`.
- Bei Deepfakes ergänzt ein nicht sichtbarer, aber vorlesbarer Erklärungstext die Bedeutung.
- Alt-Texte, Bilddateien und vorhandene Inhalte werden nicht überschrieben.
- Bei deaktivierter Hintergrundunschärfe bleibt eine kontrastreiche Fläche sichtbar.

Die Styles liegen vollständig lokal in `assets/css/frontend.css` und können in einem Child Theme gezielt überschrieben werden.

### Globale Standards und individuelle Bildwerte

Unter **Medien → AI Kennzeichnung → Einstellungen** stehen globale Ausgangswerte für alle Labels zur Verfügung:

- Schriftgröße, Außen- und Innenabstände sowie Eckenradius
- Glasunschärfe
- bevorzugte Glas-Variante und Position

Alle Werte werden serverseitig auf enge, dokumentierte Grenzen geprüft. Das verhindert fehlerhafte oder unerwünschte CSS-Eingaben. Die globalen Werte gestalten das gemeinsame Erscheinungsbild; Status, Position und Glas-Variante können pro Bild weiterhin in der Mediathek gewählt werden. Die Mediathek-Wahl bleibt damit bewusst die konkrete Entscheidung für das einzelne Bild.

## Hintergrundbild mit Divi kennzeichnen

Für ein Divi-Modul mit CSS-Hintergrundbild gehört die CSS-Klasse
`mgd-ail-background-container` direkt auf den Container mit dem Hintergrundbild
(in Divi unter **Erweitert → CSS-ID & Klassen**). Die Klasse schafft den
notwendigen Bezugskontext für das Label; sie verändert weder das Hintergrundbild
noch das Layout des Containers.

Füge anschließend innerhalb dieses Containers ein Text- oder Code-Modul mit dem
Shortcode ein:

```text
[mgd_ai_label image_id="55"]
```

`55` ersetzt du durch die WordPress-Mediathek-ID des bereits gekennzeichneten
Bildes. Optional sind bis zu drei eigene Klassen sowie ganzzahlige Offsets von
`0` bis `192` Pixeln erlaubt, zum Beispiel:

```text
[mgd_ai_label image_id="55" class="hero-bild" offset_x="24" offset_y="12"]
```

Ohne gültige Bild-ID, bei einem Status **Keine KI** oder bei ungültigen
Attributen gibt der Shortcode bewusst nichts aus.

### CSS-Klassen und Abstände

Der Reiter **CSS-Klassen** listet die verwendeten Status-, Positions- und Glas-Klassen auf. Dort lässt sich der Beispiel-Shortcode direkt kopieren. Für Hintergrundbilder ist wichtig: Der Shortcode muss innerhalb desselben Containers liegen, der die Klasse `mgd-ail-background-container` trägt. Die Attribute `offset_x` und `offset_y` akzeptieren ausschließlich ganze Pixelwerte von `0` bis `192`; `class` akzeptiert höchstens drei sichere CSS-Klassennamen. Das Label blockiert keine Buttons, Links oder andere Interaktionen im Container.

Beispiel für ein individuelles, per CSS ansprechbares Hintergrund-Label:

```text
[mgd_ai_label image_id="55" class="hero-label mgd-eigenes-label" offset_x="24" offset_y="12"]
```

## Zentrale Plugin-Verwaltung

Die Verwaltung liegt unter **Medien → AI Kennzeichnung**. Sie verwendet die WordPress-Standardoberfläche und ist auf Administratorinnen und Administratoren mit der Berechtigung `manage_options` begrenzt.

| Reiter | Zweck |
| --- | --- |
| **Einstellungen** | Globale Standards festlegen und mit einer lokalen Vorschau kontrollieren. |
| **Dokumentation** | Direkte Anleitung für Mediathek, Sprache, Shortcodes, Caches und Support. |
| **CSS-Klassen** | Klassen und Hintergrund-Shortcode für Divi-Container kopieren. |
| **AI-Philosophie** | Transparenztext redaktionell pflegen und als `[mgd_ai_philosophy]` ausgeben. |
| **Impressum** | Lokale Projekt-, Support- und Quellcode-Links finden. |

### AI-Philosophie veröffentlichen

Der Text zur AI-Philosophie bleibt als WordPress-Option auf der eigenen Website und wird ausschließlich mit erlaubtem, einfachem HTML gespeichert. Per `[mgd_ai_philosophy]` lässt er sich in einem WordPress-, Divi-Text- oder Code-Modul ausgeben.

Der Button **AI-Philosophie-Seite anlegen** ist absichtlich vorsichtig: Er legt höchstens eine vom Plugin markierte Seite an und überschreibt keine vorhandenen Seiten. Einen Footer-Link ergänzt das Plugin nur dann automatisch, wenn WordPress exakt eine aktive Menüposition erkennt, deren Kennung `footer` enthält. Bei keiner oder mehreren passenden Positionen bleibt jedes Menü unverändert; die Seite kann danach manuell dem gewünschten Footer-Menü hinzugefügt werden.

> **Rechtlicher Hinweis:** Die AI-Philosophie und die Bildlabels fördern Transparenz, ersetzen aber keine Prüfung von Rechtslage, Vertrag, Urheberrecht, Plattformregeln oder Einzelfall. Das Plugin gibt keine rechtliche Garantie und keine Rechtsberatung.

## Plugin-Verwaltung im Backend

In der WordPress-Pluginliste zeigt **Details anzeigen** eine eigene, native WordPress-Detailansicht. Sie bleibt auch verfügbar, wenn GitHub gerade nicht erreichbar ist. Die Ansicht erklärt Installation, Bedienung, häufige Fragen und die Änderungen der letzten Versionen.

Das Plugin liefert Icon, Banner und eine dezente animierte Variante vollständig lokal aus. Die Animation ist ausschließlich für die Projektdokumentation gedacht; im WordPress-Backend bleibt das Icon bewusst statisch, damit die Verwaltung ruhig und barrierearm bleibt.

## Technische Arbeitsweise

Das Plugin speichert nur die Auswahl pro Anhang:

```text
_mgd_ail_status     generated | partially-generated | modified | deepfake | none
_mgd_ail_position   top-left | top-right | bottom-left | bottom-right
_mgd_ail_theme      auto | light | dark
```

Die Frontend-Ausgabe ist nicht destruktiv. Das Plugin umschließt nur die jeweilige Bildausgabe zur Laufzeit und verändert weder die Datei in der Mediathek noch gespeicherte Divi-Layouts.

Einige Themes geben Beitragsbilder direkt als `<img>` aus. Dafür enthält das Plugin einen lokalen Fallback für klassisches Divi und WordPress-Beitragsausgaben. Die Zuordnung bleibt auf explizit gekennzeichnete Medien beschränkt.

Bei responsiven Bildern werden die von WordPress erzeugten Größen desselben Medien-Anhangs berücksichtigt, einschließlich lokaler WebP- und AVIF-Varianten. Für CDN-Auslieferungen wird bewusst der kanonische Upload-Pfad verglichen, damit eine technisch gleichwertige lokale Auslieferung nicht an einer abweichenden Domain scheitert. Die Kennzeichnung ist keine Bildbearbeitung und wird nicht in die Bilddatei eingebrannt.

## Entwicklung

### Struktur

```text
assets/
  branding/                         Lokales Icon, Banner und Dokumentations-Animation
  css/frontend.css                 Lokale Frontend-Gestaltung
  js/media-save.js                 Speichern im Medien-Dialog
  js/media-preview.js              Nicht speichernde Vorschau im Medienmodal
  css/media-preview.css            Gestaltung der Medienvorschau
  css/admin-settings.css            Lokale Gestaltung der Verwaltungsseite
  js/settings-preview.js           Nicht speichernde Vorschau der globalen Standards
includes/
  class-admin-assets.php            Gezieltes Laden der Verwaltungs-Assets
  class-admin-page.php              Controller der zentralen Medien-Verwaltung
  class-ai-philosophy.php           AI-Philosophie, Shortcode und sichere Seitenerstellung
  class-attachment-meta.php        Validierung und Zugriff auf Anhangsmetadaten
  class-github-updater.php          Sichere Prüfung öffentlicher GitHub-Releases
  class-image-renderer.php          Frontend-Ausgabe und Divi-Kompatibilität
  class-media-ajax.php              Geschützter Speichern-Endpunkt
  class-media-fields.php            Felder in den Anhang-Details
  class-plugin.php                  Plugin-Initialisierung
  class-plugin-presentation.php     Service-Links und native Detailansicht
  class-plugin-options.php          Streng validierte globale Label-Standards
  class-label-translations.php      Zentrale deutsche und englische Label-Texte
  class-shortcodes.php               Hintergrund-Shortcode für Divi-Container
views/admin/                        Getrennte Ansichten für alle Verwaltungsreiter
tests/                              Eigenständige PHP-Tests ohne WordPress-Installation
mgd-ai-image-labels.php            Plugin-Header und Startpunkt
```

### Tests

Die Tests sind ohne WordPress-Installation ausführbar:

```bash
for test in tests/test-*.php; do
  php "$test" || exit 1
done
```

Zusätzlich sollte jede Änderung geprüft werden:

```bash
php -l mgd-ai-image-labels.php
php -l includes/class-image-renderer.php
git diff --check
```

## Releases und Updates

### Repository-Umbenennung abgeschlossen

Das öffentliche Repository heißt jetzt
`MGD-AI-Kennzeichnung-WordPress`. Die Übergangsversion 1.0.2 hat den neuen
Update-Kanal vorbereitet; ab 1.0.3 werden reguläre Updates über diese Adresse
veröffentlicht. Der Plugin-Ordner `mgd-ai-image-labels`, die Metaschlüssel und
alle Kennzeichnungswerte bleiben unverändert.

Jede Version erhält einen Git-Tag im Format `vX.Y.Z` und ein ZIP-Release, dessen oberster Ordner `mgd-ai-image-labels` heißt. WordPress erkennt neuere öffentliche GitHub-Releases im üblichen Plugin-Update-Zyklus und zeigt sie in **Dashboard → Aktualisierungen** beziehungsweise **Plugins** an. Das Release-Paket enthält nur die zur Laufzeit und Dokumentation erforderlichen Plugin-Dateien; Entwicklungs-Worktrees, Tests, lokale Visualisierungen, Archivdateien und Konfigurationsgeheimnisse gehören nicht hinein.

Die Prüfung ruft höchstens alle zwölf Stunden ausschließlich die öffentliche GitHub-Release-API dieses Repositories auf. Sie benötigt keine Zugangsdaten und überträgt keine Bilder, Bildmetadaten, Besucher- oder Nutzerdaten. Ein Release wird nur angeboten, wenn die Version neuer ist und eine exakt passende ZIP-Datei über HTTPS, ohne abweichenden Port und aus dem festen Release-Pfad dieses Repositories bereitsteht. Bei Netzwerk- oder Validierungsfehlern bleibt WordPress beim bisherigen Stand und führt kein Update aus.

Automatische WordPress-Updates können Website-Administratoren wie bei anderen Plugins bewusst in der Plugin-Verwaltung aktivieren oder deaktivieren. Vor jedem Update empfiehlt sich ein getestetes Backup, zum Beispiel über UpdraftPlus.

## Sicherheit und Datenschutz

- Alle Eingaben werden serverseitig auf erlaubte Werte beschränkt.
- Änderungen erfordern die passende WordPress-Berechtigung und einen Nonce.
- Es werden keine personenbezogenen Daten, Bilder oder Analysedaten an externe Dienste übertragen.
- Das Plugin speichert keine API-Schlüssel, Passwörter oder Tokens.
- Die AI-Philosophie wird ausschließlich in der lokalen WordPress-Datenbank gespeichert; externe Links öffnen mit `noopener noreferrer`.
- Automatische Footer-Änderungen erfolgen nur bei einer einzigen eindeutig erkannten Footer-Menüposition; sonst bleibt die Navigation unangetastet.
- Die Update-Prüfung verwendet keine GitHub-Zugangsdaten und akzeptiert nur HTTPS-Pakete vom festgelegten öffentlichen GitHub-Repository.
- Bitte veröffentliche niemals `wp-config.php`, Backups, Logs mit personenbezogenen Daten oder Zugangsdaten im Repository.

Eine Meldung von Sicherheitslücken erfolgt gemäß [SECURITY.md](SECURITY.md), nicht über ein öffentliches Issue.

## Herkunft, Lizenz und Grenzen

Der Quellcode steht unter der [GPL-2.0-or-later](LICENSE), passend zu WordPress. Das Plugin enthält keine Composer-, npm- oder eingebundenen Drittanbieter-Bibliotheken. Die mitgelieferten SVG-, PNG- und GIF-Dateien liegen lokal im Repository; sie laden weder fremde Schriftarten noch fremde Bilder nach.

Der Sicherheits- und Herkunftscheck hat keine Zugangsdaten, API-Schlüssel, eingebetteten Fremdcode-Hinweis oder fremde Lizenzkennzeichnung im aktuellen Quell- und Paketbestand festgestellt. Eine technische Prüfung kann jedoch nicht beweisen, dass es weltweit keinen ähnlichen Codeschnipsel oder kein geschütztes Werk gibt. Vor einer rechtlichen Gewährleistung, einer Markenanmeldung oder einer Übernahme von fremden Assets ist deshalb eine fachkundige Einzelfallprüfung nötig. Details und Prüfumfang stehen im [Auditbericht](https://github.com/MichaelGahnDESIGN/MGD-AI-Kennzeichnung-WordPress/blob/main/docs/SICHERHEITS-UND-HERKUNFTSPRUEFUNG-2026-08-09.md).

## Mitwirken

Fehlerberichte und Verbesserungsvorschläge sind willkommen. Bitte beschreibe bei einem Fehler möglichst:

- WordPress-, PHP-, Theme- und Plugin-Version
- verwendeten Bildtyp (Mediathek, Beitragsbild, Divi-Bildmodul)
- erwartetes und tatsächliches Verhalten
- Schritte zur Reproduktion

Keine Zugangsdaten, privaten Bild-URLs oder personenbezogenen Daten in Issues veröffentlichen.

## Lizenz

Dieses Plugin steht unter der [GNU General Public License v2.0 oder neuer](LICENSE).
