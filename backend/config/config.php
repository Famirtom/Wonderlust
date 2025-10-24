<?php
$envPath = __DIR__ . '/../.env';
if (file_exists($envPath)) {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $t = trim($line);
        if ($t === '' || str_starts_with($t, '#')) continue;
        [$name, $value] = array_pad(explode('=', $line, 2), 2, '');
        $name = trim($name); $value = trim($value);
        if ($name !== '') { $_ENV[$name]=$value; putenv("$name=$value"); }
    }
}
define('DB_HOST', getenv('DB_HOST') ?: '127.0.0.1');
define('DB_PORT', getenv('DB_PORT') ?: '3306');
define('DB_NAME', getenv('DB_NAME') ?: 'wonderlust');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');
define('APP_ENV', getenv('APP_ENV') ?: 'local');
define('APP_URL', getenv('APP_URL') ?: 'http://localhost');