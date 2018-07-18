<?php
session_start();
$code=$_POST['code'];
$name =$_POST['name'];
$price =$_POST['price'];

$conn = mysql_connect("127.0.0.1","work","w0rk@ncyu");//連接伺服器
//mysql_connect("127.0.0.1", "root", "qazwsxedc"); //連接伺服器
 mysql_select_db("test");//選擇資料庫
 mysql_query("set names utf8");//讓資料可以讀取中文
 
//搜尋資料庫資料
$sql = "SELECT * FROM test_two;
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
if($row['code'] == $code)||($row['name'] == $code)                 //資料庫裡是否有這個學號
{ 

}
else echo "Nothing"; //帳號錯誤	
?>