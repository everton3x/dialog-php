<?php

require_once 'vendor/autoload.php';

$common = new Dialog\CommonOptions();
$common->setBacktitle('Test of Dialog & PHP');
$common->setNoShadow(true);
$msgbox = new Dialog\Widget\Msgbox('Hello world!');
$dlg = new Dialog\Dialog($common, $msgbox);
$return = $dlg->run();

echo PHP_EOL, $return, PHP_EOL;
