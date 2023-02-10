<?php 
error_reporting(0);
$ten = $_GET['baihat'];
$urlsearch = "https://chiasenhac.vn/search/real?q=".$ten."&type=json&rows=3&view_all=true";
$data = file_get_contents($urlsearch);
$convert = json_decode($data);
$array = json_decode(json_encode($convert), true);
$url = ($array['0']['music']['data']['0']['music_link']);
$tenbaihat = ($array['0']['music']['data']['0']['music_title']);
$casy = ($array['0']['music']['data']['0']['music_artist']);
$thumb = ($array['0']['music']['data']['0']['music_cover']);
include('simple_html_dom.php');
$html = file_get_html($url);
$linkraw = $html->find('.download_item',0)->getAttribute( 'href' );
$lock =  strpos($linkraw, '/128');//get vi tri link 128 
$lock2 =  strpos($linkraw, '.mp3');//get vi tri duoi .mp3
$link01 = substr( $linkraw,  0, $lock); //cat lay phan link dau 
$link02 = substr( $linkraw,  $lock + 5  ,strlen($linkraw) - strlen($link01) - 9 );//cat link duoi 
$link320 = $link01."/320/".$link02.".mp3";
$link500 = $link01."/m4a/".$link02.".m4a";
$linkflac = $link01."/flac/".$link02.".flac";
$messages[] = array('text' => "Bài " . $tenbaihat . " của ca sĩ " . $casy . " phải không nè !");
$messages[] = array('attachment' => array('type' => 'image','payload' => array('url' => $thumb)));
$messages[] = array('attachment' => array('type' => 'audio','payload' => array('url' => $link320)));		  	 			  
$msg        = array('messages' => $messages);              
echo json_encode($msg);
?>
