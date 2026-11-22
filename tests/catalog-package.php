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
// ab 1.1.0: Weitere Plugins + Updates über den Baukasten, alte Updater und Katalog V4 nicht mehr angemeldet
mgd_catalog_assert(str_contains($bootstrap, 'Setup::dashboard('), 'Dashboard vom Baukasten');
mgd_catalog_assert(str_contains($bootstrap, 'MGD_AI_Image_Labels_Plugin::$updater, $list, false, \'\''), 'Lizenz-Baustein aus');
mgd_catalog_assert(str_contains($bootstrap, "PRODUCT = 'mgd-ai-kennzeichnung-wordpress'"), 'Produktname mgd-ai-kennzeichnung-wordpress');
mgd_catalog_assert(str_contains($main, 'Setup::updater( __FILE__, MGD_AI_Image_Labels_Plugin::PRODUCT'), 'Baukasten-Updater angemeldet');
mgd_catalog_assert(str_contains($main, 'Setup::cleanupLegacy('), 'Alte Caches werden aufgeräumt');
mgd_catalog_assert(!str_contains($main, 'MGD_Plugin_Admin_Tools_20261023::register'), 'Admin-Tools-Updater abgeschaltet');
mgd_catalog_assert(!preg_match('/GitHub_Updater::register\s*\(/', $bootstrap), 'Eigener GitHub-Updater abgeschaltet');
mgd_catalog_assert(!preg_match('/new\s+\\\\?MGD_WordPress_Plugin_Catalog_V4\s*\(\s*\)\s*->\s*register/', $bootstrap), 'Alte Katalogseite abgeschaltet');
mgd_catalog_assert(is_file($runtime . '/includes/Kit/Platform/WordPress/Updater.php'), 'Baukasten vorhanden');
// ab 1.1.1: alte Seite V4 komplett weg, neue Ansicht Weitere Plugins mit Installieren-Knopf
mgd_catalog_assert(!is_file($runtime . '/includes/class-mgd-wordpress-plugin-catalog.php') && !str_contains($bootstrap, 'MGD_WordPress_Plugin_Catalog_V4'), 'Alte Katalogseite V4 entfernt');
mgd_catalog_assert(is_file($runtime . '/includes/Kit/Platform/WordPress/CatalogInstaller.php') && is_file($runtime . '/includes/Kit/Platform/WordPress/assets/kit-catalog.js'), 'Neue Ansicht Weitere Plugins im Baukasten');
mgd_catalog_assert(str_contains($bootstrap, "add_action( 'admin_init', array( self::class, 'actions' ) )") && str_contains($bootstrap, 'Setup::catalogActions( MGD_AI_Image_Labels_Plugin::PRODUCT'), 'Installieren-Knopf früh angemeldet');
$uninstall = (string) file_get_contents($runtime . '/uninstall.php');
mgd_catalog_assert(str_contains($uninstall, "Setup::uninstall( 'mgd-ai-kennzeichnung-wordpress', 'wordpress' )") && str_contains($uninstall, 'WP_UNINSTALL_PLUGIN'), 'uninstall.php meldet ab');
foreach ($metadata as $repo => $item) { mgd_catalog_assert((bool) preg_match('/^[a-z0-9]+(-[a-z0-9]+)*$/', (string) ($item['slug'] ?? '')), 'Katalog-Kennung ' . $repo); }
$build = (string) file_get_contents($root . '/scripts/build-release.sh');
mgd_catalog_assert(str_contains($build, 'uninstall.php') && str_contains($build, '${1:-' . $config['version'] . '}'), 'Paket enthält uninstall.php und aktuelle Version');
echo "PASS Pluginversion, sieben Katalogeinträge, lokale Icons und vollständige Laufzeitdateien\n";
