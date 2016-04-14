<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon"
          type="image/png"
          href="assets/b&bicon.png">
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>


    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <style>
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 100%;
            margin: auto;
        }
    </style>



    <title>Booking: theB&Bhub</title>
</head>
<body>

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

<section class="spacer" id="spacer">


</section>



<section class="container" id="featured">
    <div class="centre">

        <p>Here are the details of your selected B&B...</p>
    </div>
</section>








<?php
$bbname = $_POST['bbname'];
$conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
try{
    $st = $conn-> query("SELECT * FROM [B&B] WHERE [bbname] = '$bbname'");
    foreach($st->fetchAll() as $row) {
        $newhtml =
            <<<NEWHTML

                        <div class="table6">
<table border="0" cellpadding="5">
<tr>
<td><img src="{$row[imageurl]}" id="img4"></td>
<td>
<table border="0" cellpadding="5">
<tr>
<td width="25%"><strong>B&B Name: </strong></td><td colspan="3">{$row[bbname]}</td>
</tr>
<tr>
<td width="25%" valign="top"><strong>B&B Description: </strong></td><td colspan="3">{$row[bbdescription]}</td>
</tr>
<tr>
<td width="25%"><strong>Address: </strong></td><td colspan="3">{$row[address]}, {$row[addressline2]}</td>
</tr>
<tr>
<td width="25%"><strong>Location: </strong></td><td>{$row[city]}</td>
<td width="20%"><strong>Postcode: </strong></td><td>{$row[postcode]}</td>
</tr>
<tr>
<td width="25%"><strong>Check-in: </strong></td><td>{$row[checkin]}</td>
<td width="20%"><strong>Check-out: </strong></td><td>{$row[checkout]}</td>
</tr>
<tr>
<td width="25%"><strong>Pets allowed: </strong></td><td colspan="3">{$row[pets]}</td>
</tr>
<tr>
<td width="25%"><strong>Telephone: </strong></td><td>{$row[telephone]}</td>
<td width="20%"><strong>Email Address: </strong></td><td>{$row[bb_email]}</td>

</tr>

</table>
</td>
</tr>
</table>

</div>
NEWHTML;
        print($newhtml);
    }
}
catch(PDOException $e)
{print"$e";}
?>



<section class="spacer" id="spacer">


</section>

<section class="container" id="featured">
    <div class="centre">

        <p>These are the available rooms for the dates you have chosen...</p>
    </div>
</section>





<?php
$bbid = $_POST['bbid'];
$conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
try{
    $st = $conn-> query("SELECT * FROM [room] WHERE [bbid] = '$bbid'");
    foreach($st->fetchAll() as $row) {
        $newhtml =
            <<<NEWHTML

                        <div class="table6">
<table border="0" cellpadding="5">
<tr>
<td width="500">




    <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

            <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="assets/glasgow.jpg" width="460" height="345">
            </div>

            <div class="item">
                <img src="assets/london.jpg" width="460" height="345">
            </div>

            <div class="item">
                <img src="assets/manchester.jpg" width="460" height="345">
            </div>

            <div class="item">
                <img src="assets/aberdeen.jpg" width="460" height="345">
            </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="sr-only"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="sr-only"></span>
        </a>
    </div>


</td>
<td>
<table border="0" cellpadding="5">
<tr>
<td width="25%"><strong>Room Name: </strong></td><td>{$row[roomname]}</td>
</tr>
<tr>
<td width="25%" valign="top"><strong>Room Description: </strong></td><td>{$row[roomdescription]}</td>
</tr>
<tr>
<td width="25%"><strong>People room sleeps: </strong></td><td>{$row[numberofpeople]}</td>
</tr>
<tr>
<td width="25%"><strong>Price per Night: </strong></td><td>£{$row[price]}</td>
</tr>
<tr>
<td width="25%"><strong>Room Type: </strong></td><td>{$row[roomtype]}</td>
</tr>
<tr>
<td width="25%"><strong>En-Suite: </strong></td><td>{$row[ensuite]}</td>
</tr>
<tr>



</tr>

</table>
</td>
</tr>
</table>

</div>
NEWHTML;
        print($newhtml);
    }
}
catch(PDOException $e)
{print"$e";}
?>



<section class="spacer" id="spacer">


</section>

<!--
<section class="container" id="featured">
    <div class="centre">

        <p>Please select a Room...</p>
    </div>
</section>





<section class="container" id="">

<form action="send.php" method="post">

    <table class="table6">

        <tr><td class="small"><p>* Required Fields</p></td></tr>


        <tr><td><label for ="room">Select a Room *</label></td>
            <td><select class="inputform" name="roomname" id="roomname">
                    <option value ="">Select Room</option>
                    -->
                    <?php /*
                    $conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
                    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                    try{
                        $st = $conn-> query("SELECT * FROM [room] WHERE [bbid] = '100000'");
                        foreach($st->fetchAll() as $row) {
                            $newhtml =
                                <<<NEWHTML

            <option value="{$row[roomname]}">{$row[roomname]}</option>

NEWHTML;
                            print($newhtml);
                        }
                    }
                    catch(PDOException $e)
                    {print"$e";}
                   */ ?>
