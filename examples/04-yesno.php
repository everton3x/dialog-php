<?php

require_once 'vendor/autoload.php';

$common = new Dialog\CommonOptions();
$yesno = new Dialog\Widget\Yesno('Dialog & PHP is wonderfull?');
$dlg = new Dialog\Dialog($common, $yesno);
$dlg->run();
$button_selected = $dlg->getExitCode();

switch ($button_selected) {
	case Dialog\Dialog::BUTTON_OK:
		$message = "Yeah!";
		break;
	case Dialog\Dialog::BUTTON_NO:
		$message = "Oh! No!";
		break;
	default:
		$message = 'An error occur!';
		break;
}

$common = new Dialog\CommonOptions();
$infobox = new Dialog\Widget\Infobox($message);
$dlg = new Dialog\Dialog($common, $infobox);
$dlg->run();
