<?php
    session_start();
    if($_SESSION['account_number'] != null){
        
    } else {
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
    }
    
    
    $stock_code = $_POST['number'];
    
    
    mysql_connect("127.0.0.1","work","w0rk@ncyu");//連結伺服器
    mysql_select_db("Prophifolio");//選擇資料庫
    mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
    
//     mysql_connect("localhost","root","1234");//連結伺服器
//     mysql_select_db("prophifolio");//選擇資料庫
//     mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
    
    
    /*==============================================開始抓K線圖資料=========================================================*/
    /*      抓取開盤價        */
    $data=mysql_query("select start_price from stock_data3 where NO_STOCK = '$stock_code' ");//從contact資料庫中選擇所有的資料表
    $result_open = array();
    for($i=1;$i<=mysql_num_rows($data);$i++){
        $rs = mysql_fetch_row($data);
        $a = $rs[0];
        array_push($result_open,$a);
    }
    // echo $result_open[0];
    
    $json_array_open = json_encode($result_open);
    
    /*      抓取收盤價        */
    $data=mysql_query("select close_price from stock_data3 where NO_STOCK = '$stock_code' ");//從contact資料庫中選擇所有的資料表
    $result_close = array();
    for($i=1;$i<=mysql_num_rows($data);$i++){
        $rs = mysql_fetch_row($data);
        $a = $rs[0];
        array_push($result_close,$a);
    }
    // echo $result_close[1];
    
    /*      抓取最高價        */
    $data = mysql_query("select high_price from stock_data3 where NO_STOCK = '$stock_code' ");//從contact資料庫中選擇所有的資料表
    $result_high = array();
    for($i=1;$i<=mysql_num_rows($data);$i++){
        $rs = mysql_fetch_row($data);
        $a = $rs[0];
        array_push($result_high,$a);
    }
    
    // echo $result_high[1];
    
    /*      抓取最低價        */
    $data=mysql_query("select low_price from stock_data3 where NO_STOCK = '$stock_code' ");//從contact資料庫中選擇所有的資料表
    $result_low = array();
    for($i=1;$i<=mysql_num_rows($data);$i++){
        $rs = mysql_fetch_row($data);
        $a = $rs[0];
        array_push($result_low,$a);
    }
    
    
    // echo $result_low[1];
    
    /*      抓取成交價        */
    $data=mysql_query("select deal_price from stock_data3 where NO_STOCK = '$stock_code' ");//從contact資料庫中選擇所有的資料表
    $result_deal = array();
    for($i=1;$i<=mysql_num_rows($data);$i++){
        $rs = mysql_fetch_row($data);
        
        $NewString = explode(".", $rs[0]);
        
        $a = $NewString[0];
        array_push($result_deal,$a);
    }
    
    // echo $result_deal[1];
    
    
    /*      抓取時間        */
    $data_date=mysql_query("select date from stock_data3 where NO_STOCK = '$stock_code' ");//從contact資料庫中選擇所有的資料表
    $result_date = array();
    for($i=1;$i<=mysql_num_rows($data_date);$i++){
        $rs=mysql_fetch_row($data_date);
        
        $NewString = explode("-", $rs[0]);
        
        
        //     $NewString[0] = $NewString[0] + 1911;
        //     $NewString[1] = $NewString[1] - 1;
        $ts = gmmktime(0,0,0,$NewString[1],$NewString[2],$NewString[0])*1000;
        
        
        
        array_push($result_date,$ts);
        
    }
    
    // echo $result_date[1];
    
    $json_array_date =json_encode($result_date);
    $x = array();
    
    for($i=0;$i<count($result_date);$i++){
        
        $z = array();
        array_push($z,(int)$result_date[$i]);
        array_push($z,(float)$result_open[$i]);
        array_push($z,(float)$result_high[$i]);
        array_push($z,(float)$result_low[$i]);
        array_push($z,(float)$result_close[$i]);
        array_push($z,(float)$result_deal[$i]);
        array_push($x,$z);
        
        
    }
    
    $json_array_x = json_encode($x);
    
    
    $test=array();
    $test2=array();
    $test = [$result_date[0],$result_open[0],$result_high[0],$result_low[0],$result_close[0],$result_deal[0]];
    
    array_push($test2,$test);
    
    $json_array_test = json_encode($test2);
    
    
    
    /*      抓取公司名稱        */
    $name_data = mysql_query("select stock_name from Stock_referance where stock_code = '$stock_code'");//從contact資料庫中選擇所有的資料表
    $result_name = array();
    for($i=1;$i<=mysql_num_rows($name_data);$i++){
        $rs = mysql_fetch_row($name_data);
        $a = $rs[0];
        array_push($result_name,$a);
    }
    /*==============================================結束抓K線圖資料=========================================================*/
    
    /*==============================================開始抓每股盈餘圖表資料=========================================================*/
    /*營業毛利率 Operating_Gross_Profit_Margin*/
    $EPS_sql = mysql_query("select EPS from FinanceStatement where NO_STOCK = '$stock_code'");//從contact資料庫中選擇所有的資料表
    $EPS = array();
    for($i=1;$i<=mysql_num_rows($EPS_sql);$i++){
        $rs = mysql_fetch_row($EPS_sql);
        $a = $rs[0];
        array_push($EPS,$a);
    }
    
    $k = array();
    for($i=0;$i<count($EPS);$i++){
        $z = array();
        array_push($z,(float)$EPS[$i]);
        array_push($k,$z);
    }
    
    $json_array_EPS = json_encode($k);
    
    
    
    /*==============================================結束抓每股盈餘圖表資料=========================================================*/
    
    
    /*==============================================開始抓利率比率圖表資料=========================================================*/
    /*營業毛利率 Operating_Gross_Profit_Margin*/
    $Operating_Gross = mysql_query("select Operating_Gross_Profit_Margin from FinanceStatement where NO_STOCK = '$stock_code'");//從contact資料庫中選擇所有的資料表
    $gross_margin = array();
    for($i=1;$i<=mysql_num_rows($Operating_Gross);$i++){
        $rs = mysql_fetch_row($Operating_Gross);
        $a = $rs[0];
        array_push($gross_margin,$a);
    }
    
    $aaa = array();
    for($i=0;$i<count($gross_margin);$i++){
        $z = array();
        array_push($z,(float)$gross_margin[$i]);
        array_push($aaa,$z);
    }
    
    $json_array_gross = json_encode($aaa);
    
    
    /*營業利益率 Operating_Profit_Margin*/
    $Operating_Profit = mysql_query("select Operating_Profit_Margin from FinanceStatement where NO_STOCK = '$stock_code' ");//從contact資料庫中選擇所有的資料表
    $profit_margin = array();
    for($i=1;$i<=mysql_num_rows($Operating_Profit);$i++){
        $rs = mysql_fetch_row($Operating_Profit);
        $a = $rs[0];
        array_push($profit_margin,$a);
    }
    
    $bbb = array();
    for($i=0;$i<count($profit_margin);$i++){
        $z = array();
        array_push($z,(float)$profit_margin[$i]);
        array_push($bbb,$z);
    }
    
    $json_array_profit = json_encode($bbb);
    
    
    /*稅後淨利率 Net_Profit_Margin*/
    $Net_Profit = mysql_query("select Net_Profit_Margin from FinanceStatement where NO_STOCK = '$stock_code'");//從contact資料庫中選擇所有的資料表
    $net_profit_Margin = array();
    for($i=1;$i<=mysql_num_rows($Net_Profit);$i++){
        $rs = mysql_fetch_row($Net_Profit);
        $a = $rs[0];
        array_push($net_profit_Margin,$a);
    }
    
    $ccc = array();
    for($i=0;$i<count($net_profit_Margin);$i++){
        $z = array();
        array_push($z,(float)$net_profit_Margin[$i]);
        array_push($ccc,$z);
    }
    
    $json_array_net = json_encode($ccc);
    
    
    /*==============================================結束抓利率比率圖表資料=========================================================*/
    
    /*==============================================開始抓公司基本資料=========================================================*/
    /*營收成長率 Revenue_growth_rate*/
    $Revenue_growth = mysql_query("select Revenue_growth_rate from FinanceStatement where NO_STOCK = '$stock_code' and Period = '106.2Q'");//從contact資料庫中選擇所有的資料表
    $revenue_growth_rate = array();
    for($i=1;$i<=mysql_num_rows($Revenue_growth);$i++){
        $rs = mysql_fetch_row($Revenue_growth);
        $a = $rs[0];
        array_push($revenue_growth_rate,$a);
    }
    
    /*營業利益成長率 Operating_profit_growth_rate*/
    $Operating_profit_growth = mysql_query("select Operating_profit_growth_rate from FinanceStatement where NO_STOCK = '$stock_code' and Period = '106.2Q'");//從contact資料庫中選擇所有的資料表
    $operating_profit_growth_rate = array();
    for($i=1;$i<=mysql_num_rows($Operating_profit_growth);$i++){
        $rs = mysql_fetch_row($Operating_profit_growth);
        $a = $rs[0];
        array_push($operating_profit_growth_rate,$a);
    }
    
    /*稅後淨利成長率 Net_profit_growth_after_tax*/
    $Net_profit_growth_after = mysql_query("select Net_profit_growth_after_tax from FinanceStatement where NO_STOCK = '$stock_code' and Period = '106.2Q'");//從contact資料庫中選擇所有的資料表
    $net_profit_growth_after_tax = array();
    for($i=1;$i<=mysql_num_rows($Net_profit_growth_after);$i++){
        $rs = mysql_fetch_row($Net_profit_growth_after);
        $a = $rs[0];
        array_push($net_profit_growth_after_tax,$a);
    }
    
    /*總資產成長率 Total_asset_growth_rate*/
    $Total_asset_growth = mysql_query("select Total_asset_growth_rate from FinanceStatement where NO_STOCK = '$stock_code' and Period = '106.2Q'");//從contact資料庫中選擇所有的資料表
    $total_asset_growth_rate = array();
    for($i=1;$i<=mysql_num_rows($Total_asset_growth);$i++){
        $rs = mysql_fetch_row($Total_asset_growth);
        $a = $rs[0];
        array_push($total_asset_growth_rate,$a);
    }
    
    /*淨值成長率 Net_growth_rate*/
    $Net_growth = mysql_query("select Net_growth_rate from FinanceStatement where NO_STOCK = '$stock_code' and Period = '106.2Q'");//從contact資料庫中選擇所有的資料表
    $net_growth_rate = array();
    for($i=1;$i<=mysql_num_rows($Net_growth);$i++){
        $rs = mysql_fetch_row($Net_growth);
        $a = $rs[0];
        array_push($net_growth_rate,$a);
    }
    
    /*固定資產成長率 Growth_rate_of_fixed_assets*/
    $Growth_rate = mysql_query("select Growth_rate_of_fixed_assets from FinanceStatement where NO_STOCK = '$stock_code' and Period = '106.2Q'");//從contact資料庫中選擇所有的資料表
    $growth_rate_of_fixed_assets = array();
    for($i=1;$i<=mysql_num_rows($Growth_rate);$i++){
        $rs = mysql_fetch_row($Growth_rate);
        $a = $rs[0];
        array_push($growth_rate_of_fixed_assets,$a);
    }
    
    /*==============================================結束抓公司基本資料=========================================================*/
    
    /*==============================================開始抓新聞資料=========================================================*/
    /*           抓取新聞日期            */
    $news_date = mysql_query("select date from news where company_code = '$stock_code' ");//從contact資料庫中選擇所有的資料表
    $news_date_use = array();
    for($i=1;$i<=mysql_num_rows($news_date);$i++){
        $rs = mysql_fetch_row($news_date);
        $a = $rs[0];
        array_push($news_date_use,$a);
    }
    /*           抓取新聞標題            */
    $news_title = mysql_query("select news_title from news where company_code = '$stock_code' ");//從contact資料庫中選擇所有的資料表
    $news_title_use = array();
    for($i=1;$i<=mysql_num_rows($news_title);$i++){
        $rs = mysql_fetch_row($news_title);
        $a = $rs[0];
        array_push($news_title_use,$a);
    }
    /*           抓取新聞的URL            */
    $news_url = mysql_query("select news_url from news where company_code = '$stock_code' ");//從contact資料庫中選擇所有的資料表
    $news_url_use = array();
    for($i=1;$i<=mysql_num_rows($news_url);$i++){
        $rs = mysql_fetch_row($news_url);
        $a = $rs[0];
        array_push($news_url_use,$a);
    }
    /*         抓取新聞的相關股票          */
    $news_relate = mysql_query("select related_stock from news where company_code = '$stock_code'");//從contact資料庫中選擇所有的資料表
    
    //代號的二維array $news_relate_use
    $news_relate_use = array();
    for($i=1;$i<=mysql_num_rows($news_relate);$i++){
        $rs = mysql_fetch_row($news_relate);
        $NewString_relate = explode('"', $rs[0]);
        $a = $NewString_relate;
        array_push($news_relate_use,$a);
    }
    
    
    for($i=0;$i<=count($news_relate_use);$i+=1)
    {
        for($j=0;$j<=40;$j+=2){
            unset($news_relate_use[$i][$j]);
        }
        
    }
    //要修改
    for($i=0;$i<count($news_relate_use);$i+=1)
    {
        $news_relate_use[$i] = array_values($news_relate_use[$i]);
    }
    
    
    //中文的二維array $test_array
    $test_array=array(array());
    //要修改
    for($i=0;$i<count($news_relate_use);$i+=1)
    {
        $news_name_chinese = array();
        for($j=0;$j<count($news_relate_use[$i]);$j+=1)
        {
            $news_test = $news_relate_use[$i][$j];
            $news_name_data = mysql_query("select stock_name from Stock_referance where stock_code = '$news_test'");//從contact資料庫中選擇所有的資料表
            
            for($k=0;$k<mysql_num_rows($news_name_data);$k++)
            {
                $rs = mysql_fetch_row($news_name_data);
                $a = $rs[0];
                array_push($news_name_chinese,$a);
                for($s=0;$s<count($news_relate_use[$i]);$s+=1)
                {
                    $test_array[$i][$s]=$news_name_chinese[$s];
                }
            }
        }
    }
    
    /*==============================================結束抓新聞資料=========================================================*/
    
    /*==============================================開始抓ROE/ROA資料=========================================================*/
    /*           抓取ROE            */
    $ROE = mysql_query("select ROE from FinanceStatement where NO_STOCK = '$stock_code'");//從contact資料庫中選擇所有的資料表
    $ROE_use = array();
    for($i=1;$i<=mysql_num_rows($ROE);$i++){
        $rs = mysql_fetch_row($ROE);
        $a = $rs[0];
        array_push($ROE_use,$a);
    }
    $re = array();
    for($i=0;$i<count($ROE_use);$i++){
        $z = array();
        array_push($z,(float)$ROE_use[$i]);
        array_push($re,$z);
    }
    
    $json_array_ROE = json_encode($re);
    /*          抓取ROA            */
    $ROA = mysql_query("select ROA from FinanceStatement where NO_STOCK = '$stock_code'");//從contact資料庫中選擇所有的資料表
    $ROA_use = array();
    for($i=1;$i<=mysql_num_rows($ROA);$i++){
        $rs = mysql_fetch_row($ROA);
        $a = $rs[0];
        array_push($ROA_use,$a);
    }
    $ra = array();
    for($i=0;$i<count($ROA_use);$i++){
        $z = array();
        array_push($z,(float)$ROA_use[$i]);
        array_push($ra,$z);
    }
    
    $json_array_ROA = json_encode($ra);
    /*==============================================結束抓ROE/ROA資料=========================================================*/
    /*==============================================開始抓ROE/ROA資料=========================================================*/
    $category = mysql_query("select category from Stock_referance where Stock_code = '$stock_code'");//從contact資料庫中選擇所有的資料表

    /*      抓取公司名稱        */
    $c_data = mysql_query("select category from Stock_referance where Stock_code = '$stock_code'");//從contact資料庫中選擇所有的資料表
    $result_c = array();
    for($i=1;$i<=mysql_num_rows($c_data);$i++){
        $rs = mysql_fetch_row($c_data);
        $a = $rs[0];
        array_push($result_c,$a);
    }
    /*==============================================結束抓ROE/ROA資料=========================================================*/
    
    ?>
