<?php
require __DIR__.'/../vendor/autoload.php';

$common= new Dialog\Options\Common(
    ['backtitle', 'Testing Dialog...']
);

$cmd = 'ls';
$text = 'running ls';
$box = new Dialog\Widgets\Prgbox($cmd, $text);
//$box = new Dialog\Widgets\Prgbox($cmd);
$box->height(20);
$box->width(80);

$dialog = new \Dialog\Dialog($common, $box);
$dialog->run();