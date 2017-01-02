<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/branchstorage1Css.css">
		<title>Branchstorage</title>
		<style>
			body{
				margin:0;
				padding:0;
				background: #000 url(img/background.jpg) center center fixed no-repeat;
				-moz-background-size: cover;
				background-size: cover;
			}
		</style>
  </head>
  <body>
    <div class="banner">
			<img src="img/branchstorage/banner.jpg" alt="">
		</div>
		<br>
		<div class="container">
			<div class="row">
				<div class="signin">
					<form class="form-inline" action="branchstorage.php" method="post" id="shop" role="form">
						<input type="int" name="shop_id" value="" class="form-control" placeholder="請輸入分店ID">
						<input type="submit" class="btn btn-default" value="登入">
					</form>
				</div>
			</div>
		</div>

    <?php
      error_reporting(~E_DEPRECATED & ~E_NOTICE);

      define('DBHOST', 'localhost');
      define('DBUSER', 'root');
      define('DBPASS', '5453489j');
      define('DBNAME', 'pintu');

      $conn = mysql_connect(DBHOST, DBUSER, DBPASS);
      $dbcon = mysql_select_db(DBNAME);
      mysql_set_charset('utf8', $conn);
      if (!$conn) {
          die("Connection failed : " . mysql_error());
      }

      if (!$dbcon) {
          die("Database Connection failed : " . mysql_error());
      }
      //以上為資料庫連結部分
     $id = $_POST["shop_id"];
     $sql = "select * from shop where id =".$id;
     //查詢整個表單
     $result = mysql_query($sql);
     while ($row = @mysql_fetch_array($result)) {
         ?>
          <div class="storage">
            <div class="col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <h4>商品名稱:</h4>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <h4><?php echo $row['products_name'] ?></h4>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <h4>剩餘數量:</h4>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
              <h4><?php echo  $row['products_Q'] ?></h4>
            </div>
            <div class="container">
              <div class="row">
                <form action='update_branchstorage.php?id="<?php echo $id; ?>"' method="post">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <input type="submit" name="submit" value="進貨" class="btn btn-default">
                  <input type="button" value="重新整理" onClick="window.location.reload();" class="btn btn-default">
                </form>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <h1 align="center" ><?php echo $row['name'] ?></h1>
            </div>
          </div>
          <?php

     } ?>




  </body>
</html>
