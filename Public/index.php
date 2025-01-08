<?php
require_once __DIR__ . '/../Private/Model/Temperature.php';
require_once __DIR__ . '/../bin/src/functions.inc.php';

$temperature = \Model\temperature::newestTemperature();
$title = 'Current temperature';

$currentTemperature = true;
require_once __DIR__ . '/../Private/Views/template.php';

