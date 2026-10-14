<?php

  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
  header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

  $jsonStringObject = file_get_contents("php://input");
  $path = json_decode($jsonStringObject);
  $find = 'pending';
  $replacement = 'accepted';
  rename($path, str_replace($find, $replacement, $path));

?>
