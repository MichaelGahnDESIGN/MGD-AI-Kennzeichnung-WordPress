# Plugin Check – aktualisierter lokaler Lauf

Stand: 23.10.2026. Kandidat 1.0.7; WordPress 7.1.3, PHP 8.3, offizieller Plugin Check 2.1.0 mit Runtime-Bootstrap.

**0 Fehler, 2 Warnungen.** Alle Prüfgruppen aktiv, keine Fehlercodes ausgeschlossen. Vollständiger Bericht: `plugin-check.txt`.

- `WordPress.DB.SlowDBQuery.slow_db_query_meta_key`: 1
- `WordPress.DB.SlowDBQuery.slow_db_query_meta_value`: 1

Die CI läuft zusätzlich mit einer eigenen wp-env-Installation und kann andere Laufzeit-/Performance-Hinweise liefern. Die Gesamtübergabe bewahrt beide Rohberichte getrennt auf. Ein grüner Lauf ist keine WordPress.org-Zulassung.

## Prüfung der Resthinweise

Eigene Plugin-Tabellen werden über das WordPress-Präfix und feste Namen erzeugt. Die Laufzeitabfragen binden Tabellenbezeichner mit `%i` und Werte mit `%s`/`%d`. Direkte Abfragen bleiben für eigene Tabellen notwendig. Ein Cache für Empfänger-, Lese-, Audit- und Downloadstatus wurde nicht ergänzt: Änderungen müssen unmittelbar sichtbar bleiben. Hinweise zu Schemaänderungen gehören zur Installation bzw. ausdrücklich gewählten Datenlöschung. Die SQL-Änderungen wurden mit echten Datenbankzugriffen in der lokalen Testkopie geprüft.

Die Meta-Abfrage ist auf die eigene AI-Philosophie-Seite begrenzt und dient ihrer Wiedererkennung, damit keine Seite doppelt angelegt wird. Der Hinweis beschreibt die möglichen Kosten einer Meta-Suche; die Metadatenstruktur wurde für diesen Vorbereitungsschritt nicht migriert.

## Weitere Belege

Sieben Backends tatsächlich im Browser geöffnet, keine JavaScript-Ausnahmen; echte Screenshots mit künstlichen Daten. 22 lokale Integrationstests zu Formularschutz, Herstellerlink, Entwurf, Menü und privaten/öffentlichen Daten. PHP-Syntax und Verzeichnis-Paketvertrag geprüft. Kein Produktivsystem verändert und keine Einreichung ausgelöst.
