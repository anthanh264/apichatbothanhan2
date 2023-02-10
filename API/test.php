<?php
error_reporting(0);
require_once 'construct.php';
	require_once PATH_LIB . 'validate.php';
	$link ="http://apichatbothanhan.herokuapp.com/";
	$tit = "fget";
	$buttons = array();
	$buttons[] = $bot->createButtonToURL('128 kbps', $link);
	$buttons[] = $bot->createButtonToURL('320 kbps', $link);
	$buttons[] = $bot->createButtonToURL('320 kbps', $link);
	//$buttons[] = $bot->createButtonToURL('320 kbps', $link);

	$text = "{$tit}";
	$bot->sendTextCard($text, $buttons);