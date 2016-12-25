<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
$servername = "localhost";
$username = "root";
$password = "103306018";
$dbname = "pintu";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($con, 'utf8');

function printTable($con, $sql){
    $result = mysqli_query($con, $sql);
    echo "<table>
    <tr>
    <th>姓名</th>
    <th>信箱</th>
    <th>電話</th>
    </tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['customer_name'] . "</td>";
        echo "<td>" . $row['customer_email'] . "</td>";
        echo "<td>" . $row['customer_phone'] . "</td>";
        echo "</tr>"; 
    }
    echo "</table><br>";   
}

$rank=1;

switch ($rank) {
        case 1:
            echo "Rank1:最有價值<br>";
            $sql = "SELECT customer_name,customer_email,customer_phone FROM customers
            WHERE R>(SELECT AVG(R) FROM customers) and
                  F>(SELECT AVG(F) FROM customers) and 
                  M>(SELECT AVG(M) FROM customers)";
            printTable($con, $sql);
        
        case 2:
            echo "Rank2:重要發展<br>";
            $sql = "SELECT customer_name,customer_email,customer_phone FROM customers
            WHERE R<(SELECT AVG(R) FROM customers) and
                  F>(SELECT AVG(F) FROM customers) and 
                  M>(SELECT AVG(M) FROM customers)";
            printTable($con, $sql);
        
        case 3:
            echo "Rank3:重要保持<br>";
            $sql = "SELECT customer_name,customer_email,customer_phone FROM customers
            WHERE R>(SELECT AVG(R) FROM customers) and
                  F>(SELECT AVG(F) FROM customers) and 
                  M<(SELECT AVG(M) FROM customers)";
            printTable($con, $sql);
        
        case 4:
            echo "Rank4:重要挽留<br>";
            $sql = "SELECT customer_name,customer_email,customer_phone FROM customers
            WHERE R<(SELECT AVG(R) FROM customers) and
                  F>(SELECT AVG(F) FROM customers) and 
                  M<(SELECT AVG(M) FROM customers)";
            printTable($con, $sql);
       
        case 5:
            echo "Rank5:一般價值<br>";
            $sql = "SELECT customer_name,customer_email,customer_phone FROM customers
            WHERE R>(SELECT AVG(R) FROM customers) and
                  F<(SELECT AVG(F) FROM customers) and 
                  M>(SELECT AVG(M) FROM customers)";
            printTable($con, $sql);
        
        case 6:
            echo "Rank6:一般發展<br>";
            $sql = "SELECT customer_name,customer_email,customer_phone FROM customers
            WHERE R<(SELECT AVG(R) FROM customers) and
                  F<(SELECT AVG(F) FROM customers) and 
                  M>(SELECT AVG(M) FROM customers)";
            printTable($con, $sql);
        
        case 7:
            echo "Rank7:一般保持<br>";
            $sql = "SELECT customer_name,customer_email,customer_phone FROM customers
            WHERE R>(SELECT AVG(R) FROM customers) and
                  F<(SELECT AVG(F) FROM customers) and 
                  M<(SELECT AVG(M) FROM customers)";
            printTable($con, $sql);
        
        case 8:
            echo "Rank8:一般挽留<br>";
            $sql = "SELECT customer_name,customer_email,customer_phone FROM customers
            WHERE R<(SELECT AVG(R) FROM customers) and
                  F<(SELECT AVG(F) FROM customers) and 
                  M<(SELECT AVG(M) FROM customers)";
            printTable($con, $sql);
            break;
    }
?>
    </body>
</html>