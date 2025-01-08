<?php

require_once __DIR__ . '/../Private/Model/Temperature.php';
require_once __DIR__ . '/../bin/src/functions.inc.php';

$temperature = \Model\temperature::last5Days(5);
$title = 'Last 5 Days';

$temperatureSummary = true;
require_once __DIR__ . '/../Private/Views/template.php';

