<!DOCTYPE HTML>
<html>
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Jingo by Lakshmi, Garima</title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<div id="Jingo">
    <div id="header" class="container">
        <h1>Jingo</a></h1>
        
    </div>
</div>
<div id="mapContainer">
<script src="http://maps.google.com/maps/api/js?sensor=false">
</script>
<script type="text/javascript">
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position){
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var coords = new google.maps.LatLng(latitude, longitude);
        var mapOptions = {
            zoom: 15,
            center: coords,
            mapTypeControl: true,
            navigationControlOptions: {
                style: google.maps.NavigationControlStyle.SMALL
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(
                document.getElementById("mapContainer"), mapOptions
                );
            var marker = new google.maps.Marker({
                    position: coords,
                    map: map,
                    title: "Your current location!"
            });
 
        });
    }else {
        alert("Geolocation API is not supported in your browser.");
    }

</script>
</div>
<div id="gmap_login"></div>
<div class="actions">
    <div id="Login" class="button" value="login" type="submit" onClick="Login()">Login</div><br>
    
    <div id="Signup" class="button" value="signup" type="submit" onClick="Signup()">Signup</div>
</div>

<style type="text/css">
html, body{
    height: 100%;
    font-family: 'Open Sans Condensed', sans-serif;
    font-size: 16px;
    color: #000000;
}
#Jingo {
    overflow: hidden;
    height: 90px;
    background: url(img02.jpg) repeat-x left top;
}

#header {
    width: 950px;
    height: 200px;
    margin: 0 auto;
    padding: 0px 20px;
    background: url(img01.jpg) no-repeat left top;
}

#gmap_login{
    position: absolute;
    height: 30px;
    width: 90px;
    left: 300px;
    top: 400px;}
.actions{
    background-color: #FFFFFF;
    bottom: 150px;
    padding: 10px;
    position: absolute;
    right: 400px;
    z-index: 2;

    border-top: 1px solid #abbbcc;
    border-left: 1px solid #a7b6c7;
    border-bottom: 1px solid #a1afbf;
    border-right: 1px solid #a7b6c7;
    -webkit-border-radius: 40px;
    -moz-border-radius: 40px;
    border-radius: 40px;
}
.actions label{
    display: block;
    margin: 8px 0 8px 20px;
    text-align: center;
    width:200px;
}
    }
  .actions input, .actions select {
      width: 85%;
  }
  .button {
   width:500px;
   background: #3e9cbf; 
   padding: 8px 14px 10px; 
   border:1px solid #3e9cbf; 
   cursor:pointer; 
   font-size:1.5em;
   font-family:Oswald, sans-serif;
   letter-spacing:.1em;
   color: #fff;
   text-align: center;
   -webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
   -moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
   box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
   -moz-border-radius: 10px;
   -webkit-border-radius: 10px;
   border-radius: 10px;
  }
  .button:hover {
      color:#dfe7ea;
      -webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
      -moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
      box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
  }
  .button:active {
      border: 1px solid #8c98a7;
      -webkit-box-shadow: inset 0 0 4px 2px #abbccf, 0 0 1px 0 #eeeeee;
      -moz-box-shadow: inset 0 0 4px 2px #abbccf, 0 0 1px 0 #eeeeee;
      box-shadow: inset 0 0 4px 2px #abbccf, 0 0 1px 0 #eeeeee;
  }
#mapContainer {
    height: 800px;
    width: 1500px;
    border:10px solid #eaeaea;
    }
    map{
        width:100%;
        height: 100%;
    }
    content{
        width: 200px;
        position: absolute;
        z-index: 1;
        top=0;
        left=0;
        border: 4px solid black;
        background: #fff;
        padding: 20px;
    }
</style>
<script type="text/javascript">
function Login(){
window.open("http://localhost/Jingo/Jingo/Login.php");
}

function Signup(){
window.open("http://localhost/jingo/jingo/signup.php");
}
</script>
</head>
<body>
    <div id="mapContainer"></div>
</body>
</html>
