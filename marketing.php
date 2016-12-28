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
        
        while ($row = mysqli_fetch_assoc($result)){
          echo "<tr>";
          echo "<td>" . $row['customer_name'] . "</td>";
          echo "<td>" . $row['customer_email'] . "</td>";
          echo "<td>" . $row['customer_phone'] . "</td>";
          echo "</tr>";
        }
        echo "</table><br>";   
    }

    echo "Rank1:最有價值<br>";
    $sql1 = "SELECT customer_name,customer_email,customer_phone FROM customers
            WHERE R>(SELECT AVG(R) FROM customers) and
                  F>(SELECT AVG(F) FROM customers) and 
                  M>(SELECT AVG(M) FROM customers)
            ORDER BY R+F*50+M*25 DESC";
    printTable($con, $sql1);        

    echo "Rank2:重要發展<br>";
    $sql2 = "SELECT customer_name,customer_email,customer_phone FROM customers
            WHERE R<(SELECT AVG(R) FROM customers) and
                  F>(SELECT AVG(F) FROM customers) and 
                  M>(SELECT AVG(M) FROM customers)
            ORDER BY R+F*50+M*25 DESC";
    printTable($con, $sql2);
            
    echo "Rank3:重要保持<br>";
    $sql3 = "SELECT customer_name,customer_email,customer_phone FROM customers
            WHERE R>(SELECT AVG(R) FROM customers) and
                  F>(SELECT AVG(F) FROM customers) and 
                  M<(SELECT AVG(M) FROM customers)
            ORDER BY R+F*50+M*25 DESC";
    printTable($con, $sql3);
            
    echo "Rank4:重要挽留<br>";
    $sql4 = "SELECT customer_name,customer_email,customer_phone FROM customers
            WHERE R<(SELECT AVG(R) FROM customers) and
                  F>(SELECT AVG(F) FROM customers) and 
                  M<(SELECT AVG(M) FROM customers)
            ORDER BY R+F*50+M*25 DESC";
    printTable($con, $sql4);
           
    echo "Rank5:一般價值<br>";
    $sql5 = "SELECT customer_name,customer_email,customer_phone FROM customers
            WHERE R>(SELECT AVG(R) FROM customers) and
                  F<(SELECT AVG(F) FROM customers) and 
                  M>(SELECT AVG(M) FROM customers)
            ORDER BY R+F*50+M*25 DESC";
    printTable($con, $sql5);
            
    echo "Rank6:一般發展<br>";
    $sql6 = "SELECT customer_name,customer_email,customer_phone FROM customers
            WHERE R<(SELECT AVG(R) FROM customers) and
                  F<(SELECT AVG(F) FROM customers) and 
                  M>(SELECT AVG(M) FROM customers)
            ORDER BY R+F*50+M*25 DESC";
    printTable($con, $sql6);

    echo "Rank7:一般保持<br>";
    $sql7 = "SELECT customer_name,customer_email,customer_phone FROM customers
            WHERE R>(SELECT AVG(R) FROM customers) and
                  F<(SELECT AVG(F) FROM customers) and 
                  M<(SELECT AVG(M) FROM customers)
            ORDER BY R+F*50+M*25 DESC";
    printTable($con, $sql7);
            
    echo "Rank8:一般挽留<br>";
    $sql8 = "SELECT customer_name,customer_email,customer_phone FROM customers
            WHERE R<(SELECT AVG(R) FROM customers) and
                  F<(SELECT AVG(F) FROM customers) and 
                  M<(SELECT AVG(M) FROM customers)
            ORDER BY R+F*50+M*25 DESC";
    printTable($con, $sql8);

    ?>
  </body>
</html>