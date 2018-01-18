<?php

$userid = "U9292ec26d665cfb8a06058247138283b";


$access_token = '3qpbMiQKI5Am4GqVqqkYgfih3AIb0xCY/G7DFiky7mUsUP2RwVX8+9PHGu2o3G4ok9RrFWjH5+d+2yEW76qWSOOgp6TiPGdi2naTH6AkL+JNSJKTYQvZa9mT9ZZf6PaC9Lq2EKjWQaabQ5rBMnSUkAdB04t89/1O/w1cDnyilFU=';


// Make a POST Request to Messaging API to reply to sender
  $url = 'https://api.line.me/v2/bot/message/push';


 $messages = [
				'type' => 'text',
				'text' => 'Hello'
			];

  $data = [
    'to' => $userid,
    'messages' => [$messages],
  ];
  $post = json_encode($data);
  $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  $result = curl_exec($ch);
  curl_close($ch);
  echo $result . "\r\n";


// Get POST body content




?>
