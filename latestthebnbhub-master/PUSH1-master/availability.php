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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Register: theB&Bhub</title>
</head>

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
            window.location = "SearchBB.php?value=logout";
        }
    </script>
</section>

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
        <p>Here are the B&Bs listed under your ownership:</p>
    </div>
</section>


<body>




<main>
    <!--onsubmit="return validateOwner(this);"  javascript method-->
    <div class="">
        <table class="table1">
            <?php

            $roomname = $_GET['roomname'];

            echo "<h1 style='color:black;'>Bookings for: {$roomname}</h1>";

            ?>

            <?php

                $roomname = $_GET['roomname'];
            $roomid = $_GET['roomid'];


            $email = $_SESSION['user'];
            if($_GET['bbid2'] != null ){
                $bbid = $_GET['bbid2'];}
            $conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            try{
                $st = $conn-> query("SELECT * FROM [Bookings] WHERE [roomid] = '$roomid'");
                foreach($st->fetchAll() as $row) {
                    $newhtml =
                        <<<NEWHTML
                        <form method="post" action="availability.php">
                       <table class="table1">

                    <tr>
                   <td><label for="roomname">Customer Name: </label></td>
                   <td><input type="text" id="roomname" name="roomname" value="{$row[cust_firstname]}{$row[cust_surname]}}" readonly></td></tr>
                    <tr>
                      <tr>
                   <td><label for="bookingstart">Booking From: </label></td>
                   <td><input type="text" id="bookingstart" name="bookingstart" value="{$row[bookingstartdate]}" readonly></td></tr>
                    <tr>
                    <tr>
                   <td><label for="bookingend">Booking To: </label></td>
                   <td><input type="text" id="bookingend" name="bookingend" value="{$row[bookingenddate]}" readonly></td></tr>
                    <tr>
                   <td>{$row[roomname]}</td></tr>


            <td><input type="submit" value="Cancel."></input></td></tr>
            </table>
NEWHTML;
                    print($newhtml);
                }
            }
            catch(PDOException $e)
            {print"$e";}
            ?>




        </table>
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