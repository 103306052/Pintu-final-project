<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/districtCss.css">
    <title>District</title>
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
			<img src="img/district/banner.jpg" alt="">
		</div>
		<div class="container">
			<div class="row">
				<div class="weight col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<h4>北部（建議值0.4）：</h4>
					</div>
					<div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<h4>中部（建議值0.3）：</h4>
					</div>
					<div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<h4>南部（建議值0.3）：</h4>
					</div>
				</div>
      <form action="district.php" method="post" id="distribute">
				<div class="weight col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<input type="float" name="north" value="" class="form-control" placeholder="請輸入配貨權重">
					</div>
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<input type="float" name="mid" value="" class="form-control" placeholder="請輸入配貨權重">
					</div>
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<input type="float" name="south" value="" class="form-control" placeholder="請輸入配貨權重">
					</div>
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
						<button type="submit" class="btn btn-default">提交</button>
					</div>
				</div>
			</div>
    </form>

    <br/><br/>
    <?php
    require "db.php";
     //以上為資料庫連結部分
    $sql = "select * from products";//查詢整個表單
    $result = mysql_query($sql) ;

    while ($row = mysql_fetch_array($result)) {
        ?>
      <div class="row">
        <div class="storage">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <h4>商品編號:</h4>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <h4><?php echo $row['id']; ?></h4>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <h4>商品名稱:</h4>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-">
              <h4><?php echo $row['name']; ?></h4>
            </div>
          </div>
      <?php
        if ($row['EOQ'] == true) {
            ?>
          <div class="number  col-xs-7 col-sm-7 col-md-7 col-lg-7">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <h4>EOQ : </h4>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
              <h4><?php echo $row['EOQ']; ?></h4>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <h4>| 北部 : </h4>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
              <h4><?php echo round($row['EOQ']*$_POST["north"]) ?></h4>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <h4>| 中部 : </h4>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
              <h4><?php echo round($row['EOQ']*$_POST["mid"]) ?></h4>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <h4>| 南部 : </h4>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
              <h4><?php echo round($row['EOQ']*$_POST["south"]) ?></h4>
            </div>
          </div>
        </div>
        <?php

        } else {
            ?>
          <div class="number  col-xs-7 col-sm-7 col-md-7 col-lg-7">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <h4>EPQ : </h4>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
              <h4><?php echo $row['EPQ']; ?></h4>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <h4>| 北部 : </h4>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
              <h4><?php echo round($row['EPQ']*$_POST["north"]) ?></h4>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <h4>| 中部 : </h4>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
              <h4><?php echo round($row['EPQ']*$_POST["mid"]) ?></h4>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <h4>| 南部 : </h4>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
              <h4><?php echo round($row['EPQ']*$_POST["south"]) ?></h4>
            </div>
          </div>
        </div>
        <?php

        }
        echo "<br>";
    }
    ?>
    <div class="row click">
      <div class="button">
        <div class="home">
          <a href="index.html"><h2 align="center" >回首頁</h2></a>
        </div>
      </div>
    </div>
  </body>
</html>
