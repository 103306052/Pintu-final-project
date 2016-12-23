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
     define('DBPASS', '5453489j');
     define('DBNAME', 'pintu');

     $conn = mysql_connect(DBHOST, DBUSER, DBPASS);
     $dbcon = mysql_select_db(DBNAME);

     if (!$conn) {
         die("Connection failed : " . mysql_error());
     }

     if (!$dbcon) {
         die("Database Connection failed : " . mysql_error());
     }
     //以上為資料庫連結部分

    $sql = "select * from products";//查詢整個表單
    $result = mysql_query($sql) ;
    while ($row = mysql_fetch_array($result)) {
        echo "商品編號 : ".$row['id']."<br>";
        echo "商品名稱 : ".$row['name']."<br>";
        if ($row['EOQ'] == true) {
            echo "EOQ : ".$row['EOQ']."<br>";
        } else {
            echo "EPQ : ".$row['EPQ']."<br>";
        }
        echo "<br>";
    }//顯示資料
    ?>
  </body>
</html>
