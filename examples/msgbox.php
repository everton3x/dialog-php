<?php
require __DIR__.'/../vendor/autoload.php';

$common= new Dialog\Options\Common(
    ['backtitle', 'Testing Dialog...']
);

$box = new Dialog\Widgets\Msgbox('It is an msgbox\nDialog & PHP is cool!');

$dialog = new \Dialog\Dialog($common, $box);
$dialog->run();