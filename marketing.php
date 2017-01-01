<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <?php
  error_reporting(~E_DEPRECATED & ~E_NOTICE);
  define('DBHOST', 'localhost');
  define('DBUSER', 'root');
  define('DBPASS', '103306018');
  define('DBNAME', 'pintu');
  $conn = mysql_connect(DBHOST, DBUSER, DBPASS);
  $dbcon = mysql_select_db(DBNAME);
  if (!$conn) {
    die("Connection failed : " . mysql_error());
  }
  if (!$dbcon) {
    die("Database Connection failed : " . mysql_error());
  }

  mysql_set_charset('utf8', $conn);

  function printTable($sql){
    $result = mysql_query($sql);
    echo "<table>";       
    while ($row = mysql_fetch_array($result)){
      echo "<tr>";
      echo "<td>" . $row['customer_name'] . "</td>";
      echo "<td>" . $row['customer_email'] . "</td>";
      echo "<td>" . $row['customer_phone'] . "</td>";
      echo "</tr>";
    }
    echo "</table><br>";   
  }

  echo "最有價值<br>";
  $sql1 = "SELECT customer_name,customer_email,customer_phone FROM customers
  WHERE R>(SELECT AVG(R) FROM customers) and
  F>(SELECT AVG(F) FROM customers) and 
  M>(SELECT AVG(M) FROM customers)
  ORDER BY R+F*50+M*25 DESC";
  printTable($sql1);        

  echo "重要發展<br>";
  $sql2 = "SELECT customer_name,customer_email,customer_phone FROM customers
  WHERE R<(SELECT AVG(R) FROM customers) and
  F>(SELECT AVG(F) FROM customers) and 
  M>(SELECT AVG(M) FROM customers)
  ORDER BY R+F*50+M*25 DESC";
  printTable($sql2);

  echo "重要保持<br>";
  $sql3 = "SELECT customer_name,customer_email,customer_phone FROM customers
  WHERE R>(SELECT AVG(R) FROM customers) and
  F>(SELECT AVG(F) FROM customers) and 
  M<(SELECT AVG(M) FROM customers)
  ORDER BY R+F*50+M*25 DESC";
  printTable($sql3);

  echo "重要挽留<br>";
  $sql4 = "SELECT customer_name,customer_email,customer_phone FROM customers
  WHERE R<(SELECT AVG(R) FROM customers) and
  F>(SELECT AVG(F) FROM customers) and 
  M<(SELECT AVG(M) FROM customers)
  ORDER BY R+F*50+M*25 DESC";
  printTable($sql4);

  echo "一般價值<br>";
  $sql5 = "SELECT customer_name,customer_email,customer_phone FROM customers
  WHERE R>(SELECT AVG(R) FROM customers) and
  F<(SELECT AVG(F) FROM customers) and 
  M>(SELECT AVG(M) FROM customers)
  ORDER BY R+F*50+M*25 DESC";
  printTable($sql5);

  echo "一般發展<br>";
  $sql6 = "SELECT customer_name,customer_email,customer_phone FROM customers
  WHERE R<(SELECT AVG(R) FROM customers) and
  F<(SELECT AVG(F) FROM customers) and 
  M>(SELECT AVG(M) FROM customers)
  ORDER BY R+F*50+M*25 DESC";
  printTable($sql6);

  echo "一般保持<br>";
  $sql7 = "SELECT customer_name,customer_email,customer_phone FROM customers
  WHERE R>(SELECT AVG(R) FROM customers) and
  F<(SELECT AVG(F) FROM customers) and 
  M<(SELECT AVG(M) FROM customers)
  ORDER BY R+F*50+M*25 DESC";
  printTable($sql7);

  echo "一般挽留<br>";
  $sql8 = "SELECT customer_name,customer_email,customer_phone FROM customers
  WHERE R<(SELECT AVG(R) FROM customers) and
  F<(SELECT AVG(F) FROM customers) and 
  M<(SELECT AVG(M) FROM customers)
  ORDER BY R+F*50+M*25 DESC";
  printTable($sql8);
  ?>
</body>
</html>