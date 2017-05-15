<?php
require __DIR__.'/../vendor/autoload.php';

$common= new Dialog\Options\Common(
    ['backtitle', 'Testing Dialog...']
);

$box = new Dialog\Widgets\Form('Form example:', 4,
    new Dialog\Options\Field('Field 1', [1,0], 'Default value for field 1', [1,10], 30, 0),
    new Dialog\Options\Field('Field 2', [2,0], '5.000,00', [2,10], 10, 0),
    new Dialog\Options\Field('Field 3', [3,0], '', [3,10], 10, 0)
);

$dialog = new \Dialog\Dialog($common, $box);
$dialog->run();
echo PHP_EOL, 'Output is: ', $dialog->output(), PHP_EOL;
echo PHP_EOL, 'Items selected are:', PHP_EOL;
print_r($box->items());
