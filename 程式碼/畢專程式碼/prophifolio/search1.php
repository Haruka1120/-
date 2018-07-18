<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
$conn = mysql_connect("127.0.0.1","work","w0rk@ncyu");//連接伺服器
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//mysql_connect("127.0.0.1", "root", "qazwsxedc"); //連接伺服器
 mysql_select_db("Prophifolio");//選擇資料庫
 mysql_query("set names utf8");//讓資料可以讀取中文

$area_item1 = $_POST['area_item1'];
$item2 = $_POST['item2'];
$item3 = $_POST['item3'];
$item4 = $_POST['item4'];
$page = $_POST['page'];
$sort = $_POST['sort'];
$length = $_POST['length'];
$cond = array(1 => '', '', '', '');
$screen = $_POST['screen'];


if(!empty($_POST['area_item1'])){
//Loop to store and display values of individual checked checkbox.
foreach($_POST['area_item1'] as $selected){
//echo $selected."</br>";
}
}
if(!empty($_POST['item2'])){
//Loop to store and display values of individual checked checkbox.
foreach($_POST['item2'] as $selected){
//echo $selected."</br>";
}
}
if(!empty($_POST['item3'])){
//Loop to store and display values of individual checked checkbox.
foreach($_POST['item3'] as $selected){
//echo $selected."</br>";
}
}
if(!empty($_POST['item4'])){
//Loop to store and display values of individual checked checkbox.
foreach($_POST['item4'] as $selected){
//echo $selected."</br>";
}
}



for ($x = 0; $x <= 4; $x++)
{
	if ($area_item1[$x] == '2_1')
	{
	if ($item2[$x] == 1)
	{
	$a = $item2[$x];
	$a = ">";
	} else {
	$a = "<";
	}
	$cond[$x] = "EPS " . $a . $item3[$x];
	}
}

for ($x = 0; $x <= 4; $x++)
{
	if ($area_item1[$x] == '2_2')
	{
	if ($item2[$x] == 1)
	{
	$a = $item2[$x];
	$a = "<";
	} else {
	$a = ">";
	}
	$cond[$x] = "PEratio " . $a . $item3[$x];
	}
}

for ($x = 0; $x <= 4; $x++)
{
	if ($area_item1[$x] == '2_4')
	{
	if ($item2[$x] == 1)
	{
	$a = $item2[$x];
	$a = "<";
	} else {
	$a = ">";
	}
	$cond[$x] = "`Price-Book Ratio` " . $a . $item3[$x];
	}
}

for ($x = 0; $x <= 4; $x++)
{
	if ($area_item1[$x] == '2_6')
	{
	if ($item2[$x] == 1)
	{
	$a = $item2[$x];
	$a = "<";
	} else {
	$a = ">";
	}
	$cond[$x] = "start_price " . $a . $item3[$x];
	}
}

for ($x = 0; $x <= 4; $x++)
{
	if ($area_item1[$x] == '2_7')
	{
	if ($item2[$x] == 1)
	{
	$a = $item2[$x];
	$a = "<";
	} else {
	$a = ">";
	}
	$cond[$x] = "close_price " . $a . $item3[$x];
	}
}

for ($x = 0; $x <= 4; $x++)
{
	if ($area_item1[$x] == '3_1')
	{
	if ($item2[$x] == 1)
	{
	$a = $item2[$x];
	$a = ">";
	} else {
	$a = "<";
	}
	$cond[$x] = "Operating_Gross_Profit_Margin " . $a . $item3[$x];
	}
}

for ($x = 0; $x <= 4; $x++)
{
	if ($area_item1[$x] == '3_2')
	{
	if ($item2[$x] == 1)
	{
	$a = $item2[$x];
	$a = ">";
	} else {
	$a = "<";
	}
	$cond[$x] = "Operating_Profit_Margin " . $a . $item3[$x];
	}
}

for ($x = 0; $x <= 4; $x++)
{
	if ($area_item1[$x] == '3_3')
	{
	if ($item2[$x] == 1)
	{
	$a = $item2[$x];
	$a = ">";
	} else {
	$a = "<";
	}
	$cond[$x] = "ROE " . $a . $item3[$x];
	}
}

for ($x = 0; $x <= 4; $x++)
{
	if ($area_item1[$x] == '3_4')
	{
	if ($item2[$x] == 1)
	{
	$a = $item2[$x];
	$a = ">";
	} else {
	$a = "<";
	}
	$cond[$x] = "ROA " . $a . $item3[$x];
	}
}

for ($x = 0; $x <= 4; $x++)
{
	if ($area_item1[$x] == '3_5')
	{
	if ($item2[$x] == 1)
	{
	$a = $item2[$x];
	$a = ">";
	} else {
	$a = "<";
	}
	$cond[$x] = "Debt_ratio " . $a . $item3[$x];
	}
}

