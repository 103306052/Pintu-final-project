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
$query = "update company set inventory  = inventory + ROUND(products.EOQ*0.1) from products where id ={$_POST['id']}";
mysql_query($query);
?>
<script>
alert("進貨成功！")
history.go(-1);
location.reload();
</script>
