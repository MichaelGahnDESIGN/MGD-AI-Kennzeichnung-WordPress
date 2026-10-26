# Medien speichern – robuste WordPress-Ansichten

## Ziel

Die KI-Kennzeichnung soll in unterschiedlichen WordPress-Medienansichten die
drei sichtbaren Auswahlfelder zuverlässig speichern, ohne jemals Felder eines
anderen oder verdeckten Anhangs auszulesen.

## Kleine Schritte

1. Die Feldsuche auf den geklickten Button, dessen aktiven Detailbereich und
   den zugehörigen WordPress-Kompatibilitätsblock begrenzen.
2. Neben dem klassischen `attachments[ID][Feld]`-Namen die dokumentierten
   semantischen Eigenschaften von WordPress-Feldern berücksichtigen.
3. Den Regressionstest gegen beide Varianten ergänzen und die vollständige
   lokale Testreihe ausführen.

## Rückfall

Die Änderung liegt als einzelner Git-Commit vor. Ein Rückfall besteht aus dem
Zurücknehmen dieses Commits; gespeicherte Anhangsmetadaten werden dabei nicht
verändert.

## Beleg

Die Feldsuche erzeugt weiterhin nur eine Anfrage an den bestehenden,
nonce- und capability-geschützten AJAX-Endpunkt. Ein echter Browser-Test in
der betroffenen WordPress-Installation bleibt vor dem Release erforderlich.