if ($length == 1)
{
	$sql = "SELECT * FROM FinanceStatement JOIN Stock_referance ON Stock_referance.Stock_code = FinanceStatement.NO_STOCK JOIN stock_data ON stock_data.NO_STOCK = FinanceStatement.NO_STOCK WHERE " . $cond[0] . " AND stock_data.date = '2017-06-30' AND FinanceStatement.Period = '106.2Q'";
}
if ($length == 2)
{
	$sql = "SELECT * FROM FinanceStatement JOIN Stock_referance ON Stock_referance.Stock_code = FinanceStatement.NO_STOCK JOIN stock_data ON stock_data.NO_STOCK = FinanceStatement.NO_STOCK WHERE " . $cond[0] . " AND " . $cond[1] . " AND stock_data.date = '2017-06-30' AND FinanceStatement.Period = '106.2Q'";
}
if ($length == 3)
{
	$sql = "SELECT * FROM FinanceStatement JOIN Stock_referance ON Stock_referance.Stock_code = FinanceStatement.NO_STOCK JOIN stock_data ON stock_data.NO_STOCK = FinanceStatement.NO_STOCK WHERE " . $cond[0] . " AND " . $cond[1] . " AND " . $cond[2] . " AND stock_data.date = '2017-06-30' AND FinanceStatement.Period = '106.2Q'";
}
//if ($length == 4)
{
	//$sql = "SELECT * FROM FinanceStatement JOIN Stock_referance ON Stock_referance.Stock_code = FinanceStatement.NO_STOCK JOIN stock_data ON stock_data.NO_STOCK = FinanceStatement.NO_STOCK WHERE " . $cond[0] . " AND " . $cond[1] . " AND " . $cond[2] . " AND " . $cond[3] . " AND stock_data.date = '2017-06-30' AND FinanceStatement.Period = '106.2Q'"
}

