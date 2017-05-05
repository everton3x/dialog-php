<?php

require_once 'vendor/autoload.php';

$common1 = new Dialog\CommonOptions();
$common1->setBegin(2,2);
// $common1->setClear(true);
$common1->setKeepWindow(true);
$calendar1 = new Dialog\Widget\Calendar();
$calendar1->setText('Calendar One');
$dlg1 = new Dialog\Dialog($common1, $calendar1);

$common2 = new Dialog\CommonOptions();
$common2->setBegin(4,4);
$common2->setClear(true);
// $common2->setKeepWindow(true);
$calendar2 = new Dialog\Widget\Calendar();
$calendar2->setText('Calendar Two');
$dlg2 = new Dialog\Dialog($common2, $calendar2);

$common3 = new Dialog\CommonOptions();
$common3->setBegin(6,6);
$calendar3 = new Dialog\Widget\Calendar();
$calendar3->setText('Calendar Three');
$dlg3 = new Dialog\Dialog($common3, $calendar3);

$group = new Dialog\DialogGroup($dlg1, $dlg2, $dlg3);
$group->run();
