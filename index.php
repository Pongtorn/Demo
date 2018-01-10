<?php
$access_token = '3qpbMiQKI5Am4GqVqqkYgfih3AIb0xCY/G7DFiky7mUsUP2RwVX8+9PHGu2o3G4ok9RrFWjH5+d+2yEW76qWSOOgp6TiPGdi2naTH6AkL+JNSJKTYQvZa9mT9ZZf6PaC9Lq2EKjWQaabQ5rBMnSUkAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

?>
