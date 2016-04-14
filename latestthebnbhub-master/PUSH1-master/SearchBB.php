<?php
session_start();
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon"
          type="image/png"
          href="assets/b&bicon.png">
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Search: theB&Bhub</title>



    <script type="text/javascript">
        //<![CDATA[

        var tabLinks = new Array();
        var contentDivs = new Array();

        function init() {

            // Grab the tab links and content divs from the page
            var tabListItems = document.getElementById('tabs').childNodes;
            for ( var i = 0; i < tabListItems.length; i++ ) {
                if ( tabListItems[i].nodeName == "LI" ) {
                    var tabLink = getFirstChildWithTagName( tabListItems[i], 'A' );
                    var id = getHash( tabLink.getAttribute('href') );
                    tabLinks[id] = tabLink;
                    contentDivs[id] = document.getElementById( id );
                }
            }

            // Assign onclick events to the tab links, and
            // highlight the first tab
            var i = 0;

            for ( var id in tabLinks ) {
                tabLinks[id].onclick = showTab;
                tabLinks[id].onfocus = function() { this.blur() };
                if ( i == 0 ) tabLinks[id].className = 'selected';
                i++;
            }

            // Hide all content divs except the first
            var i = 0;

            for ( var id in contentDivs ) {
                if ( i != 0 ) contentDivs[id].className = 'tabContent hide';
                i++;
            }
        }

        function showTab() {
            var selectedId = getHash( this.getAttribute('href') );

            // Highlight the selected tab, and dim all others.
            // Also show the selected content div, and hide all others.
            for ( var id in contentDivs ) {
                if ( id == selectedId ) {
                    tabLinks[id].className = 'selected';
                    contentDivs[id].className = 'tabContent';
                } else {
                    tabLinks[id].className = '';
                    contentDivs[id].className = 'tabContent hide';
                }
            }

            // Stop the browser following the link
            return false;
        }

        function getFirstChildWithTagName( element, tagName ) {
            for ( var i = 0; i < element.childNodes.length; i++ ) {
                if ( element.childNodes[i].nodeName == tagName ) return element.childNodes[i];
            }
        }

        function getHash( url ) {
            var hashPos = url.lastIndexOf ( '#' );
            return url.substring( hashPos + 1 );
        }

        //]]>
    </script>
</head>

<body>

<section class="container" id="banner">
    <div class="floatleft">
        <img src = "assets/bnblogocroporange.png" id="img">
    </div>
    <div class="floatright">

        <?php

        if($_GET['value']=="logout"){
            session_unset();
        }
        if ($_POST['user'] != null) {
            $_SESSION["user"] = $_POST['user'];
            $_SESSION["ownerid"] = $_POST['ownerid'];

        }
        if ($_SESSION["user"] != null) {
            echo "<p id='loginText'>Currently signed in as: " . $_SESSION["user"];
            echo "    not you?</p><button id='logout()' onclick='logout()'>LOGOUT</button>";
        }else{
            echo "<p id='loginText'>currently not logged in!";
        }


        ?>
        <script>
            function logout() {
                window.location = "SearchBB.php";
            }
        </script>
    </div>
</section>

<section class="container" id="navigation">
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

