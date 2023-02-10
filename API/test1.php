<?php 

$link = "http://data25.chiasenhac.com/downloads/2061/3/2060821-946b2223/128/Anh%20Thanh%20Nien%20-%20HuyR%20[128kbps_MP3].mp3";
                $messages[] = array(
                  'attachment' => array(
                      'type' => 'audio',
                      'payload' => array(
                          'url' => $link
                      )
                  )
              );
			 			  
              $msg        = array(
                  'messages' => $messages
              );
              
              echo json_encode($msg);
