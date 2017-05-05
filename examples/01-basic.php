<?php

require_once 'vendor/autoload.php';

$common = new Dialog\CommonOptions();
$common->setBacktitle('Test of Dialog & PHP');
$common->setNoShadow(true);
$infobox = new Dialog\Widget\Infobox('Hello world!');
$dlg = new Dialog\Dialog($common, $infobox);
$dlg->run();
