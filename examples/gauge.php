<?php
require __DIR__ . '/../vendor/autoload.php';

$common = new Dialog\Options\Common(
    ['backtitle', 'Testing Dialog...']
);

$box = new Dialog\Widgets\Gauge('Processing...', function($dialog) {
    $p = 0;
    while ($p < 100) {
        sleep(0.1);
        $p++;
        $dialog->write("\n\r$p");
    }
    return;
});

$dialog = new \Dialog\Dialog($common, $box);
$dialog->run();