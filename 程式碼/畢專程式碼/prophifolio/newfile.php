<?php
mysql_connect("localhost","root","1234");//連結伺服器
mysql_select_db("test2");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
$data=mysql_query("select * from stock_referance");//從contact資料庫中選擇所有的資料表

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>股價資訊</title>
</head>

<body>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<div id="container" style="height: 400px; min-width: 310px"></div>

<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>


<script src="k.js"></script>



<form action="test.php" method="Post">
 股票代號:
 <input type="Text" name="number">
 <input type="Submit">
 </form>

<p>

</p>
<table width="700" border="1">
  <tr>
    <td>股票代號</td>
    <td>公司名稱</td>
  </tr>
<?php
for($i=1;$i<=mysql_num_rows($data);$i++){
$rs=mysql_fetch_row($data);
?>
  <tr>
    <td><?php echo $rs[1]?></td>
    <td><?php echo $rs[0]?></td>
   
  </tr>
<?php
}
?>
</table>
<p>&nbsp;</p>
</body>
</html&gt