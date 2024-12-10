<?php

function getSettings(): array
{
    $environment = []; //zuweisung damit es existiert?
    $stream = file_get_contents(__DIR__ . "/../../.env"); // file_get_contents um .env in einen string zu machen
    $lines = explode(PHP_EOL, $stream); // explode um aus einen string einen array zu machen (mit PHP_EOL als Separator)
    foreach ($lines as $line) {
        if ($line && strpos($line, "=")) { //if line exist & line ein = drinne hat
            list($key, $value) = explode("=", $line);
            $environment[$key] = $value;
        }
    }
    return $environment;
}

function getPDO(): PDO
{
    $settings = getSettings();
    $host = $settings['DB_HOST'];
    $db = $settings['DB_DATABASE'];
    $user = $settings['DB_USERNAME'];
    $pass = $settings['DB_PASSWORD'];
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    return new PDO($dsn, $user, $pass, $options);
}