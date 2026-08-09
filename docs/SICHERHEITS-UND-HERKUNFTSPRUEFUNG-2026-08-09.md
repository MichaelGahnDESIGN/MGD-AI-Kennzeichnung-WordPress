# Sicherheits- und Herkunftsprüfung – 9. August 2026

## Anlass und Umfang

Diese Prüfung dokumentiert den veröffentlichten Quellstand von MGD
KI-Bildkennzeichnung vor der weiteren Verteilung. Sie umfasst den
Plugin-Quellcode, die lokal ausgelieferten Assets, die Tests, die Build-Regeln,
die Git-Historie und die öffentliche Dokumentation.

Geprüft wurden insbesondere:

- versehentlich veröffentlichte Zugangsdaten, Schlüssel, Tokens und private
  Konfigurationsdateien;
- Berechtigungs-, Nonce-, Validierungs- und Escaping-Pfade für die
  Medienbearbeitung, Administration, Shortcodes und Seitenerstellung;
- Netzwerkzugriffe und die Validierung von GitHub-Update-Paketen;
- eingebundene Abhängigkeiten, Urheberrechts- oder Lizenzhinweise und
  Herkunftshinweise in Code und Branding-Assets;
- verständliche, wartbare Kommentare ohne Verweise auf generative KI als
  vermeintliche Autorin.

## Ergebnis

### Zugangsdaten und sensible Daten

Im aktuellen Repository- und Release-Bestand wurden keine Passwörter,
API-Schlüssel, Tokens, `wp-config.php`-Dateien, Datenbankauszüge, Backups oder
produktiven Zugangsdaten gefunden. Der Release-Build kopiert nur ausdrücklich
freigegebene Plugin-Dateien und schließt Tests, Worktrees sowie lokale
Konfigurationen aus.

Die Git-Historie enthält die üblichen öffentlichen Autor-Metadaten von Commits.
Das sind keine Zugangsdaten. Falls diese Angaben nicht dauerhaft öffentlich
sein sollen, muss eine getrennte Entscheidung über eine Umschreibung der
bereits veröffentlichten Git-Historie getroffen werden.

### Eingaben, Rechte und Ausgaben

- Der Speichern-Endpunkt für Medien prüft WordPress-Nonce,
  Bearbeitungsberechtigung des konkreten Anhangs und Bild-MIME-Typ.
- Status, Position und Glas-Variante werden auf feste erlaubte Werte begrenzt.
- Globale Designwerte und Shortcode-Attribute werden auf enge Zahlen- und
  Klassenformate begrenzt; freies CSS oder JavaScript kann darüber nicht
  gespeichert werden.
- Verwaltungsseiten und die optionale AI-Philosophie-Seite verlangen passende
  WordPress-Berechtigungen sowie Nonces.
- HTML-Ausgaben nutzen kontextbezogenes Escaping oder eine begrenzte
  HTML-Whitelist.

### Netzwerk und Updates

Es gibt einen einzigen produktiven Netzwerkzugriff: die öffentliche
GitHub-Release-API des eigenen Repositories für Update-Hinweise. Es werden
keine Medien, Anhang-Metadaten, Besucher- oder Nutzerdaten übertragen.

Für Update-Pakete werden Version, Paketname, HTTPS, Host, fehlender Sonderport
und der feste Release-Pfad des eigenen GitHub-Repositories geprüft. Fehlerhafte
oder unvollständige Antworten führen zu keinem Update-Angebot.

### Fremdcode, Abhängigkeiten und Assets

- Es gibt keine Composer-, npm- oder eingebundenen PHP-/JavaScript-
  Drittanbieter-Bibliotheken.
- Der Bestand enthält keine Copyright-Header Dritter, Lizenzdateien Dritter
  oder Hinweise auf eine übernommene Bibliothek.
- Die editierbaren SVG-Quellen enthalten nur elementare SVG-Formen, lokale
  Systemschrift-Fallbacks und keine eingebetteten Fremdbilder oder Webfonts.
- Die kompakten PNG- und GIF-Dateien enthalten bei der technischen Prüfung
  keine erkennbaren Autoren-, Tool- oder Lizenzmetadaten.
- Eine Suche nach charakteristischen Plugin-Bezeichnern ergab keinen Hinweis
  auf eine fremde öffentliche Codequelle. Die Git-Historie weist die bisherigen
  Änderungen Michael Gahn DESIGN zu.

## Rechtliche Einordnung

Der Quellcode ist unter GPL-2.0-or-later veröffentlicht. Diese Lizenz regelt
die Weitergabe des Repository-Codes, ersetzt aber keine Prüfung fremder
Beiträge oder Assets. Die technische Prüfung kann keine weltweite
Urheberrechtsfreiheit beweisen und ist keine Rechtsberatung.

Generative Werkzeuge können bei der Entstehung von Text oder Code eingesetzt
worden sein. Aus einem technischen Scan lässt sich weder eine vollständige
Herkunftsgarantie noch eine Schutzrechtsgarantie ableiten. Für eine rechtliche
Gewährleistung, Marken- oder Schutzrechtsanmeldung sollte ein qualifizierter
Rechtsbeistand den konkreten Stand prüfen. Die aktuelle Orientierung der
U.S. Copyright Office zum Umgang mit KI-Material bestätigt, dass die Frage der
Urheberschaft vom menschlichen kreativen Beitrag im Einzelfall abhängt; sie ist
nicht auf eine einfache Tool-Frage reduzierbar.

## Verbleibende Pflegeaufgaben

1. Vor jedem Release den vollständigen Testlauf und die manuelle Prüfung von
   Mediathek, Beitragsbild, Divi-Blogmodul und Hintergrund-Shortcode ausführen.
2. Neue Abhängigkeiten, Icons, Bilder oder Schriftarten nur mit dokumentierter
   Herkunft und GPL-kompatibler Lizenz aufnehmen.
3. Keine Logs, Screenshots oder Fehlerberichte mit privaten URLs,
   personenbezogenen Daten oder Zugangsdaten committen.
4. Sicherheitsrelevante Hinweise ausschließlich über den in
   [SECURITY.md](../SECURITY.md) beschriebenen Weg entgegennehmen.

## Prüfgrenzen

Die Prüfung kombiniert Quellcode-Lektüre, statische Suchen, Testläufe,
Versionshistorie und eine Internetrecherche nach eindeutigen
Projektbezeichnern. Sie ist keine forensische Herkunftsanalyse, kein
Penetrationstest gegen einen produktiven Server und keine Rechtsberatung.

## Quellen zur rechtlichen Orientierung

- [GNU General Public License, Version 2](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
- [U.S. Copyright Office: Copyright and Artificial Intelligence](https://www.copyright.gov/AI/)
- [U.S. Copyright Office: Bericht zu KI und Urheberschaft, Teil 2](https://www.copyright.gov/newsnet/2025/1060.html)

Diese Quellen dienen ausschließlich der allgemeinen Orientierung. Für deutsches
oder europäisches Recht sowie für konkrete Vertrags- und Haftungsfragen ist
eine qualifizierte Rechtsberatung erforderlich.
