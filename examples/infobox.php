<?php
require __DIR__.'/../vendor/autoload.php';

$common= new Dialog\Options\Common(
    ['backtitle', 'Testing Dialog...']
);

$box = new Dialog\Widgets\Infobox('It is an infobox\nDialog & PHP is cool!');

$dialog = new \Dialog\Dialog($common, $box);
$dialog->run();