<!DOCTYPE html>
<html>
<head>
<!--    <meta charset="UTF-8"> -->
<!--    <title>股票成交價</title> -->
<!--- Basic Page Needs
================================================== -->
<meta charset="utf-8">
<title>Prophitfolio - 以深度學習預言可獲利之最適投資組合</title>
<meta content="" name="description">
<meta content="" name="author"><!-- Mobile Specific Metas
================================================== -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<link href="prettyPhoto.css" rel="stylesheet" type="text/css">
<link href="fuckyou.css" rel="stylesheet" type="text/css">
<link href="layout.css" rel="stylesheet" type="text/css">
<link href="layout_wei.css" rel="stylesheet" type="text/css">
<link href="media-queries.css" rel="stylesheet" type="text/css">
<link href="animate.css" rel="stylesheet" type="text/css"><!-- Script
================================================== -->

<script src="js/modernizr.js">
</script><!-- Favicons
================================================== -->
<link href="favicon.png" rel="shortcut icon"><!--     圖表用js
==================================================   -->

<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js">
</script><!--    <script src="https://code.highcharts.com/stock/highstock.js"></script> -->

<script src="highstock_k_line_use.js">
</script>
<script src="https://code.highcharts.com/stock/modules/exporting.js">
</script>
<script src="https://code.highcharts.com/highcharts.js">
</script>
<script src="https://code.highcharts.com/modules/exporting.js">
</script>
<script src="https://code.highcharts.com/highcharts.js">
</script>
<script src="https://code.highcharts.com/modules/exporting.js">
</script>
<script src="http://github.highcharts.com/4e4974efb/highstock.js">
</script>
</head>
<body>
<!-- Header
================================================== -->
<header>
<div class="logo">
<a href="index.php" style="margin:0; width: 120px; height: 32px;"><img alt="" src="images/logo.png" style="width: 120px; height: 32px;"></a>
</div>
<nav id="nav-wrap">
<a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a> <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>
<ul class="nav" id="nav">

	<li><s style="background-color: #DDDDDD; display: inline-block; padding: 0; font-size: 18px; line-height: 38px; text-decoration: none; text-align: left"><a href="k_line.php">一般搜尋</a></s></li>
			
	<li><s style="background-color: #DDDDDD; display: inline-block; padding: 0; font-size: 18px; line-height: 38px; text-decoration: none; text-align: left"><a href="search.php">進階搜尋</a></s></li>

	<li><s style="background-color: #DDDDDD; display: inline-block; padding: 0; font-size: 18px; line-height: 38px; text-decoration: none; text-align: left"><a href="profile.php">個人頁面</a></s></li>
