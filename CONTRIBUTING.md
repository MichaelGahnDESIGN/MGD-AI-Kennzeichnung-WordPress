# Mitwirken an MGD KI-Bildkennzeichnung

Danke für dein Interesse an dem Plugin. Kleine, nachvollziehbare Änderungen sind
am leichtesten zu prüfen und am sichersten zu veröffentlichen.

## Vor einer Änderung

1. Erstelle einen eigenen Branch auf Basis von `main`.
2. Beschreibe das Problem oder den Nutzen kurz und konkret.
3. Ändere keine Zugangsdaten, WordPress-Konfigurationen, Backups oder privaten
   Medien im Repository.
4. Nutze für neue Funktionen und Fehlerbehebungen zuerst einen fehlenden oder
   fehlschlagenden Test.

## Qualitätsregeln

- PHP-Code bleibt mit PHP 8.1 kompatibel und nutzt die Sicherheitsfunktionen
  von WordPress.
- Eingaben aus Formularen, AJAX und Shortcodes werden serverseitig validiert.
- Ausgaben werden passend zum HTML-Kontext escaped.
- Änderungen an gespeicherten Medienwerten benötigen eine WordPress-Berechtigung
  und einen Nonce.
- Kommentare erklären Entscheidungen oder Randfälle. Wiederholungen dessen,
  was die nächste Codezeile ohnehin aussagt, gehören nicht in den Quellcode.
- Externe Bibliotheken, Bilder oder Codeübernahmen benötigen vor dem Merge eine
  nachvollziehbare Lizenzangabe.

## Lokale Prüfung

Führe vor einem Pull Request mindestens Folgendes aus:

```bash
for test in tests/test-*.php; do
  php "$test" || exit 1
done

php -l mgd-ai-image-labels.php
find includes -name '*.php' -print0 | xargs -0 -n1 php -l
git diff --check
```

Bei Änderungen an der Mediathek oder Divi ist zusätzlich ein manueller Test
notwendig: Werte speichern, Dialog neu öffnen, Bild im Frontend prüfen und
mindestens ein Beitragsbild sowie eine Divi-Blogkarte kontrollieren.

## Sicherheitslücken und Datenschutz

Sicherheitsrelevante Probleme gehören nicht in öffentliche Issues oder Pull
Requests. Bitte folge stattdessen [SECURITY.md](SECURITY.md). Fehlerberichte
sollten weder Zugangsdaten noch private Bild-URLs, Datenbankauszüge oder
personenbezogene Daten enthalten.

## Lizenz

Mit einem Beitrag bestätigst du, dass du den Code selbst veröffentlichen darfst
und ihn unter GPL-2.0-or-later bereitstellst. Für fremde Assets oder
Abhängigkeiten muss die jeweilige Lizenz kompatibel und dokumentiert sein.
