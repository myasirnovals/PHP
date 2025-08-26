<?php

require_once __DIR__ . '/vendor/autoload.php';

use Iyytechnology\BelajarPhpComposer\Data\People;

$people = new People("Yasir");

echo $people->sayHello("Budi") . PHP_EOL;