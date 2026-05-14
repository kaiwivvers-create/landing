<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');
header('Content-Type: text/html; charset=utf-8');

$base = __DIR__;

function h($v): string {
    return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
}

function ok(bool $pass): string {
    return $pass ? '✅' : '❌';
}

function row(string $label, $value, bool $pass = true): void {
    echo '<tr>';
    echo '<td style="padding:8px 10px;border:1px solid #333;vertical-align:top;">' . h($label) . '</td>';
    echo '<td style="padding:8px 10px;border:1px solid #333;vertical-align:top;">' . ok($pass) . '</td>';
    echo '<td style="padding:8px 10px;border:1px solid #333;vertical-align:top;white-space:pre-wrap;overflow-wrap:anywhere;">' . h(is_scalar($value) || $value === null ? (string) $value : json_encode($value, JSON_PRETTY_PRINT)) . '</td>';
    echo '</tr>';
}

$checks = [
    'php_version' => PHP_VERSION,
    'document_root' => $_SERVER['DOCUMENT_ROOT'] ?? '',
    'script_filename' => $_SERVER['SCRIPT_FILENAME'] ?? '',
    'cwd' => getcwd(),
    'autoload_exists' => file_exists($base . '/vendor/autoload.php'),
    'bootstrap_exists' => file_exists($base . '/bootstrap/app.php'),
    'env_exists' => file_exists($base . '/.env'),
    'storage_exists' => is_dir($base . '/storage'),
    'bootstrap_cache_exists' => is_dir($base . '/bootstrap/cache'),
    'storage_writable' => is_writable($base . '/storage'),
    'bootstrap_cache_writable' => is_writable($base . '/bootstrap/cache'),
    'index_exists' => file_exists($base . '/index.php'),
    'extensions' => [
        'openssl' => extension_loaded('openssl'),
        'pdo' => extension_loaded('pdo'),
        'pdo_mysql' => extension_loaded('pdo_mysql'),
        'mysqli' => extension_loaded('mysqli'),
        'mbstring' => extension_loaded('mbstring'),
        'tokenizer' => extension_loaded('tokenizer'),
        'xml' => extension_loaded('xml'),
        'ctype' => extension_loaded('ctype'),
        'json' => extension_loaded('json'),
        'fileinfo' => extension_loaded('fileinfo'),
        'bcmath' => extension_loaded('bcmath'),
    ],
];

$db = [
    'host' => 'localhost',
    'port' => 3306,
    'database' => 'rplr9113_bryan',
    'username' => 'bryan@bryan.rplkodingan.com',
    'password' => 'kai250510',
];

$dbStatus = 'Not tested';
$dbPass = false;
if (extension_loaded('mysqli')) {
    mysqli_report(MYSQLI_REPORT_OFF);
    $mysqli = @new mysqli($db['host'], $db['username'], $db['password'], $db['database'], $db['port']);
    if ($mysqli->connect_errno) {
        $dbStatus = 'Connect failed: ' . $mysqli->connect_error;
    } else {
        $dbPass = true;
        $dbStatus = 'Connected OK';
        $mysqli->close();
    }
} else {
    $dbStatus = 'mysqli extension missing';
}

$laravelStatus = 'Skipped';
$laravelPass = false;
if ($checks['autoload_exists'] && $checks['bootstrap_exists']) {
    try {
        require $base . '/vendor/autoload.php';
        $app = require $base . '/bootstrap/app.php';
        $laravelPass = true;
        $laravelStatus = 'Bootstrap OK';
    } catch (Throwable $e) {
        $laravelStatus = get_class($e) . ': ' . $e->getMessage();
    }
} else {
    $laravelStatus = 'vendor/autoload.php atau bootstrap/app.php tidak ada';
}

?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hosting Check</title>
    <style>
        body{font-family:Arial,sans-serif;background:#111827;color:#e5e7eb;margin:0;padding:24px}
        h1,h2{margin:0 0 16px}
        .card{background:#1f2937;border:1px solid #374151;border-radius:12px;padding:18px;margin-bottom:18px}
        table{width:100%;border-collapse:collapse;background:#111827}
        code{background:#0b1220;padding:2px 6px;border-radius:6px}
        .muted{color:#9ca3af}
    </style>
</head>
<body>
    <div class="card">
        <h1>Hosting Check</h1>
        <div class="muted">Upload file ini ke root hosting yang sama dengan project Laravel.</div>
    </div>

    <div class="card">
        <h2>Core</h2>
        <table>
            <?php row('PHP Version', $checks['php_version'], version_compare(PHP_VERSION, '8.2.0', '>=')); ?>
            <?php row('Document Root', $checks['document_root']); ?>
            <?php row('Script Filename', $checks['script_filename']); ?>
            <?php row('Current Working Dir', $checks['cwd']); ?>
            <?php row('vendor/autoload.php', $checks['autoload_exists'] ? 'Found' : 'Missing', $checks['autoload_exists']); ?>
            <?php row('bootstrap/app.php', $checks['bootstrap_exists'] ? 'Found' : 'Missing', $checks['bootstrap_exists']); ?>
            <?php row('.env', $checks['env_exists'] ? 'Found' : 'Missing', $checks['env_exists']); ?>
            <?php row('storage/', $checks['storage_exists'] ? 'Found' : 'Missing', $checks['storage_exists']); ?>
            <?php row('bootstrap/cache/', $checks['bootstrap_cache_exists'] ? 'Found' : 'Missing', $checks['bootstrap_cache_exists']); ?>
            <?php row('storage writable', $checks['storage_writable'] ? 'Yes' : 'No', $checks['storage_writable']); ?>
            <?php row('bootstrap/cache writable', $checks['bootstrap_cache_writable'] ? 'Yes' : 'No', $checks['bootstrap_cache_writable']); ?>
        </table>
    </div>

    <div class="card">
        <h2>PHP Extensions</h2>
        <table>
            <?php foreach ($checks['extensions'] as $name => $enabled) { row($name, $enabled ? 'Enabled' : 'Missing', $enabled); } ?>
        </table>
    </div>

    <div class="card">
        <h2>Database</h2>
        <table>
            <?php row('DB Host', $db['host']); ?>
            <?php row('DB Name', $db['database']); ?>
            <?php row('DB User', $db['username']); ?>
            <?php row('MySQL Connection', $dbStatus, $dbPass); ?>
        </table>
    </div>

    <div class="card">
        <h2>Laravel Bootstrap</h2>
        <table>
            <?php row('Bootstrap Result', $laravelStatus, $laravelPass); ?>
        </table>
    </div>
</body>
</html>
