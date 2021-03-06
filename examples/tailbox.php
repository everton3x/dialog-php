<?php
require __DIR__.'/../vendor/autoload.php';

$common= new Dialog\Options\Common(
    ['backtitle', 'Testing Dialog...']
);

$box = new Dialog\Widgets\Tailbox(__FILE__);
$box->height(20);
$box->width(80);

$dialog = new \Dialog\Dialog($common, $box);
$dialog->run();