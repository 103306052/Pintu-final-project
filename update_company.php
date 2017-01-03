<?php

require "db.php";
//以上為資料庫連結部分
$query = "update company set inventory  = inventory + ROUND(products.EOQ*0.1) from products where id ={$_POST['id']}";
mysql_query($query);
?>
<script>
alert("進貨成功！")
history.go(-1);
location.reload();
</script>
