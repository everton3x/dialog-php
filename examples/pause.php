<?php
require __DIR__.'/../vendor/autoload.php';

$common= new Dialog\Options\Common(
    ['backtitle', 'Testing Dialog...']
);

$box = new Dialog\Widgets\Pause('Pause to think.', 10);

$dialog = new \Dialog\Dialog($common, $box);
$dialog->run();