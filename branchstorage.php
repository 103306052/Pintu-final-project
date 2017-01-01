<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="branchstorage.php" method="post" id="shop">
      輸入分店id：<input type="int" name="shop_id" value="0" />
      <input type="submit">
    </form>
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
     $sql = "select * from shop where id =".$_POST["shop_id"];
     //查詢整個表單
     $result = mysql_query($sql);
     while ($row = @mysql_fetch_array($result)) {
         echo "<br>";
         echo "店名：".$row['name']."&nbsp"."&nbsp"."&nbsp"."&nbsp"."<br>";
         echo "產品名稱：".$row['products_name']."&nbsp"."&nbsp"."&nbsp"."&nbsp";
         echo "剩餘存貨：".$row['products_Q']."&nbsp"."&nbsp"."&nbsp"."&nbsp";
         //顯示商店存貨資料
          ?>
         <form action='branchstorage.php' method = 'post'>
           <input type="submit" name="inventory_update" value="進貨">
         </form>
         <?php
            if (isset($_POST['inventory_update'])) {
                $increase = "update shop set products_Q  = products_Q + products_distributed_Q where id =".$_POST["shop_id"];
                mysql_query($increase);
            }
     }
     //進貨功能（目前無效）
    ?>
  </body>
</html>