//$sql = "SELECT * FROM `stock_data` INNER JOIN stock_code ON stock_code.code=stock_data.NO_STOCK WHERE PEratio <15 AND date = '2017-09-08'";
//$sql = "SELECT * FROM FinanceStatement JOIN stock_code ON stock_code.code = FinanceStatement.NO_STOCK JOIN stock_data ON stock_data.NO_STOCK = FinanceStatement.NO_STOCK WHERE stock_data.date = '2017-06-30' AND FinanceStatement.Period = '106.2Q'";
$result = mysql_query($sql);
//$row = mysql_fetch_array($result);
//echo $sql;
//echo "<br>";

 
 if(mysql_num_rows($result) > 0){
    echo '<div class = "st_table"';
		if ($length == 1 && $screen > "410"){
			echo ' style = "width: 186px;margin:0 auto;"';
		}
		if ($length == 2 && $screen > "410"){
			echo ' style = "width: 296px;margin:0 auto;"';
		}
		if ($length == 3 && $screen > "410"){
			echo ' style = "width: 406px;margin:0 auto;"';
		}
		echo '><div class="movebar"><ul class="ul_title">';
        echo '<li class="col_name" data-js="1_1912">股票</li>';
		//echo '<li class="col_result" data-js="1_1932">日期</li>';
		
		if ($area_item1[0] == '2_1' || $area_item1[1] == '2_1' || $area_item1[2] == '2_1' || $area_item1[3] == '2_1')
		{
			echo '<li class="col_result" data-js="1_1932">近1季 EPS</li>';
		}
		if ($area_item1[0] == '2_2' || $area_item1[1] == '2_2' || $area_item1[2] == '2_2' || $area_item1[3] == '2_2')
		{
			echo '<li class="col_result" data-js="1_1932">本益比(P/E)</li>';
		}
		if ($area_item1[0] == '2_4' || $area_item1[1] == '2_4' || $area_item1[2] == '2_4' || $area_item1[3] == '2_4')
		{
			echo '<li class="col_result" data-js="1_1932">股價淨值比</li>';
		}
		if ($area_item1[0] == '2_6' || $area_item1[1] == '2_6' || $area_item1[2] == '2_6' || $area_item1[3] == '2_6')
		{
			echo '<li class="col_result" data-js="1_1932"> 開盤價</li>';
		}
		if ($area_item1[0] == '2_7' || $area_item1[1] == '2_7' || $area_item1[2] == '2_7' || $area_item1[3] == '2_7')
		{
			echo '<li class="col_result" data-js="1_1932"> 收盤價</li>';
		}
		if ($area_item1[0] == '3_1' || $area_item1[1] == '3_1' || $area_item1[2] == '3_1' || $area_item1[3] == '3_1')
		{
			echo '<li class="col_result" data-js="1_1932">近1季毛利率</li>';
		}
		if ($area_item1[0] == '3_2' || $area_item1[1] == '3_2' || $area_item1[2] == '3_2' || $area_item1[3] == '3_2')
		{
			echo '<li class="col_result" data-js="1_1932"> 近1季營益率</li>';
		}		
		if ($area_item1[0] == '3_3' || $area_item1[1] == '3_3' || $area_item1[2] == '3_3' || $area_item1[3] == '3_3')
		{
			echo '<li class="col_result" data-js="1_1932"> 近1季 ROE(%)</li>';
		}
		if ($area_item1[0] == '3_4' || $area_item1[1] == '3_4' || $area_item1[2] == '3_4' || $area_item1[3] == '3_4')
		{
			echo '<li class="col_result" data-js="1_1932"> 近1季 ROA (%)</li>';
		}
		if ($area_item1[0] == '3_5' || $area_item1[1] == '3_5' || $area_item1[2] == '3_5' || $area_item1[3] == '3_5')
		{
			echo '<li class="col_result" data-js="1_1932"> 近1季負債比率</li>';
		}
		
		
		//echo '<li class="col_join">自選股</li>';
    echo '</ul></div>';
	if ($length == 1){
		echo '<br><br>';
	}
        while($two = mysql_fetch_array($result)){
            echo '<ul class="ul_stock">';				
                //echo '<li class="col_name li_warp"><a href="k_line.php" onclick="sendphp()">' . $two['company_name'] . "<br>(" . $two['code'] . ")</a></li>";
				echo '<li class="col_name li_warp"><form action="k_line.php" method="Post"><button name="number" class="company_button" value="' . $two['Stock_code'] . '">' . $two['Stock_name'] . "<br>(" . $two['Stock_code'] . ')</button></form></li>';
                //echo '<li class="col_sold color_gre">' . $two['date'] . "</li>";
				
				if ($area_item1[0] == '2_1' || $area_item1[1] == '2_1' || $area_item1[2] == '2_1' || $area_item1[3] == '2_1')
				{
					echo '<li class="col_sold color_red">' . $two['EPS'] . "</li>";
				}
				if ($area_item1[0] == '2_2' || $area_item1[1] == '2_2' || $area_item1[2] == '2_2' || $area_item1[3] == '2_2')
				{
					echo '<li class="col_sold color_red">' . $two['PEratio'] . "</li>";
				}
				if ($area_item1[0] == '2_4' || $area_item1[1] == '2_4' || $area_item1[2] == '2_4' || $area_item1[3] == '2_4')
				{
					echo '<li class="col_sold color_red">' . $two['Price-Book Ratio'] . "</li>";
				}
				if ($area_item1[0] == '2_6' || $area_item1[1] == '2_6' || $area_item1[2] == '2_6' || $area_item1[3] == '2_6')
				{
					echo '<li class="col_sold color_red">' . $two['start_price'] . "</li>";
				}
				if ($area_item1[0] == '2_7' || $area_item1[1] == '2_7' || $area_item1[2] == '2_7' || $area_item1[3] == '2_7')
				{
					echo '<li class="col_sold color_red">' . $two['close_price'] . "</li>";
				}	
				if ($area_item1[0] == '3_1' || $area_item1[1] == '3_1' || $area_item1[2] == '3_1' || $area_item1[3] == '3_1')
				{
					echo '<li class="col_sold color_red">' . $two['Operating_Gross_Profit_Margin'] . "</li>";
				}
				if ($area_item1[0] == '3_2' || $area_item1[1] == '3_2' || $area_item1[2] == '3_2' || $area_item1[3] == '3_2')
				{
					echo '<li class="col_sold color_red">' . $two['Operating_Profit_Margin'] . "</li>";
				}		
				if ($area_item1[0] == '3_3' || $area_item1[1] == '3_3' || $area_item1[2] == '3_3' || $area_item1[3] == '3_3')
				{
					echo '<li class="col_sold color_red">' . $two['ROE'] . "</li>";
				}
				if ($area_item1[0] == '3_4' || $area_item1[1] == '3_4' || $area_item1[2] == '3_4' || $area_item1[3] == '3_4')
				{
					echo '<li class="col_sold color_red">' . $two['ROA'] . "</li>";
				}
				if ($area_item1[0] == '3_5' || $area_item1[1] == '3_5' || $area_item1[2] == '3_5' || $area_item1[3] == '3_5')
				{
					echo '<li class="col_sold color_red">' . $two['Debt_ratio'] . "</li>";
				}				
				
			//echo '<li class="col_join"><a href="http://pchome.megatime.com.tw/prot/sto1/com1/add_stock/sid1203.html">加入</a></li>';
            echo "</ul>";
			
			if ($length == 1){
			echo '<br>';
			}
        }
	echo "</div>";
        mysqli_free_result($result);
    } else{
        //echo "No records matching your query were found.";
		echo "對不起，有 0 檔股票符合。請改一下條件";
    }

?>