</ul><!-- end #nav -->
</nav><!-- end #nav-wrap -->
</header><!-- Header End -->
<style>
/* ======================== 股票輸入按鈕css ============================ */
input[type="submit"]
{
padding: 10px 15px;
margin: 0 0 50px 0;
display:inline-block;
}
input[type="text"]
{
padding: 10px 15px;
margin: 0 0 0 0;
display:inline-block;
}
.test
{
padding: 5px 20px;
}
</style><!-- Homepage Hero
================================================== -->
<section id="hero">
<div class="row">
<div class="twelve columns">
<div class="hero-text">
<h1 class="responsive-headline" style="font-weight:300; margin-bottom:30px;">股票搜尋</h1>
</div><!--<div class="buttons">
<a class="button trial" href="#">Free Trial</a>
<a class="button learn-more smoothscroll" href="#features">Learn More</a>
</div>-->
</div>
</div>
</section><!-- Homepage Hero end -->
<section id='features'>
<!--             全部的div             -->
<!--<div style="vertical-align:middle; width:100%; height:60px; display:inline-block;">-->

<!--         股票代號輸入    -->
<form style="margin-top:-46px; width:100%; height:50px;" action="k_line.php" method="post">
<h3 style="vertical-align:middle; font-size:20px; width:120px; display:inline-block; margin:auto 0 auto 10%;">股票代號:</h3><input style="vertical-align:middle; display:inline-block; margin: auto 5px auto 0;" name="number" type="text"> 
<input style="vertical-align:middle; display:inline-block; margin: auto 26% auto 0;" type="submit" value="搜尋">
<b><p style="display:inline-block;font-size:20pt;font-align:left; vertical-align:middle; margin: auto 5px auto 0;"><?php echo $result_c[0]?></p></b>
</form>

