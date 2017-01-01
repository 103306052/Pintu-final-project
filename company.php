<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    require "db.php";

    $sql = "SELECT inventory, name, EOQ, EPQ FROM company, products
            WHERE product_id = id";
    $result = mysql_query($sql) ;

    echo "<table>";
    echo "<tr>
            <th>商品名稱</th>
            <th>剩餘存貨</th> 
            <th>訂購參考值</th>
          </tr>";
        
    while ($row = mysql_fetch_array($result)){
      echo "<tr>";
      echo "<td>" . $row['name'] . "</td>";

      if($row['EOQ'] == true){
        if($row['inventory'] < $row['EOQ']*0.2){
            echo "<td style='color:red'>" . $row['inventory'] . "</td>";
        }else{
            echo "<td>" . $row['inventory'] . "</td>";
        }
        echo "<td>" . $row['EOQ'] . "</td>";
      }else{
        if($row['inventory'] < $row['EPQ']*0.2){
            echo "<td style='color:red'>" . $row['inventory'] . "</td>";
        }else{
            echo "<td>" . $row['inventory'] . "</td>";
        }
        echo "<td>" . $row['EPQ'] . "</td>";
      }
      echo "</tr>";
    }

    echo "</table><br>";
    ?>
  </body>
</html>