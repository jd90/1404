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
            /**
             * Created by PhpStorm.
             * User: 9540730
             * Date: 25/02/2016
             * Time: 13:45
             */



            if($_POST['bbname']!= null) {
                //$ownerid= $_POST['ownerid'];   [ownerid] '".$ownerid."',
                $bbid = $_POST['bbid'];
                $roomname = $_POST['roomname'];
                $roomdescription = $_POST['roomdescription'];
                $price = $_POST['price'];
                $nbrofpeople = $_POST['nbrofpeople'];
                $imageurl = $_POST['imageurl'];


                $conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
                $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                try{
                    $st = $conn-> query("SELECT * FROM [Room] WHERE [roomname] = '$roomname'");
                    foreach($st->fetchAll() as $row) {


                   $roomid = $row[roomname];


                    }
                }
                catch(PDOException $e)
                {print"$e";}



                $conn = new PDO ("sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                try {
                    $st1 = "INSERT INTO [Room] ([bbid], [roomname], [roomdescription],[price], [numberofpeople]) VALUES ('" . $bbid . "','" . $roomname . "','" . $roomdescription . "','" . $price . "','" . $nbrofpeople . "')";
                    $conn->exec($st1);
                } catch (PDOException $e) {
                    print"$e";
                }


                if ($_POST['imageurl'] != null) {
                    $imageurl1 = $_POST['imageurl'];
                    $conn = new PDO ("sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    try {
                        $st1 = "INSERT INTO [Images] ([imageurl], [roomid]) VALUES ('" . $imageurl1 . "','" . $roomid . "')";
                        $conn->exec($st1);
                    } catch (PDOException $e) {
                        print"$e";
                    }
                }

                if ($_POST['imageurl1'] != null) {
                    $imageurl1 = $_POST['imageurl1'];
                    $conn = new PDO ("sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    try {
                        $st1 = "INSERT INTO [Images] ([imageurl], [roomid]) VALUES ('" . $imageurl1 . "','" . $roomid . "')";
                        $conn->exec($st1);
                    } catch (PDOException $e) {
                        print"$e";
                    }
                }
                if ($_POST['imageurl2'] != null) {
                    $imageurl1 = $_POST['imageurl2'];
                    $conn = new PDO ("sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    try {
                        $st1 = "INSERT INTO [Images] ([imageurl], [roomid]) VALUES ('" . $imageurl1 . "','" . $roomid . "')";
                        $conn->exec($st1);
                    } catch (PDOException $e) {
                        print"$e";
                    }
                }
                if ($_POST['imageurl3'] != null) {
                    $imageurl1 = $_POST['imageurl3'];
                    $conn = new PDO ("sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    try {
                        $st1 = "INSERT INTO [Images] ([imageurl], [roomid]) VALUES ('" . $imageurl1 . "','" . $roomid . "')";
                        $conn->exec($st1);
                    } catch (PDOException $e) {
                        print"$e";
                    }
                }
                if ($_POST['imageurl4'] != null) {
                    $imageurl1 = $_POST['imageurl4'];
                    $conn = new PDO ("sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    try {
                        $st1 = "INSERT INTO [Images] ([imageurl], [roomid]) VALUES ('" . $imageurl1 . "','" . $roomid . "')";
                        $conn->exec($st1);
                    } catch (PDOException $e) {
                        print"$e";
                    }
                }
                if ($_POST['imageurl5'] != null) {
                    $imageurl1 = $_POST['imageurl5'];
                    $conn = new PDO ("sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    try {
                        $st1 = "INSERT INTO [Images] ([imageurl], [roomid]) VALUES ('" . $imageurl1 . "','" . $roomid . "')";
                        $conn->exec($st1);
                    } catch (PDOException $e) {
                        print"$e";
                    }
                }
                if ($_POST['imageurl6'] != null) {
                    $imageurl1 = $_POST['imageurl6'];
                    $conn = new PDO ("sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    try {
                        $st1 = "INSERT INTO [Images] ([imageurl], [roomid]) VALUES ('" . $imageurl1 . "','" . $roomid . "')";
                        $conn->exec($st1);
                    } catch (PDOException $e) {
                        print"$e";
                    }
                }
            }
            ?>


            <?php
            $email = $_SESSION['user'];
            if($_GET['bbid2'] != null ){
            $bbid = $_GET['bbid2'];}
            $conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            try{
                $st = $conn-> query("SELECT * FROM [Room] WHERE [bbid] = '$bbid'");
                foreach($st->fetchAll() as $row) {
                    $newhtml =
                        <<<NEWHTML

                       <table class="table1">

                   <tr><td>{$row[roomname]}</td></tr>

                    <tr><td id="bbname">{$row[roomdescription]}</td></tr>
                    <tr><td>{$row[price]}</td>

            </tr>
            <td><a href="availability.php?roomid={$row[roomid]}&roomname={$row[roomname]}"><input type="submit" value="View/Change Availability"></a></input></td></tr>
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