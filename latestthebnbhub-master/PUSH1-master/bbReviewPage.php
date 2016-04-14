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
                    window.location = "SearchBB.php";
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
        /**
         * Created by PhpStorm.
         * User: 9540730
         * Date: 25/02/2016
         * Time: 13:45
         */



        if($_POST['bbname']!= null) {
            $email = $_SESSION['user'];
            //$ownerid= $_POST['ownerid'];   [ownerid] '".$ownerid."',
            $bbname = $_POST['bbname'];
            $address = $_POST['address'];
            $addressline2 =$_POST['address2'];
            $city = $_POST['city'];
            $telephone = $_POST['telephone'];
            $mobile = $_POST['mobile'];

            $bbdescription = $_POST['bbdescription'];
            $checkin = $_POST['checkin'];
            $checkout = $_POST['checkout'];
            $imageurl =$_POST['picture'];
            $pets = $_POST['pets'];
            $ownerid = $_POST['ownerid'];
            $region = $_POST['region'];
            $postcode = $_POST['postcode'];
            $longitude = $_POST['longitude'];
            $latitude =$_POST['latitude'];



            $conn = new PDO ("sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try {
                $st1 = "INSERT INTO [B&B] ([ownerid], [bbname], [address],[addressline2], [city], [telephone], [email], [longitude], [latitude], [bbdescription], [region], [mobile], [checkin], [checkout], [pets], [postcode], [imageurl]) VALUES ('" . $ownerid . "','" . $bbname . "','" . $address . "','" . $addressline2 . "','" . $city . "','" . $telephone . "','" . $email . "','" . $longitude . "', '" . $latitude . "','" . $bbdescription . "','" . $region . "','" . $mobile . "', '" . $checkin . "', '" . $checkout . "', '" . $pets . "', '" . $postcode . "', '" . $imageurl . "')";
                $conn->exec($st1);
            } catch (PDOException $e) {
                print"$e";
            }
        }
        ?>


        <?php
        $email = $_SESSION['user'];
        $conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        try{
            $st = $conn-> query("SELECT * FROM [B&B] WHERE [bb_email] = '$email'");
            foreach($st->fetchAll() as $row) {
                $newhtml =
                    <<<NEWHTML

                       <table class="table1"> <tr>
                   <td>{$row[city]}</td>
                    <td id="bbname">{$row[bbname]}</td>
                    <td>{$row[address]}</td>
                    <td>{$row[bb_email]}</td>

            </tr>
            <tr><td><a href="RoomRegistration.php?bbname={$row[bbname]}&bbid={$row[bbid]}"><input class="btn2" type="submit" value="Add Room to this BB"></input></a></td></tr>
             <tr><td><a href="bbRoomReviewPage.php?bbid2={$row[bbid]}"><input class="btn2" type="submit" value="View Rooms"></input></a></td></tr>
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