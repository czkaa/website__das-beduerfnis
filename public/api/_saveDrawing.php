<?php

  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
  header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

  $jsonStringObject = file_get_contents("php://input");
  $phpObject = json_decode($jsonStringObject, true);

  $jsonString = file_get_contents('fingerprints.json');
  $data = json_decode($jsonString, true);

  if(is_null($phpObject)) {
    exit;
  }

  $isPresent = false;
  foreach ($data as $arrayObject) {
    if ($arrayObject['string'] === $phpObject['string']) {
      $isPresent = true;
      break;
    }
  }

  if (!$isPresent) {
    $data[] = $phpObject;
    $newJsonString = json_encode($data);
    file_put_contents('fingerprints.json', $newJsonString);
  }

?>
