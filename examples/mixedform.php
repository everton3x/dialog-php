<?php
require __DIR__.'/../vendor/autoload.php';

$common= new Dialog\Options\Common(
    ['backtitle', 'Testing Dialog...']
);

$box = new Dialog\Widgets\Mixedform('Form example:', 4,
    new Dialog\Options\MixedField('Normal', [1,0], '', [1,10], 30, 0, Dialog\Options\MixedField::TYPE_NORMAL),
    new Dialog\Options\MixedField('Hidden', [2,0], '', [2,10], 10, 0, Dialog\Options\MixedField::TYPE_HIDDEN),
    new Dialog\Options\MixedField('Read only', [3,0], 'hidden value', [3,10], 10, 0, Dialog\Options\MixedField::TYPE_READONLY)
);

$dialog = new \Dialog\Dialog($common, $box);
$dialog->run();
echo PHP_EOL, 'Output is: ', $dialog->output(), PHP_EOL;
echo PHP_EOL, 'Items selected are:', PHP_EOL;
print_r($box->items());