<section class="container" id="content">
    <form action="searchResultsPage.php" method="post">
        <table class="tablesearch">
            <tr><td colspan="4"><h1>Search for a B&B</h1></td></tr>
            <tr><td colspan="4"><h4>* Search all across the UK for B&B's</h4></td></tr>
            <tr><td colspan="2"><label for="location">Pick a location:</label></td></tr>
            <tr><td colspan="2"><select class="inputform" id="location" name="location">

                    <?php
                        $conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
                        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                    try{
                    $st = $conn-> query("SELECT DISTINCT [city] FROM [B&B]");
                    foreach($st->fetchAll() as $row) {
                    $newhtml =
<<<NEWHTML
                    <option value="{$row[city]}">{$row[city]}</option>
NEWHTML;
                    print($newhtml);
                    }
                    }
                    catch(PDOException $e)
                    {print"$e";}
                    ?>

                </select>
              </td>
            </tr>



            <tr>
                <td colspan="2"><label for="dateday">Check In Date:</label></td>
                <td colspan="2"><label for="datemonth">Check Out Date:</label></td>
                </tr>
            <tr>
                <td><select id="date" class="inputform" name="date">
                        <option value="day">Select Day:</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>

                <td><select id="month" class="inputform" name="month">
                        <option value="month">Select Month:</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                    </select>
                </td>



                <td><select id="date" class="inputform" name="date">
                        <option value="day">Select Day:</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>

                <td><select id="month" class="inputform" name="month">
                        <option value="month">Select Month:</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                    </select>
                </td>



            </tr>


           <tr>
               <td colspan="4">

              <a href="searchResultsPage.php"><input class="btn3" type="submit" value="SEARCH"  /></a></td>
          </tr>
      </table>
    </form>

</section>


<section class="spacer" id="spacer">


</section>


<section class="container" id="featured">
<div class="centre">
    <p>Search for a bed and breakfast by region</p>
     </div>

</section>

<body onload="init()">


<ul id="tabs">
    <li><a href="#regions">Regional Area's</a></li>
    <li><a href="#cities">Town's & City's</a></li>
    <li><a href="#areas">Most Popular</a></li>
</ul>

<div class="tabContent" id="regions">

    <div>
        <p>Looking for a B&B in a Region of the UK but not sure where to stay? Find all B&B's by Region...</p>
        <p>

        <table border="0" class="tablejava">

           <tr>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="region" value='london'>
                        <button class="btnclear" type="submit" >London</button>
                    </form></td>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="region" value='westmidlands'>
                        <button class="btnclear" type="submit" >West Midlands</button>
                    </form></td>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="region" value='east'>
                        <button class="btnclear" type="submit" >East</button>
                    </form></td>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="region" value='wales'>
                        <button class="btnclear" type="submit" >Wales</button>
                    </form></td>
            </tr>
            <tr>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="region" value='southeast'>
                        <button class="btnclear" type="submit" >South East</button>
                    </form></td>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="region" value='eastmidlands'>
                        <button class="btnclear" type="submit" >East Midlands</button>
                    </form></td>

                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="region" value='west'>
                        <button class="btnclear" type="submit" >West</button>
                    </form></td>

                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="region" value='northernireland'>
                        <button class="btnclear" type="submit" >Northern Ireland</button>
                    </form></td>
            </tr>
            <tr>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="region" value='southwest'>
                        <button class="btnclear" type="submit" >South West</button>
                    </form></td>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="region" value='yorkshireandthehumber'>
                        <button class="btnclear" type="submit" >Yorkshire and the Humber</button>
                    </form></td>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="region" value='northeast'>
                        <button class="btnclear" type="submit" >North East</button>
                    </form></td>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="region" value='scotland'>
                        <button class="btnclear" type="submit" >Scotland</button>
                    </form></td>
            </tr>
        </table>

    </div>
</div>

