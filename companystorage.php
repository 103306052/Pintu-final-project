<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/companystorageCss.css">
  <title>Companystorage</title>
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
    <img src="img/companystorage/banner.jpg" alt="">
  </div>
  <br>
  <div class="container">
    <div class="row">
      <table class="table table-bordered storage">
        <tr>
          <th>商品編號</th>
          <th>商品名稱</th>
          <th>剩餘存貨</th>
          <th>訂購參考值</th>
        </tr>
        <?php
        require "db.php";
        $sql = "SELECT product_id, inventory, name, EOQ, EPQ FROM company, products
        WHERE product_id = id";
        $result = mysql_query($sql) ;

        while ($row = mysql_fetch_array($result)){
          echo "<tr>";
          echo "<td>" . $row['product_id'] . "</td>";
          echo "<td>" . $row['name'] . "</td>";

          if($row['EOQ'] == true){
            if($row['inventory'] < $row['EOQ']*0.1){
              echo "<td style='color:red'>" . $row['inventory'] . "</td>";
            }else{
              echo "<td>" . $row['inventory'] . "</td>";
            }
            echo "<td>" . $row['EOQ'] . "</td>";
          }else{
            if($row['inventory'] < $row['EPQ']*0.1){
              echo "<td style='color:red'>" . $row['inventory'] . "</td>";
            }else{
              echo "<td>" . $row['inventory'] . "</td>";
            }
            echo "<td>" . $row['EPQ'] . "</td>";
          }
          echo "</tr>";
        }
        ?>
      </table>
    </div>
    <br>
    <div class="row click">
      <div class="home">
        <a href="index.html"><h2>回首頁</h2></a>
      </div>
    </div>
    <br>
  </div>

</body>
</html>