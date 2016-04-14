<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>

    <?php


    if($_GET['location'] != null) {

        $searchLo = $_GET['location'];


        function parseToXML($htmlStr)
        {
            $xmlStr = str_replace('<', '&lt;', $htmlStr);
            $xmlStr = str_replace('>', '&gt;', $xmlStr);
            $xmlStr = str_replace('"', '&quot;', $xmlStr);
            $xmlStr = str_replace("'", '&#39;', $xmlStr);
            $xmlStr = str_replace("&", '&amp;', $xmlStr);
            return $xmlStr;
        }


        //sql code
        $conn = new PDO ("sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            //ORDER BY [price]
            $st = $conn->query("SELECT [bbname],[address],[latitude],[longitude] FROM [B&B] WHERE [city] = '$searchLo'");
            header("Content-type: text/xml");
            echo '<markers>';
            foreach ($st->fetchAll() as $row) {
                echo '<marker ';
                echo 'name="' . parseToXML($row['bbname']) . '" ';
                echo 'address="' . parseToXML($row['address']) . '" ';
                echo 'lat="' . $row['latitude'] . '" ';
                echo 'lng="' . $row['longitude'] . '" ';
                echo 'type="' . $row['type'] . '" ';
                echo '/>';
            }
// End XML file
            echo '</markers>';
        } catch (PDOException $e) {
            print"$e";
        }

    }


    else{




        $searchLo = $_GET['bbname'];


        function parseToXML($htmlStr)
        {
            $xmlStr = str_replace('<', '&lt;', $htmlStr);
            $xmlStr = str_replace('>', '&gt;', $xmlStr);
            $xmlStr = str_replace('"', '&quot;', $xmlStr);
            $xmlStr = str_replace("'", '&#39;', $xmlStr);
            $xmlStr = str_replace("&", '&amp;', $xmlStr);
            return $xmlStr;
        }


        //sql code
        $conn = new PDO ("sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $st = $conn->query("SELECT [bbname],[address],[latitude],[longitude] FROM [B&B] WHERE [bbname] = '$searchLo'");
            header("Content-type: text/xml");
            echo '<markers>';
            foreach ($st->fetchAll() as $row) {
                echo '<marker ';
                echo 'name="' . parseToXML($row['bbname']) . '" ';
                echo 'address="' . parseToXML($row['address']) . '" ';
                echo 'lat="' . $row['latitude'] . '" ';
                echo 'lng="' . $row['longitude'] . '" ';
                echo 'type="' . $row['type'] . '" ';
                echo '/>';
            }
// End XML file
            echo '</markers>';
        } catch (PDOException $e) {
            print"$e";
        }





    }



    ?>




</p>
</body>
</html>
