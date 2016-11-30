<!DOCTYPE HTML>
<html>
<head>
<title>Old West Animal Hospital</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/main.css" />
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
	var myCenter=new google.maps.LatLng(32.588038,-97.167222);

	function initialize() {
		var mapProp = {
  		center:myCenter,
  		zoom:11,
  		mapTypeId:google.maps.MapTypeId.ROADMAP
  		};

		var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

		var marker=new google.maps.Marker({
  		position:myCenter,
  		});

		marker.setMap(map);
	}
	
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
<div id="page-wrapper">

	<!-- Header -->
	<div id="header">

	<!-- Logo -->
	<h1><a href="home.php" id="logo"><img src="images/logo_skyblue.png" width="3%" height"3%">  Old West Animal Hospital</a></h1>