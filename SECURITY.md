# Sicherheitsrichtlinie

## Sicherheitslücke vertraulich melden

Bitte veröffentliche Sicherheitslücken nicht in einem GitHub-Issue, Pull
Request oder Screenshot. Nutze stattdessen das
[Support-Formular von Michael Gahn DESIGN](https://michael-gahn.de/support/)
und beschreibe:

- die betroffene Plugin-Version;
- die Voraussetzungen und reproduzierbaren Schritte;
- die erwartete und die tatsächliche Auswirkung;
- gegebenenfalls einen möglichst kleinen, nicht destruktiven Proof of Concept.

Sende keine Zugangsdaten, API-Schlüssel, Tokens, vollständigen
Datenbankauszüge, Backups, privaten Bild-URLs oder personenbezogenen Daten.
Wenn eine Meldung vertrauliche Details braucht, nenne zunächst nur einen
sicheren Rückkanal über das Formular.

## Unterstützter Stand

Sicherheitskorrekturen werden für den aktuellen veröffentlichten
Release-Zweig bereitgestellt. Installationen sollten die neueste stabile
Version des Plugins sowie unterstützte WordPress- und PHP-Versionen verwenden.

## Umgang mit einer Meldung

1. Die Meldung wird auf Nachvollziehbarkeit und Auswirkungen geprüft.
2. Bei Bestätigung wird eine Korrektur mit Testfall vorbereitet.
3. Die Korrektur erscheint als versioniertes GitHub-Release.
4. Öffentliche Details werden erst veröffentlicht, wenn eine aktualisierte
   Version verfügbar ist oder ein verantwortbarer Zeitpunkt abgestimmt wurde.

## Datenschutz und Update-Prüfung

Das Plugin speichert seine Kennzeichnungswerte ausschließlich als
WordPress-Anhang-Metadaten auf der eigenen Website. Es überträgt weder Bilder,
Anhang-Metadaten, Besucher- noch Nutzerdaten an externe Dienste.

Für Update-Hinweise wird ausschließlich die öffentliche GitHub-Release-API
des eigenen Repositories abgefragt. Das Plugin enthält dafür keine
GitHub-Tokens. Vor einem Update werden Versionsnummer, Paketname, HTTPS,
Download-Domain und Repository-Pfad geprüft. Eine nicht passende oder nicht
erreichbare Antwort erzeugt keinen Update-Hinweis.

## Lokale Assets und externe Links

Icon, Banner, Vorschau-CSS und JavaScript liegen im Plugin-Paket. Das
WordPress-Backend lädt dafür keine Fremdhosts, Webfonts, Analysewerkzeuge oder
Drittanbieter-Skripte. Externe Service-Links öffnen mit `noopener noreferrer`,
damit ein neuer Tab keinen Zugriff auf das aufrufende WordPress-Backend erhält.
