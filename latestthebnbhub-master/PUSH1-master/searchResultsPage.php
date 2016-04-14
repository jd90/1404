<?php
session_start();
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="icon"
          type="image/png"
          href="assets/b&bicon.png">
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
     <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Search Results: theB&Bhub</title>
    <script src="https://maps.googleapis.com/maps/api/js"
            type="text/javascript"></script>
    <script type="text/javascript">
        //<![CDATA[
        var customIcons = {
            restaurant: {
                icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png'
            },
            bar: {
                icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png'
            }
        };

        function load(mapreq) {

            map = new google.maps.Map(document.getElementById("map"), {
                center: new google.maps.LatLng(55, -3),
                zoom: 5,
                mapTypeId: 'roadmap'
            });
            infoWindow = new google.maps.InfoWindow;
            // Change this depending on the name of your PHP file
            downloadUrl(mapreq, function(data) {
                var xml = data.responseXML;
                markers = xml.documentElement.getElementsByTagName("marker");


                for (var i = 0; i < markers.length; i++) {
                    var name = markers[i].getAttribute("name");
                    var address = markers[i].getAttribute("address");
                    var type = markers[i].getAttribute("type");
                    var point = new google.maps.LatLng(
                        parseFloat(markers[i].getAttribute("lat")),
                        parseFloat(markers[i].getAttribute("lng")));
                    html = "<b>" + name + "</b> <br/>" + address;
                    var icon = customIcons[type] || {};
                    var marker = new google.maps.Marker({
                        map: map,
                        position: point,
                        icon: icon.icon
                    });

                    var myLatlng = new google.maps.LatLng(markers[0].getAttribute("lat"), markers[0].getAttribute("lng"));

                    if (markers[0].getAttribute("lat") != "") {

                    map.setZoom(12);
                    map.panTo(myLatlng);
                }

                    bindInfoWindow(marker, map, infoWindow, html);
                }

            });
        }

        function panToBB(bbnameNum){

            //alert(""+bbnameNum);
        var myLatlng = new google.maps.LatLng(markers[bbnameNum].getAttribute("lat"), markers[bbnameNum].getAttribute("lng"));

        map.setZoom(13);
        map.panTo(myLatlng);


            var name = markers[bbnameNum].getAttribute("name");
            var address = markers[bbnameNum].getAttribute("address");
            var type = markers[bbnameNum].getAttribute("type");
            var point = new google.maps.LatLng(
                parseFloat(markers[bbnameNum].getAttribute("lat")),
                parseFloat(markers[bbnameNum].getAttribute("lng")));
            html = "<b>" + name + "</b> <br/>" + address;
            var icon = customIcons[type] || {};
            var markerPan = new google.maps.Marker({
                map: map,
                position: point,
                icon: icon.icon});

            infoWindow.setContent(html);
            infoWindow.open(map, markerPan);

        }


        function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
            });
        }
        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;
            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    request.onreadystatechange = doNothing;
                    callback(request, request.status);
                }
            };
            request.open('GET', url, true);
            request.send(null);
        }
        function doNothing() {}

     //]]>
    </script>

</head>
<body onload="load('map.php?location=<?php echo "{$_POST['location']}";?> ')">

<section class="container" id="banner">
    <div class="floatleft">
        <img src = "assets/bnblogocroporange.png" id="img">
    </div>
    <div class="floatright">

        <?php
        if ($_SESSION["user"] != null) {
            echo "<p id='loginText'>Currently signed in as: " . $_SESSION["user"];
            echo "    not you?</p><button id='logout()' onclick='logout()'>LOGOUT</button>";
        }else{
            echo "<p id='loginText'>currently not logged in";
        }
        ?>
    </div>
    <script>
        function logout() {
            window.location = "SearchBB.php";
        }
    </script>
</section>


<section class="container" id="navigation2">
    <div>
        <nav role="main">
            <ul>
                <li><a href="help.php#helpsection">Help</a></li>
                <li><a href="help.php#contactsection">Contact</a></li>
                <li><a href="B&Bregistration.php">Register</a></li>
                <li><a href="OwnerSignIn.php">Member Area</a></li>
                <li><a href="SearchBB.php">Search</a></li>
            </ul>
        </nav>
    </div>
</section>


<section class="googlemap" id="mapapi">






<!--
    <script>
        var mapCanvas = document.getElementById("map");
        var mapOptions = {
            center: new google.maps.LatLng(57.2, -2.2), zoom: 10
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);

        function viewonmap(){

            map = new google.maps.Map()

        }


    </script>
-->

</section>

<section class="spacer" id="spacer">


</section>

<section class="container" id="featured">
    <div class="centre">
        <p>Here are your search results...</p>

</div>
    </section>


