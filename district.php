<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="district.php" method="post" id="distribute">
      <h>輸入權重：</h>
      <br>
      北部 (建議值0.4)：<input type="float" name="north" value="" />
      中部 (建議值0.3)：<input type="float" name="mid" value="" />
      南部 (建議值0.3)：<input type="float" name="south" value="" />
      <input type="submit">
    </form>
    <br/><br/>
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
        echo "商品編號 : ".$row['id']."&nbsp"."&nbsp"."&nbsp"."&nbsp";
        echo "商品名稱 : ".$row['name']."&nbsp"."&nbsp"."&nbsp"."&nbsp";
        if ($row['EOQ'] == true) {
            echo "EOQ : ".$row['EOQ']."&nbsp"."&nbsp"."&nbsp"."&nbsp";
            echo "北部 : ".round($row['EOQ']*$_POST["north"])."&nbsp"."&nbsp"."&nbsp"."&nbsp";
            echo "中部 : ".round($row['EOQ']*$_POST["mid"])."&nbsp"."&nbsp"."&nbsp"."&nbsp";
            echo "南部 : ".round($row['EOQ']*$_POST["south"])."<br>";
        } else {
            echo "EPQ : ".$row['EPQ']."&nbsp"."&nbsp"."&nbsp"."&nbsp";
            echo "北部 : ".round($row['EPQ']*$_POST["north"])."&nbsp"."&nbsp"."&nbsp"."&nbsp";
            echo "中部 : ".round($row['EPQ']*$_POST["mid"])."&nbsp"."&nbsp"."&nbsp"."&nbsp";
            echo "南部 : ".round($row['EPQ']*$_POST["south"])."<br>";
        }
        echo "<br>";
    }//顯示資料
    ?>

  </body>
</html>
