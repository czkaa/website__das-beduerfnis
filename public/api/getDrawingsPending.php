<?php

  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
  header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');


  $dir = "pending";
  $files;

  function scan($dir){
    if(file_exists($dir)){
      foreach(scandir($dir) as $f) {
        if(!$f || $f[0] == '.') {
          continue; // Ignore hidden files
        }
        $files[] = json_decode(file_get_contents($dir . '/' . $f));
      }
    }
    return $files;
  }

  $response = scan($dir);

  print_r(json_encode($response));
?>
