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
    <title>Booking: theB&Bhub</title>
</head>
<body>

<section class="container" id="banner">
    <div class="floatleft">
        <img src = "assets/bnblogocroporange.png" id="img">
    </div>
    <div class="floatright">
        <php?
        if ($_SESSION["user"] != null) {
        echo "<p id='loginText'>Currently signed in as: " . $_SESSION["user"];
            echo "    not you?</p><button id='logout()' onclick='logout()'>LOGOUT</button>";
        }else{
        echo "<p id='loginText'>currently not logged in!";
            }


            ?>
            <script>
                function logout() {

                    window.location = "SearchBB.php?value=logout";
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

        <p>That's you all signed up!</p>
    </div>
</section>


<body>




<main>
    <!--onsubmit="return validateOwner(this);"  javascript method-->
    <div class="">

<?php
/**
 * Created by PhpStorm.
 * User: 9540730
 * Date: 25/02/2016
 * Time: 13:45
 */


//$ownerid= $_POST['ownerid'];   [ownerid] '".$ownerid."',
$title =$_POST['title'];
$firstname= $_POST['firstname'];
$surname= $_POST['surname'];
$email= $_POST['email'];
$password= $_POST['password'];
$password2= $_POST['password2'];
$address= $_POST['address'];
$address2= $_POST['address2'];
$telephone= $_POST['telephone'];



$conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

try {
    $st1 = "INSERT INTO Owner ([title], [firstname], [surname], [email], [address], [password], [telephone]) VALUES ('".$title."', '".$firstname."', '".$surname."', '".$email."', '".$address."', '".$password."', '".$telephone."')";
    $conn->exec($st1);

}catch(PDOException $e)
{
    print"$e";
}



?>

<table class="table1">
<?php
$conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
try{
    $st = $conn-> query("SELECT * FROM [Owner]");
    foreach($st->fetchAll() as $row) {
        $newhtml =
            <<<NEWHTML
            <tr>
                   <td>{$row[firstname]}</td>
                    <td>{$row[surname]}</td>
            </tr>
NEWHTML;

        print($newhtml);
    }
    echo "";
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