<section class="container" id="content2">


    <div class="main">

        <div id="mapView">

            <div id="map" style="width:425px;height:425px;background:snow"></div>

            </div>

        <?php
        $city = $_POST['location'];

        $conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        try{
            $st = $conn-> query("SELECT * FROM [B&B] WHERE [city] = '$city'");


            $count=0;
            $locations;


            foreach($st->fetchAll() as $row) {
                $newhtml =
                    <<<NEWHTML
                        <div class="table5">


<a href="Customerinfo.php" id="nodec">

<table border="0" cellpadding="5">

<form action="Customerinfo.php" method="post">
                       <tr hidden><td>
                    <label for="bbname">BBname:</label></td>
                <td> <input type="text" id="bbname" name="bbname" value="{$row[bbname]}" readonly></option>
                              </td></tr>
                              <tr hidden><td>
                    <label for="bbid">BBid:</label></td>
                <td> <input type="text" id="bbid" name="bbid" value="{$row[bbid]}" readonly></option>
                               </td></tr><input type="submit" style="float:right;" class="btn" value="SELECT">
                              </form>


<tr>
<td><strong><img src="{$row[imageurl]}" id="img3"></strong></td>
<td>
<table border="0" cellpadding="5">
<tr>
<td colspan="2">B&B Name: <strong>{$row[bbname]}</strong></td>
</tr>
<tr>
<td colspan="2">Address: <strong>{$row[address]}</strong></td>
</tr>
<tr>
<td>Location: <strong>{$row[city]}</strong></td>
<td>Postcode: <strong>{$row[postcode]}</strong></td>
</tr>
<tr>
<td>Check-in: <strong>{$row[checkin]}</strong></td>
<td>Check-out: <strong>{$row[checkout]}</strong></td>
</tr>
<tr>
<td>Pets allowed: <strong>{$row[pets]}</strong></td>
</tr>

</table>
</td>
</tr>
</table></a>

<button style="float:right;" class="btn" onclick="panToBB($count)">ViewMap</button>

</div>
</form>

NEWHTML;
                print($newhtml);
                $count++;
            }
        }
        catch(PDOException $e)
        {print"$e";}
        ?>

    </div>

    <section class="spacer" id="spacer">


    </section>




    <section class="container" id="content2">


        <div class="main">



            <?php

            $region = $_POST['region'];
            $conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            try{

                $st = $conn-> query("SELECT * FROM [B&B] WHERE [region] = '$region'");

                $count=0;

                $regions;

                foreach($st->fetchAll() as $row) {
                    $newhtml =
                        <<<NEWHTML
                            <div class="table5">
<a href="Customerinfo.php" id="nodec"><table border="0" cellpadding="5">


<form action="Customerinfo.php" method="post">
                       <tr hidden><td>
                    <label for="bbname">BBname:</label></td>
                <td> <input type="text" id="bbname" name="bbname" value="{$row[bbname]}" readonly></option>
                              </td></tr>
                              <tr hidden><td>
                    <label for="bbid">BBid:</label></td>
                <td> <input type="text" id="bbid" name="bbid" value="{$row[bbid]}" readonly></option>
                               </td></tr><input type="submit" style="float:right;" class="btn" value="SELECT">
                              </form>


<tr>
<td><strong><img src="{$row[imageurl]}" id="img3"></strong></td>
<td>
<table border="0" cellpadding="5">
<tr>
<td colspan="2">B&B Name: <strong>{$row[bbname]}</strong></td>
</tr>
<tr>
<td colspan="2">Address: <strong>{$row[address]}</strong></td>
</tr>
<tr>
<td>Location: <strong>{$row[city]}</strong></td>
<td>Postcode: <strong>{$row[postcode]}</strong></td>
</tr>
<tr>
<td>Check-in: <strong>{$row[checkin]}</strong></td>
<td>Check-out: <strong>{$row[checkout]}</strong></td>
</tr>
<tr>
<td>Pets allowed: <strong>{$row[pets]}</strong></td>
</tr>

</table>
</td>
</tr>
</table></a>

<button style="float:right;" class="btn" onclick="panToBB($count)">ViewMap</button>

</div>

NEWHTML;
                    print($newhtml);
                    $count++;
                }
            }
            catch(PDOException $e)
            {print"$e";}
            ?>

        </div>

        <section class="spacer" id="spacer">


        </section>








        <section class="container" id="foot">

    <div id="footernav">
        <nav role="sub">
            <ul>
                <li><a href="SearchBB.php">Search</a></li>
                <li><a href="OwnerSignIn.php">Member Area</a></li>
                <li><a href="B&Bregistration.html">Register</a></li>
                <li><a href="help.php#contactsection">Contact</a></li>
                <li><a href="help.php#helpsection">Help</a></li>
            </ul>
        </nav>
    </div>
    <p>&nbsp;</p>
    <div id="copyright">
        <hr width="100%" size="1">
        <p>Copyright. Team D Solutions.</p>
    </div>

</section>



<script type="text/javascript">
</script>


</body>
</html>
