<?php

  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
  header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

  function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
  }

  $jsonStringObject = file_get_contents("php://input");
  $phpObject = json_decode($jsonStringObject, true);

  $hash = generateRandomString();
  $date = date('Y-m-d');
  $time = date('H-i-s-ms');

  $phpObject['hash'] = $hash;
  $phpObject['date'] = $date;
  $phpObject['time'] = $time;
  $phpObject['path'] = 'pending/' . $date . '_' . $time . '_' . $hash . '.json';


  $newJsonString = json_encode($phpObject);
  file_put_contents('pending/' . $date . '_' . $time . '_' . $hash . '.json', $newJsonString );
?>
