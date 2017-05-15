<?php
require __DIR__.'/../vendor/autoload.php';

$common= new Dialog\Options\Common(
    ['backtitle', 'Testing Dialog...']
);

$box = new Dialog\Widgets\Menu('Change items:', 0,
    new \Dialog\Options\MenuItem(1, 'Item one'),
    new \Dialog\Options\MenuItem(2, 'Item two'),
    new \Dialog\Options\MenuItem(3, 'Item three'),
    new \Dialog\Options\MenuItem(4, 'Item four'),
    new \Dialog\Options\MenuItem('textual item', 'Another item')
);

$dialog = new \Dialog\Dialog($common, $box);
$dialog->run();
echo PHP_EOL, 'Output is: ', $dialog->output(), PHP_EOL;
echo PHP_EOL, 'Item selected is: ', $box->selected(), PHP_EOL;