<div class="tabContent" id="cities">

    <div>
        <p>Looking for a B&B in a City of the UK but not sure where to stay? Find all B&B's by City...</p>
        <p>

        <table border="0" class="tablejava">
            <tr>
                <td>
                    <form action="searchResultsPage.php" method="POST">
                        <input hidden name="location" value='aberdeen'>
                        <button class="btnclear" type="submit" >Aberdeen</button>
                    </form>
                </td>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="location" value='edinburgh'>
                        <button class="btnclear" type="submit" >Edinburgh</button>
                    </form></td>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="location" value='london'>
                        <button class="btnclear" type="submit" >London</button>
                    </form></td>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="location" value='glasgow'>
                        <button class="btnclear" type="submit" >Glasgow</button>
                    </form></td>
            </tr>
            <tr>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="location" value='dundee'>
                        <button class="btnclear" type="submit" >Dundee</button>
                    </form></td>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="location" value='newcastle'>
                        <button class="btnclear" type="submit" >Newcastle</button>
                    </form></td>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="location" value='liverpool'>
                        <button class="btnclear" type="submit" >Liverpool</button>
                    </form></td>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="location" value='leeds'>
                        <button class="btnclear" type="submit" >Leeds</button>
                    </form></td>

            </tr>
            <tr>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="location" value='manchester'>
                        <button class="btnclear" type="submit" >Manchester</button>
                    </form></td>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="location" value='chester'>
                        <button class="btnclear" type="submit" >Chester</button>
                    </form></td>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="location" value='york'>
                        <button class="btnclear" type="submit" >York</button>
                    </form></td>
                <td><form action="searchResultsPage.php" method="POST">
                        <input hidden name="location" value='bristol'>
                        <button class="btnclear" type="submit" >Bristol</button>
                    </form></td>


            </tr>

        </table>


    </div>
</div>

<div class="tabContent" id="areas">

    <div>
        <p>Looking for a B&B in an Area of the UK but not sure where to stay? Find all B&B's by Area...**PLEASE NOTE: THIS FUNCTIONALITY IS NOT COMPLETE AT THIS TIME**</p>
        <p>

        <table border="0" class="tablejava">
            <tr>
                <td>Cornwall</td>
                <td>Dorset</td>
                <td>Devon</td>
                <td>Berkshire</td>
            </tr>
            <tr>
                <td>Cumbria</td>
                <td>Derbyshire</td>
                <td>Somerset</td>
                <td>Loch Lomond</td>

            </tr>
            <tr>
                <td>Loch Ness</td>
                <td>Cairngorms</td>
                <td>Ben Nevis</td>
                <td>Isle of Skye</td>


            </tr>

        </table>


    </div>
</div>


<section class="spacer" id="spacer">


</section>






<section class="container" id="featured">
<div class="centre">

    <p>Featured bed and breakfast destinations</p>
</div>
 </section>



<main>


<section class="container2" id="spotlight">
    <nav role="sub2">
    <img src="assets/london.jpg" id="img2">
    <p>London, England</p>

        <form action="searchResultsPage.php" method="POST">
            <input hidden name="location" value='london'>
            <button class="btn" type="submit" >Click to View</button>
        </form><p>&nbsp;</p>

    <img src="assets/edinburgh.jpg" id="img2">
    <p>Edinburgh, Scotland</p>
        <form action="searchResultsPage.php" method="POST">
            <input hidden name="location" value='edinburgh'>
            <button class="btn" type="submit" >Click to View</button>
        </form>

        </nav>


</section>

    <section class="container2" id="spotlight2">
        <nav role="sub2">
        <img src="assets/glasgow.jpg" id="img2">
        <p>Glasgow, Scotland</p>
            <form action="searchResultsPage.php" method="POST">
                <input hidden name="location" value='glasgow'>
                <button class="btn" type="submit" >Click to View</button>
            </form><p>&nbsp;</p>

        <img src="assets/Aberdeen.jpg" id="img2">
        <p>Aberdeen, Scotland</p>
            <form action="searchResultsPage.php" method="POST">
                <input hidden name="location" value='aberdeen'>
                <button class="btn" type="submit" >Click to View</button>
            </form>

            </nav>
    </section>

    <section class="container2" id="spotlight3">
        <nav role="sub2">
        <img src="assets/dundee.jpeg" id="img2">
        <p>Dundee, Scotland</p>
            <form action="searchResultsPage.php" method="POST">
                <input hidden name="location" value='dundee'>
                <button class="btn" type="submit" >Click to View</button>
            </form><p>&nbsp;</p>
            <img src="assets/manchester.jpg" id="img2">
        <p>Manchester, England</p>
            <form action="searchResultsPage.php" method="POST">
                <input hidden name="location" value='manchester'>
                <button class="btn" type="submit" >Click to View</button>
            </form>

        </nav>
    </section>


</main>

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

</body>
</html>
