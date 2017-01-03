<?php

require "db.php";
//以上為資料庫連結部分
$query = "update shop set products_Q  = products_Q + ROUND(products_distributed_Q*0.1) where id ={$_POST['id']}";
mysql_query($query);
?>
<script>
alert("進貨成功！")
history.go(-1);
location.reload();
</script>
