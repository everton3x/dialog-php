<?php
require __DIR__.'/../vendor/autoload.php';

$common= new Dialog\Options\Common(
    ['backtitle', 'Testing Dialog...']
);

$box = new Dialog\Widgets\Textbox(__FILE__);

$dialog = new \Dialog\Dialog($common, $box);
$dialog->run();