<div class="search-bg">

<div class="btn-bg">

<!--Red and Green-->

<?php
    $data=mysql_query("select stock from predict where predict = '$stock_code' ");//從contact資料庫中選擇所有的資料表
    $prediction = array();
    //    $prediction[0] = "0";
    for($i=1;$i<=mysql_num_rows($data);$i++){
        $rs = mysql_fetch_row($data);
        $a = $rs[0];
        array_push($prediction,$a);
    }
    
    if ($prediction[0] == "1"){
        echo '<button id="btn_store_prediction" style="background:red; color:white;width: 150px;">預測漲跌:上漲</button>';
    }
    else if ($prediction[0] == "-1"){
        echo '<button id="btn_store_prediction" style="background:green; color:white;width: 150px;">預測漲跌:下跌</button>';
    }
    else if ($prediction[0] == "0"){
        echo '<button id="btn_store_prediction" style="background:Grey; color:white;width: 150px;">預測漲跌:持平</button>';
    }
    else {
        echo '<button id="btn_store_prediction" style="background:Grey; color:white;width: 150px;">請輸入股票!!</button>';
    }
    ?>

<!--Red and Green End-->
<!--             收藏 -->
<?php
    $acNo = $_SESSION['account_number'];
    
    $data=mysql_query('SELECT `company_code` FROM stock_group_track WHERE mem_code = "' . $_SESSION['account_number'] .  '"');
    $result_code = array();
    for($i=1;$i<=mysql_num_rows($data);$i++){
        array_push($result_code,mysql_fetch_row($data)[0]);
    }
    
    $com_code = "";
    $com_code = implode(",",$result_code);
    
    if ( array_search($stock_code,$result_code) != ""){
        
        echo '<button id="btn_store" onclick="store(\'' . $com_code . '\',' . $acNo . ',' . $stock_code . ')">取消收藏</button>';
    } else {
        
        echo '<button id="btn_store" onclick="store(\'' . $com_code . '\',' . $acNo . ',' . $stock_code . ')">加入收藏</button>';
    }
    ?>
