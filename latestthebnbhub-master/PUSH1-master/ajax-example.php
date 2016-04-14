<?php

/**
 * Created by PhpStorm.
 * User: Borris
 * Date: 28/02/2016
 * Time: 15:14
 */

$email = $_POST['email'];
$password = $_POST['password'];

//echo "Query: ".$email." ".$password;


$conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
try{
  $st = $conn-> query("SELECT * FROM [Owner] WHERE [email] = '".$email."' AND [password] = '".$password."'");

    $name = "";

    $count;

    $ownerid;

foreach($st->fetchAll() as $row) {

    $count++;

    $ownerid = $row[ownerid];

}
    if($count>0){
        echo "".$ownerid;
//<a href='Home.php'>Continue</a>
    }
    else{echo "username or password is wrong";}

}
catch(PDOException $e)
{echo "$e";}


?>