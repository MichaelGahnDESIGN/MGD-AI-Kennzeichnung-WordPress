# Geprüfte statische Einzel-Ausnahmen

Die nachfolgende Liste zeigt alle PHPCS-Einzel-Ausnahmen im tatsächlich gebauten Paket, einschließlich schon zuvor vorhandener Stellen. Kein phpcs:disable und keine globale Abschaltung von Plugin-Check-Prüfgruppen. Die konkreten Gründe stehen direkt am betroffenen Zugriff. Die Code-Ausnahmen müssen bei künftigen Änderungen erneut geprüft werden; sie sind keine pauschale Freigabe ähnlicher neuer Zugriffe.

- `includes/class-admin-page.php:106` – WordPress.Security.NonceVerification.Recommended -- Reines Lese-Routing ohne Zustandsänderung.
- `includes/class-ai-philosophy.php:112` – WordPress.Security.NonceVerification.Missing -- Prüfung erfolgt direkt danach.
- `includes/class-ai-philosophy.php:117` – WordPress.Security.NonceVerification.Missing -- Prüfung erfolgte oben; Werte werden streng gefiltert.
- `includes/class-ai-philosophy.php:129` – WordPress.Security.NonceVerification.Missing -- Prüfung erfolgt direkt danach.
- `includes/class-ai-philosophy.php:204` – WordPress.DB.SlowDBQuery.slow_db_query_meta_key -- Nur explizite Seitenerstellung; danach verifizierte ID-Option statt Meta-Suche.
- `includes/class-ai-philosophy.php:205` – WordPress.DB.SlowDBQuery.slow_db_query_meta_value -- Gehört zum begrenzten Rückgriff für alte Installationen.
- `includes/class-image-renderer.php:67` – WordPress.DB.SlowDBQuery.slow_db_query_meta_query -- Es werden nur explizit gekennzeichnete Medien gelesen.
- `includes/class-image-renderer.php:124` – WordPress.Security.EscapeOutput.OutputNotEscaped -- Sicheres JSON mit Hex-Escaping für einen JavaScript-Kontext. ?>;
- `includes/class-image-renderer.php:806` – WordPress.Security.NonceVerification.Recommended -- reine Vorschau-Erkennung ohne Zustandsänderung.
- `includes/class-media-fields.php:193` – WordPress.Security.NonceVerification.Recommended
- `includes/class-media-fields.php:197` – WordPress.Security.NonceVerification.Recommended
- `views/admin/ai-philosophy.php:19` – WordPress.Security.NonceVerification.Recommended -- Reine, nach einem geschützten POST erzeugte Statusmeldung. ?>
- `views/admin/ai-philosophy.php:20` – WordPress.Security.NonceVerification.Recommended -- Nur Textausgabe, keine Änderung. ?></p></div>