<script>
function store(com_code, account_no, stock) {
    code = com_code.split(",");
    
    if (code.indexOf(stock) >= 0){
        code.remove(stock);
        com_code = code.toString();
    } else {
        code.push(stock);
        com_code = code.toString();
    }
    console.log(com_code);
    
    sql = "UPDATE stock_group_track SET company_code = '" + com_code + "' WHERE mem_code = '" + account_no + "'";
    $.ajax({
           url      : "/DBB_prophitfolio.php",
           data      : { query_string : sql },
           type      : "POST",
           cache      : true,
           success  : function(result){
           console.log(result);
           },
           });
    var btn = $('button[id=\"btn_store\"]');
    var com_code_split = com_code.toString().split(",");
    var sql_com_code = "";
    if (btn_store.innerHTML == "取消收藏") {
        btn_store.innerHTML = "加入收藏";
        com_code_split.remove(com_code);
        for (var i = 0 ; i < com_code_split.length ; i++) {
            sql_com_code = sql_com_code + com_code_split[i] + ",";
        }
    } else if (btn_store.innerHTML == "加入收藏") {
        com_code_split.push(com_code);
        for (var i = 0 ; i < com_code_split.length ; i++) {
            sql_com_code = sql_com_code + com_code_split[i] + ",";
        }
        btn_store.innerHTML = "取消收藏";
    }
}
Array.prototype.indexOf = function(val) {
    for (var i = 0; i < this.length; i++) {
        if (this[i] == val) return i;
    }
    return -1;
};

Array.prototype.remove = function(val) {
    var index = this.indexOf(val);
    if (index > -1) {
        this.splice(index, 1);
    }
};
</script>

</div>

<!--             <input type="button" value="利潤比率"> -->
<!--                   K線圖
================================================================================   -->

