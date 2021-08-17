<?php
  function getIP() {  
    //whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
      $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    //whether ip is from the proxy  
    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
  //whether ip is from the remote address
    else{
      $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
  }
  
  //ip
  $ip = getIP();
  
  $url = "http://ip-api.com/json/".$ip."?fields=query,country,city,lat,lon,isp,org,as";
  
  //fetch api 
  $rawData = file_get_contents($url);
  $data = json_decode($rawData);
  //country name (from api)
  $country = $data -> country;
  $city = $data -> city;
  //latitude
  $lat = $data -> lat;
  //longitude
  $long = $data -> lon;
  //ISP
  $isp = $data -> isp;
  //organization
  $org = $data -> org;
  //ASN
  $as = $data -> as;
  //date
  $date = date("d/m/Y");
  //time
  $time = date("H:i:s");
  //device info
  $deviceInfo = $_SERVER['HTTP_USER_AGENT'];
  
  //write downs all information in logs.txt file
  $file = fopen('logs2.txt', 'a');
  fwrite($file, "[\n  Latitude: ".$lat);
  fwrite($file, "\n  Longitude: ".$long);
  fwrite($file, "\n  IP: ".$ip);
  fwrite($file, "\n  City: ".$city."\n  Country: ".$country);
  fwrite($file, "\n  Date: ".$date."; ".$time);
  fwrite($file, "\n  Device Info: {\n    ".$deviceInfo."\n  }\n");
  fwrite($file, "\n  More: {\n    ISP: ".$isp."\n    Org: ".$org."\n    AS: ".$as."\n  }\n]\n\n");
  fclose($file);
?>