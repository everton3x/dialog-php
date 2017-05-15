<?php
require __DIR__.'/../vendor/autoload.php';

$common= new Dialog\Options\Common(
    ['backtitle', 'Testing Dialog...'],
    ['separate_output', true],
    ['separator', ':']
);

$box = new Dialog\Widgets\Checklist('Select items:', 0,
    new \Dialog\Options\Item(1, 'Item one'),
    new \Dialog\Options\Item(2, 'Item two'),
    new \Dialog\Options\Item(3, 'Item three', true),
    new \Dialog\Options\Item(4, 'Item four'),
    new \Dialog\Options\Item('textual item', 'Another item', true)
);

$dialog = new \Dialog\Dialog($common, $box);
$dialog->run();
echo PHP_EOL, 'Output is: ', $dialog->output(), PHP_EOL;
echo PHP_EOL, 'Items selected are:', PHP_EOL;
print_r($box->items());