<!--      公司基本資料           -->
<div class="search-container" style="display:inline-block;">
<!-- 營收成長率 -->
<div class="search-section">
<b>營收成長率</b> <c><?php echo $revenue_growth_rate[0]?>％</c>
</div><!-- 營業利益成長率 -->
<div class="search-section">
<b>營業利益成長率</b> <c><?php echo $operating_profit_growth_rate[0]?>％</c>
</div><!-- 稅後淨利成長率 -->
<div class="search-section">
<b>稅後淨利成長率</b> <c><?php echo $net_profit_growth_after_tax[0]?>％</c>
</div><!-- 總資產成長率 -->
<div class="search-section">
<b>總資產成長率</b> <c><?php echo $total_asset_growth_rate[0]?>％</c>
</div><!-- 淨值成長率 -->
<div class="search-section">
<b>淨值成長率</b> <c><?php echo $net_growth_rate[0]?>％</c>
</div><!-- 固定資產成長率 -->
<div class="search-section">
<b>固定資產成長率</b> <c><?php echo $growth_rate_of_fixed_assets[0]?>％</c>
</div>
</div>

<div class="select-bg">

<button onclick="myFunction_EPS()" style="display:inline-block; height: 50px; margin-right:2.95px;">每股盈餘</button>
<script>

//EPS
var EPS_data = <?php echo $json_array_EPS?>;
var EPS = [];
i = 7;
for (i; i >= 0; i -= 1) {
    EPS.push([
             EPS_data[i][0] // the date
             ]);
}



function myFunction_EPS() {
    Highcharts.chart('container', {
                     
                     
                     title: {
                     text: '<?php echo $result_name[0]?>EPS'
                     },
                     
                     subtitle: {
                     text: ''
                     },
                     
                     xAxis : {
                     categories: ['104 Q3', '104 Q4', '105 Q1', '105 Q2', '105 Q3', '105 Q4','106 Q1', '106 Q2'],
                     crosshair: true
                     },
                     yAxis: [{ // Primary yAxis
                     labels: {
                     format: '{value}元/每股',
                     style: {
                     color: Highcharts.getOptions().colors[1]
                     }
                     },
                     title: {
                     text: '',
                     style: {
                     color: Highcharts.getOptions().colors[1]
                     }
                     }
                     }, { // Secondary yAxis
                     title: {
                     text: '',
                     style: {
                     color: Highcharts.getOptions().colors[0]
                     }
                     },
                     labels: {
                     
                     format: '{value} mm',
                     style: {
                     color: Highcharts.getOptions().colors[0]
                     }
                     },
                     opposite: true
                     }],
                     legend: {
                     layout: 'vertical',
                     align: 'right',
                     verticalAlign: 'middle'
                     },
                     
                     
                     series: [{
                     name: 'EPS',
                     data:EPS
                     }],
                     
                     responsive: {
                     rules: [{
                     condition: {
                     maxWidth: 500
                     },
                     chartOptions: {
                     legend: {
                     layout: 'horizontal',
                     align: 'center',
                     verticalAlign: 'bottom'
                     }
                     }
                     }]
                     }
                     
                     });
}
</script> <!--                   K線圖
================================================================================   -->
<button onclick="myFunction_k_line()" style="display:inline-block; height: 50px; margin-right: 4px;">K線圖</button>
<script>
function myFunction_k_line() {
    
    var data = <?php echo $json_array_x?>;
    $(document).ready(function() {
                      // split the data set into ohlc and volume
                      var ohlc = [],
                      volume = [],
                      dataLength = data.length,
                      // set the allowed units for data grouping
                      groupingUnits = [[
                      'week',                         // unit name
                      [1]                             // allowed multiples
                      ], [
                      'month',
                      [1, 2, 3, 4, 6]
                      ]],
                      
                      i = 0;
                      
                      
                      
                      for (i; i < dataLength; i += 1) {
                      ohlc.push([
                                data[i][0], // the date
                                data[i][1], // open
                                data[i][2], // high
                                data[i][3], // low
                                data[i][4] // close
                                ]);
                      
                      volume.push([
                                  data[i][0], // the date
                                  data[i][5] // the volume
                                  ]);
                      }
                      
                      
                      
                      // create the chart
                      //圖的ID
                      Highcharts.stockChart('container', {
                                            
                                            rangeSelector: {
                                            selected: 1
                                            },
                                            
                                            title: {
                                            text: '<?php echo $result_name[0]?>K線圖'
                                            },
                                            
                                            yAxis: [{
                                            labels: {
                                            align: 'right',
                                            x: -3
                                            },
                                            title: {
                                            text: 'OHLC'
                                            },
                                            height: '60%',
                                            lineWidth: 2
                                            }, {
                                            labels: {
                                            align: 'right',
                                            x: -3
                                            },
                                            title: {
                                            text: 'Volume'
                                            },
                                            top: '65%',
                                            height: '35%',
                                            offset: 0,
                                            lineWidth: 2
                                            }],
                                            
                                            tooltip: {
                                            split: true
                                            },
                                            
                                            series: [{
                                            type: 'candlestick',
                                            name: 'AAPL',
                                            data: ohlc,
                                            dataGrouping: {
                                            units: groupingUnits
                                            }
                                            }, {
                                            type: 'column',
                                            name: 'Volume',
                                            data: volume,
                                            yAxis: 1,
                                            dataGrouping: {
                                            units: groupingUnits
                                            }
                                            }]
                                            });
                      });
    
}
</script> <!--             每股盈餘
================================================================================   -->
<button onclick="myFunction_rate()" style="display:inline-block; height: 50px; margin-right: 4px;">利潤比率</button>
<script>

