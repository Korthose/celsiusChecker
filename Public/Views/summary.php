<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../Private/Model/Temperature.php';
require_once __DIR__ . '/../../bin/src/functions.inc.php';


$temperature = \Model\temperature::last5Days(3);
$title = 'Last 5 Days';

print_r($temperature);

$temperatureSummary = true;
require_once __DIR__ . '/../template.php';

