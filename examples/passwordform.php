<?php
require __DIR__.'/../vendor/autoload.php';

$common= new Dialog\Options\Common(
    ['backtitle', 'Testing Dialog...']
);

$box = new Dialog\Widgets\Passwordform('Form example:', 4,
    new Dialog\Options\Field('Password:', [1,0], '', [1,10], 30, 0),
    new Dialog\Options\Field('Retype:', [2,0], '', [2,10], 30, 0)
);

$dialog = new \Dialog\Dialog($common, $box);
$dialog->run();
echo PHP_EOL, 'Output is: ', $dialog->output(), PHP_EOL;
echo PHP_EOL, 'Items selected are:', PHP_EOL;
print_r($box->items());
