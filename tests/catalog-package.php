<?php
/** Paketvertrag: gemeinsame Katalogdaten, neue Klasse, Versionsangaben und lokale Grafiken. */
$root = dirname(__DIR__);
$config = json_decode(file_get_contents(__DIR__ . '/catalog-config.json'), true);
$runtime = $root . '/' . $config['runtime'];
function mgd_catalog_assert(bool $ok, string $name): void {
    if (!$ok) { fwrite(STDERR, 'FAIL ' . $name . "\n"); exit(1); }
}
$main = file_get_contents($runtime . '/' . $config['main']);
mgd_catalog_assert((bool) preg_match('/Version:\s*' . preg_quote($config['version'], '/') . '\s/', $main), 'Pluginversion');
$metadata = json_decode(file_get_contents($runtime . '/includes/plugin-catalog/plugins.json'), true);
mgd_catalog_assert(count($metadata) === 7, 'Sieben bekannte WordPress-Plugins');
foreach ($metadata as $repo => $item) {
    mgd_catalog_assert($item['repository'] === $repo && $item['tier'] === 'free', 'Bekannte kostenlose Einträge');
    $file = $runtime . '/assets/plugin-catalog/icons/' . $item['icon'];
    mgd_catalog_assert(is_file($file) && filesize($file) > 100, 'Lokales Icon ' . $repo);
    mgd_catalog_assert(!str_contains(file_get_contents($file), 'https://'), 'Kein externer Bildabruf im Icon');
    $picture = $runtime . '/assets/plugin-catalog/backgrounds/' . pathinfo($item['icon'], PATHINFO_FILENAME) . '.webp';
    $size = is_file($picture) ? getimagesize($picture) : false;
    mgd_catalog_assert($size && $size[0] === 1080 && $size[1] === 360 && $size['mime'] === 'image/webp', 'Lokales Kartenmotiv ' . $repo);
    mgd_catalog_assert(filesize($picture) < 80000, 'Kompaktes Kartenmotiv ' . $repo);
}
foreach (array('class-provider.php', 'view.php', 'plugins.json') as $name) {
    mgd_catalog_assert(is_file($runtime . '/includes/plugin-catalog/' . $name), 'Katalogbestandteil ' . $name);
}
$bootstrap = $main;
foreach (glob($runtime . '/includes/*.php') as $file) { $bootstrap .= file_get_contents($file); }
// MGD Tools: Updates, Weitere Plugins, Menü + Einstellungsseite kommen vom Baukasten, alte Updater und Katalog V4 sind weg
mgd_catalog_assert(str_contains($main, "Setup::tools("), 'MGD Tools vom Baukasten');
mgd_catalog_assert(str_contains($main, "'license'  => false"), 'Lizenz-Baustein aus');
mgd_catalog_assert(str_contains($bootstrap, "PRODUCT = 'mgd-ai-kennzeichnung-wordpress'"), 'Produktname mgd-ai-kennzeichnung-wordpress');
mgd_catalog_assert(str_contains($main, "Setup::updater( __FILE__, 'mgd-ai-kennzeichnung-wordpress'"), 'Baukasten-Updater angemeldet');
mgd_catalog_assert(str_contains($main, 'Setup::cleanupLegacy('), 'Alte Caches werden aufgeräumt');
mgd_catalog_assert(!str_contains($bootstrap, 'MGD_Plugin_Admin_Tools'), 'Admin-Tools-Baustein ist raus');
mgd_catalog_assert(!is_file($runtime . '/includes/class-mgd-plugin-admin-tools.php') && !is_file($runtime . '/includes/class-github-updater.php'), 'Alte Updater-Dateien gelöscht');
mgd_catalog_assert(!str_contains($bootstrap, 'MGD_WordPress_Plugin_Catalog_V4') && !is_file($runtime . '/includes/class-mgd-wordpress-plugin-catalog.php'), 'Alte Katalogseite V4 entfernt');
mgd_catalog_assert(!str_contains($bootstrap, 'add_media_page') && !str_contains($bootstrap, 'add_menu_page') && !str_contains($bootstrap, 'add_submenu_page'), 'Kein eigenes Menü mehr');
mgd_catalog_assert(is_file($runtime . '/includes/Kit/Platform/WordPress/Updater.php') && is_file($runtime . '/includes/Kit/Platform/WordPress/Tools.php'), 'Baukasten mit MGD Tools vorhanden');
mgd_catalog_assert(is_file($runtime . '/assets/icon-128x128.png') && is_file($runtime . '/assets/icon-256x256.png'), 'Plugin-Icons 128 und 256');
$uninstall = (string) file_get_contents($runtime . '/uninstall.php');
mgd_catalog_assert(str_contains($uninstall, "Setup::uninstall( 'mgd-ai-kennzeichnung-wordpress', 'wordpress' )") && str_contains($uninstall, 'WP_UNINSTALL_PLUGIN'), 'uninstall.php meldet ab');
foreach ($metadata as $repo => $item) { mgd_catalog_assert((bool) preg_match('/^[a-z0-9]+(-[a-z0-9]+)*$/', (string) ($item['slug'] ?? '')), 'Katalog-Kennung ' . $repo); }
$build = (string) file_get_contents($root . '/scripts/build-release.sh');
mgd_catalog_assert(str_contains($build, 'uninstall.php') && str_contains($build, '${1:-' . $config['version'] . '}'), 'Paket enthält uninstall.php und aktuelle Version');
echo "PASS Pluginversion, sieben Katalogeinträge, lokale Icons und vollständige Laufzeitdateien\n";