//營業毛利率
var data1 = <?php echo $json_array_gross?>;
var test = [];
i = 7;
for (i; i >= 0; i -= 1) {
    test.push([
              data1[i][0] // the date
              ]);
}
//營業利益率
var data2 = <?php echo $json_array_profit?>;
var test2 = [];
i = 7;
for (i; i >= 0; i -= 1) {
    test2.push([
               data2[i][0] // the date
               ]);
}
//稅後淨利率
var data3 = <?php echo $json_array_net?>;
var test3 = [];
i = 7;
for (i; i >= 0; i -= 1) {
    test3.push([
               data3[i][0] // the date
               ]);
}



function myFunction_rate() {
    Highcharts.chart('container', {
                     
                     
                     title: {
                     text: '<?php echo $result_name[0]?>利潤比率'
                     },
                     
                     subtitle: {
                     text: ''
                     },
                     
                     xAxis : {
                     categories: ['104 Q3', '104 Q4', '105 Q1', '105 Q2', '105 Q3', '105 Q4','106 Q1', '106 Q2'],
                     crosshair: true
                     },
                     yAxis: [{ // Primary yAxis
                     labels: {
                     format: '{value}%',
                     style: {
                     color: Highcharts.getOptions().colors[1]
                     }
                     },
                     title: {
                     text: '',
                     style: {
                     color: Highcharts.getOptions().colors[1]
                     }
                     }
                     }, { // Secondary yAxis
                     title: {
                     text: '',
                     style: {
                     color: Highcharts.getOptions().colors[0]
                     }
                     },
                     labels: {
                     
                     format: '{value} mm',
                     style: {
                     color: Highcharts.getOptions().colors[0]
                     }
                     },
                     opposite: true
                     }],
                     legend: {
                     layout: 'vertical',
                     align: 'right',
                     verticalAlign: 'middle'
                     },
                     
                     
                     series: [{
                     name: '營業毛利率',
                     data:test
                     },{
                     name: '營業利益率',
                     data: test2
                     
                     },{
                     name: '稅後淨利率',
                     data: test3
                     }],
                     
                     responsive: {
                     rules: [{
                     condition: {
                     maxWidth: 500
                     },
                     chartOptions: {
                     legend: {
                     layout: 'horizontal',
                     align: 'center',
                     verticalAlign: 'bottom'
                     }
                     }
                     }]
                     }
                     
                     });
}
</script> <!--                  ROE/ROA
================================================================================   -->
<button onclick="myFunction_ROE_ROA()" style="display:inline-block; height: 50px;">報酬率</button>
<script>

//ROE
var ROE_data = <?php echo $json_array_ROE?>;
var ROE_array = [];
i = 7;
for (i; i >= 0; i -= 1) {
    ROE_array.push([
                   ROE_data[i][0] // the date
                   ]);
}
//ROA
var ROA_data = <?php echo $json_array_ROA?>;
var ROA_array = [];
i = 7;
for (i; i >= 0; i -= 1) {
    ROA_array.push([
                   ROA_data[i][0] // the date
                   ]);
}



function myFunction_ROE_ROA() {
    Highcharts.chart('container', {
                     
                     
                     title: {
                     text: '<?php echo $result_name[0]?>ROE/ROA'
                     },
                     
                     subtitle: {
                     text: ''
                     },
                     
                     xAxis : {
                     categories: ['104 Q3', '104 Q4', '105 Q1', '105 Q2', '105 Q3', '105 Q4','106 Q1', '106 Q2'],
                     crosshair: true
                     },
                     yAxis: [{ // Primary yAxis
                     labels: {
                     format: '{value}%',
                     style: {
                     color: Highcharts.getOptions().colors[1]
                     }
                     },
                     title: {
                     text: '',
                     style: {
                     color: Highcharts.getOptions().colors[1]
                     }
                     }
                     }, { // Secondary yAxis
                     title: {
                     text: '',
                     style: {
                     color: Highcharts.getOptions().colors[0]
                     }
                     },
                     labels: {
                     
                     format: '{value} mm',
                     style: {
                     color: Highcharts.getOptions().colors[0]
                     }
                     },
                     opposite: true
                     }],
                     legend: {
                     layout: 'vertical',
                     align: 'right',
                     verticalAlign: 'middle'
                     },
                     
                     
                     series: [{
                     name: 'ROE 股東權益報酬率',
                     data:ROE_array
                     },{
                     name: 'ROA 資產報酬率',
                     data:ROA_array
                     
                     }],
                     
                     responsive: {
                     rules: [{
                     condition: {
                     maxWidth: 500
                     },
                     chartOptions: {
                     legend: {
                     layout: 'horizontal',
                     align: 'center',
                     verticalAlign: 'bottom'
                     }
                     }
                     }]
                     }
                     
                     });
}
</script>

