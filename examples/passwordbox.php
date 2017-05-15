<?php
require __DIR__.'/../vendor/autoload.php';

$common= new Dialog\Options\Common(
    ['backtitle', 'Testing Dialog...']
);

$box = new Dialog\Widgets\Passwordbox('Password');

$dialog = new \Dialog\Dialog($common, $box);
$dialog->run();

echo PHP_EOL, 'Output is: ', $dialog->output(), PHP_EOL;