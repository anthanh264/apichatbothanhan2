<?php
error_reporting(0);
$tex = $_GET["text"];
$url = "https://zing-mp3.glitch.me/?url=".$tex;

$data = file_get_contents($url);
$convert = json_decode($data);
$array = json_decode(json_encode($convert), true);
$link = ($array['source']['audio']['128']['download']);
$link1 = ($array['source']['audio']['320']['download']);
$tenbaihat = ($array['title']);
$casy = ($array['artist']);
require_once 'construct.php';
	require_once PATH_LIB . 'validate.php';


	$buttons = array();
	$buttons[] = $bot->createButtonToURL('128 kbps', $link);
	$buttons[] = $bot->createButtonToURL('320 kbps', $link1);
	//$buttons[] = $bot->createButtonToURL('Lossless', $linklossless);
	$text = "{$tenbaihat} - {$casy}";
	$bot->sendTextCard($text, $buttons);
	$buttons = array();
	$buttons[] = $bot->createButtonQuickReply("Get tiếp", "DownloadMusicZingMP3");
	$buttons[] = $bot->createButtonQuickReply("Để khi khác",'outmove');
	$text = "Get nữa không {$gender}";
	$bot->sendQuickReply($text, $buttons);