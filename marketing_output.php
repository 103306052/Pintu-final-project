<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/hover-min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/marketingCss.css">
	<title>Marketing</title>
	<style>
	body {
		margin: 0;
		padding: 0;
		background: #000 url(img/background.jpg) center center fixed no-repeat;
		-moz-background-size: cover;
		background-size: cover;
	}
	</style>
</head>

<body>
	<div class="banner">
		<img src="img/marketing/banner.jpg">
	</div>
	<div class="container">
		<br>
		<div class="row click">
			<div class="button">
				<!-- 報表產出 -->
				<a href=""><h2>產出資料表</h2></a>
			</div>
			<div class="home">
				<a href="index.html"><h2>回首頁</h2></a>
			</div>
		</div>
		<br>
		<?php
		require "db.php";
		function printTable($sql){
			$result = mysql_query($sql);
			echo "<table class='table table-bordered classfication'>
			<tr>
			<th>客戶姓名</th>
			<th>E-mail</th>
			<th>電話</th>
			</tr>";     
			while ($row = mysql_fetch_array($result)){
				echo "<tr>";
				echo "<td>" . $row['customer_name'] . "</td>";
				echo "<td><a href=''>" . $row['customer_email'] . "</a></td>";
				echo "<td>" . $row['customer_phone'] . "</td>";
				echo "</tr>";
			}
			echo "</table><br>";   
		}
		?>
		<div class="row">
			<h3>最有價值客戶</h3>
			<?php
			$sql1 = "SELECT customer_name,customer_email,customer_phone FROM customers
			WHERE R>(SELECT AVG(R) FROM customers) and
			F>(SELECT AVG(F) FROM customers) and 
			M>(SELECT AVG(M) FROM customers)
			ORDER BY R+F*50+M*25 DESC";
			printTable($sql1);
			?>
		</div>
		<br>
		<div class="row">
			<h3>重要發展客戶</h3>
			<?php
			$sql2 = "SELECT customer_name,customer_email,customer_phone FROM customers
			WHERE R<(SELECT AVG(R) FROM customers) and
			F>(SELECT AVG(F) FROM customers) and 
			M>(SELECT AVG(M) FROM customers)
			ORDER BY R+F*50+M*25 DESC";
			printTable($sql2);
			?>
		</div>
		<br>
		<div class="row">
			<h3>重要保持客戶</h3>
			<?php
			$sql3 = "SELECT customer_name,customer_email,customer_phone FROM customers
			WHERE R>(SELECT AVG(R) FROM customers) and
			F>(SELECT AVG(F) FROM customers) and 
			M<(SELECT AVG(M) FROM customers)
			ORDER BY R+F*50+M*25 DESC";
			printTable($sql3);
			?>	
		</div>
		<br>
		<div class="row">
			<h3>重要挽留客戶</h3>
			<?php
			$sql4 = "SELECT customer_name,customer_email,customer_phone FROM customers
			WHERE R<(SELECT AVG(R) FROM customers) and
			F>(SELECT AVG(F) FROM customers) and 
			M<(SELECT AVG(M) FROM customers)
			ORDER BY R+F*50+M*25 DESC";
			printTable($sql4);
			?>
		</div>
		<br>
		<div class="row">
			<h3>一般價值客戶</h3>
			<?php
			$sql5 = "SELECT customer_name,customer_email,customer_phone FROM customers
			WHERE R>(SELECT AVG(R) FROM customers) and
			F<(SELECT AVG(F) FROM customers) and 
			M>(SELECT AVG(M) FROM customers)
			ORDER BY R+F*50+M*25 DESC";
			printTable($sql5);
			?>	
		</div>
		<br>
		<div class="row">
			<h3>一般發展客戶</h3>
			<?php
			$sql6 = "SELECT customer_name,customer_email,customer_phone FROM customers
			WHERE R<(SELECT AVG(R) FROM customers) and
			F<(SELECT AVG(F) FROM customers) and 
			M>(SELECT AVG(M) FROM customers)
			ORDER BY R+F*50+M*25 DESC";
			printTable($sql6);
			?>	
		</div>
		<br>
		<div class="row">
			<h3>一般保持客戶</h3>
			<?php
			$sql7 = "SELECT customer_name,customer_email,customer_phone FROM customers
			WHERE R>(SELECT AVG(R) FROM customers) and
			F<(SELECT AVG(F) FROM customers) and 
			M<(SELECT AVG(M) FROM customers)
			ORDER BY R+F*50+M*25 DESC";
			printTable($sql7);
			?>	
		</div>
		<br>
		<div class="row">
			<h3>一般挽留客戶</h3>
			<?php
			$sql8 = "SELECT customer_name,customer_email,customer_phone FROM customers
			WHERE R<(SELECT AVG(R) FROM customers) and
			F<(SELECT AVG(F) FROM customers) and 
			M<(SELECT AVG(M) FROM customers)
			ORDER BY R+F*50+M*25 DESC";
			printTable($sql8);
			?>	
		</div>
	</div>
</body>

</html>