<!--

</select>
            </td></tr>

</table>

</form>
</section>


<section class="spacer" id="spacer">


</section>


-->



<section class="container" id="featured">
    <div class="centre">

        <p>Please select a room and enter your details to complete your booking</p>
    </div>
</section>


<section class="container" id="content2">

    <form action="send.php" method="post">

        <table class="table6">

            <tr><td class="small"><p>* Required Fields</p></td></tr>


            <tr><td><label for ="room">Please Select a Room *</label></td>
                <td><select class="inputform" name="roomname" id="roomname">
                        <option value ="">Select Room</option>



<?php


$conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
try{
    $st = $conn-> query("SELECT * FROM [room] WHERE [bbid] = '$bbid'");
    foreach($st->fetchAll() as $row) {
        $newhtml =
<<<NEWHTML

            <option value="{$row[roomname]}">{$row[roomname]}</option>

NEWHTML;
        print($newhtml);
    }
}
catch(PDOException $e)
{print"$e";}



?>


        </select>
            </td></tr>


            <tr><td>
                    <label for="title">Title: *</label></td>
                <td><select class="inputform" name="title" id="title">
                        <option value="">Select Title</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        <option value="Ms">Ms</option>
                    </select>
                </td>
            <td>
                    <label for="address">Address: *</label></td>
                <td><input type="text" class="inputform" id="address" name="address" placeholder="Enter the first line of your Address" size="30" maxlength="50" required /></td>
            </tr>
            <tr>
                <td><label for="firstname">First Name: *</label></td>
                <td><input type="text" id="firstname" class="inputform" name="firstname" placeholder="Enter your First Name" size="20" maxlength="25" required /></td>
                <td>
                    <label for="address2">Address Line 2: *</label></td>
                <td><input type="text" class="inputform" id="address2" name="address2" placeholder="Enter the second line of your Address" size="30" maxlength="50" required /></td>
            </tr>

            <tr>
                <td><label for="surname">Surname: *</label></td>
                <td><input type="text" id="surname" class="inputform" name="surname" placeholder="Enter your Surname" size="20" maxlength="25" required /></td>
                <td>
                    <label for="postcode">Postcode: *</label></td>
                <td><input type="text" class="inputform" id="postcode" name="postcode" placeholder="Enter your Postcode" size="20" maxlength="8" required /></td>

            </tr>

            <tr>
                <td>
                    <label for="email">Email: *</label></td>
                <td><input type="text" id="email" class="inputform" name="email" placeholder="Enter your Email Address" size="20" maxlength="50" required /></td>

            <td>
                    <label for="city">City: *</label></td>
                <td><input type="text" class="inputform" id="city" name="city" placeholder="Enter your City" size="20" maxlength="20" required /></td>


            </tr><tr>
            <td>
                <label for="telephone">Telephone: *</label></td>
            <td><input type="text" id="telephone" class="inputform" name="telephone" placeholder="Enter your telephone number" size="20" maxlength="20" required /></td>
            </tr>







            <tr hidden><td>
                    <label for="bbemail">B&B Email:</label></td>
                <td>
                        <?php
                        $conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
                        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                        try{
                            $st = $conn-> query("SELECT * FROM [B&B] WHERE [bbid] = '$bbid'");
                            foreach($st->fetchAll() as $row) {
                                $newhtml =
                                    <<<NEWHTML

                             <input type="text" name="bb_email" value="{$row[bb_email]}" readonly>{$row[bb_email]}</option>

                               </td></tr><tr hidden>
                <td>
                    <label for="checkin">Check-in Time:</label></td>
                <td><input type="text" id="checkin" class="inputform" name="checkin" value="{$row['checkin']}"</td>
            </tr>
            <tr hidden>
            <td>
                    <label for="checkout">Check-out Time:</label></td>
                <td><input type="text" id="checkout" class="inputform" name="checkout" value="{$row['checkout']}"</td>
            </tr>
            <tr hidden>
            <td>
                    <label for="bbname">B&B Name:</label></td>
                <td><input type="text" id="bbname" class="inputform" name="bbname" value="{$row['bbname']}"></td>
            </tr>


NEWHTML;
                                print($newhtml);
                            }
                        }
                        catch(PDOException $e)
                        {print"$e";}
                        ?>

                </td></tr>
            <tr>




                <td colspan="4"><p align="right" ><input class="btn2" type="submit" value="Submit" class="submit" /></p></td>
            </tr>
        </table></form>
</section>

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