</div>



<!--=========================  圖表的位置   ============================= -->
<div id="container" style="max-height:400px;height: 60%; width: 100%; margin: 10px 0 10px 0; display: block;"></div>

</div>

<!-- 第一個新聞 -->
<div class="search-news">
<?php
    for($j=count($news_date_use)-1;$j>=0;$j-=1){
        
        ?><b><a href="<?php echo $news_url_use[$j]?>"><font size="5"><?php echo $news_title_use[$j]?></font></a></b><br>
<b><font size="2">相關股票:</font></b> <?php
    for ($i=0;$i<count($news_relate_use[$j]);$i+=1)
    {
        ?>
<form action="k_line.php" method="post" style="margin:0; display:inline-block;">
<button name="number" style="padding: 3px 15px;margin-left:3px" value="<?php echo $news_relate_use[$j][$i]?>"><?php echo $test_array[$j][$i]?></button>
</form><?php
    }
    ?>
<p style="margin-left:90%"><font size="4"><b><?php echo $news_date_use[$j]?></b></font></p>
<?php
    }
    ?>
    
</div>
</section>

<!--             全部的div結束             -->

<!-- Homepage Hero end -->
<footer>
<div class="row">
<div class="footer-logo">
<a href="#"><!-- <img src="images/footer-logo.png" alt="" /> --></a>
</div>
<p>
				<pre>2017第22屆全國大專校院資訊應用服務創新競賽 ——— &#60 Prophitfolio &#62</pre>
			<p class="copyright">&copy; 2017 Prophitfolio | IAP1-12, E.SUN FINTECH-02</p>
<div id="go-top">
<a class="smoothscroll" href="#hero" title="Back to Top"><i class="icon-up-open"></i></a>
</div>
</div><!-- Row End -->
</footer><!-- Footer End-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')
</script>
<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript">
</script>
<script src="js/jquery.flexslider.js">
</script>
<script src="js/waypoints.js">
</script>
<script src="js/jquery.fittext.js">
</script>
<script src="js/jquery.fitvids.js">
</script>
<script src="js/imagelightbox.js">
</script>
<script src="js/jquery.prettyPhoto.js">
</script>
<script src="js/main.js">
</script> <!--         以下是JavaScript                   -->
<!-- k線圖 -->

<script language="JavaScript">


var data = <?php echo $json_array_x?>;
$(document).ready(function() {
                  
                  
                  
                  
                  // split the data set into ohlc and volume
                  var ohlc = [],
                  volume = [],
                  dataLength = data.length,
                  // set the allowed units for data grouping
                  groupingUnits = [[
                  'week',                         // unit name
                  [1]                             // allowed multiples
                  ], [
                  'month',
                  [1, 2, 3, 4, 6]
                  ]],
                  
                  i = 0;
                  
                  
                  
                  for (i; i < dataLength; i += 1) {
                  ohlc.push([
                            data[i][0], // the date
                            data[i][1], // open
                            data[i][2], // high
                            data[i][3], // low
                            data[i][4] // close
                            ]);
                  
                  volume.push([
                              data[i][0], // the date
                              data[i][5] // the volume
                              ]);
                  }
                  
                  
                  
                  
                  // create the chart
                  //圖的ID
                  Highcharts.stockChart('container', {
                                        
                                        
                                        
                                        rangeSelector: {
                                        selected: 1
                                        },
                                        
                                        title: {
                                        text: '<?php echo $result_name[0]?>K線圖'
                                        },
                                        
                                        
                                        yAxis: [{
                                        labels: {
                                        align: 'right',
                                        x: -3
                                        },
                                        title: {
                                        text: 'OHLC'
                                        },
                                        height: '60%',
                                        lineWidth: 2
                                        }, {
                                        labels: {
                                        align: 'right',
                                        x: -3
                                        },
                                        title: {
                                        text: 'Volume'
                                        },
                                        top: '65%',
                                        height: '35%',
                                        offset: 0,
                                        lineWidth: 2
                                        }],
                                        
                                        tooltip: {
                                        split: true
                                        },
                                        
                                        series: [{
                                        type: 'candlestick',
                                        name: 'AAPL',
                                        data: ohlc,
                                        dataGrouping: {
                                        units: groupingUnits
                                        }
                                        }, {
                                        type: 'column',
                                        name: 'Volume',
                                        data: volume,
                                        yAxis: 1,
                                        dataGrouping: {
                                        units: groupingUnits
                                        }
                                        }]
                                        });
                  });

</script>
</body>
</html>
