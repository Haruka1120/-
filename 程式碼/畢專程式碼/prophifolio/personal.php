<?php
session_start();
    if($_SESSION['account_number'] != null){ }
else{
  echo '您無權限觀看此頁面!';
  echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
}

mysql_connect("localhost","work","w0rk@ncyu");//連結伺服器
mysql_select_db("Prophifolio");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
?>

<!DOCTYPE html>
<html class="no-js" lang="zh-TW">
<head>
   <!--- Basic Page Needs ================================================== -->
	<meta charset="utf-8">
	<title>Prophitfolio - 以深度學習預言可獲利之最適投資組合</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- Mobile Specific Metas ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS ================================================== -->
	<link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/layout.css">
	<link rel="stylesheet" href="css/media-queries.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
  <link rel="stylesheet" href="css/all.css" type="text/css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/table_style.css">
  <!-- Script ================================================== -->
  <script src="js/modernizr.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script type="text/javascript">
  (function(f,b){if(!b.__SV){var a,e,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.union people.track_charge people.clear_charges people.delete_user".split(" ");
	for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=f.createElement("script");a.type="text/javascript";a.async=!0;a.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?MIXPANEL_CUSTOM_LIB_URL:"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";e=f.getElementsByTagName("script")[0];e.parentNode.insertBefore(a,e)}})(document,window.mixpanel||[]);
	mixpanel.init("2fc60276bfe20ef798d15c46e498d765", {
		loaded: function() {
			//set expires as one day
			var days = 1;
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = date.toGMTString();

			document.cookie = "mp_distinct_id=" + mixpanel.get_distinct_id() + "; expires=" + expires + "; path=/";
		}
	});
	</script>
	<script type="text/javascript">
	function rtcScript() {
		document.oncontextmenu = null;
		document.onselectstart = null;
		document.onmousedown = null;
		document.onclick = null;
		document.oncopy = null;
		document.oncut = null;
		var elements = document.getElementsByTagName('*');
		for (var i = 0; i < elements.length; i++) {
			elements[i].oncontextmenu = null;
			elements[i].onselectstart = null;
			elements[i].onmousedown = null;
			elements[i].oncopy = null;
			elements[i].oncut = null;
		}
		function preventShareThis() {
			document.getSelection = window.getSelection = function() {
				return {isCollapsed: true};
			}
		}
		var scripts = document.getElementsByTagName('script');
		for (var i = 0; i < scripts.length; i++) {
			if (scripts[i].src.indexOf('w.sharethis.com') > -1) {
				preventShareThis();
			}
		}
		if (typeof Tynt != 'undefined') {
			Tynt = null;
		}
	}
	rtcScript();
	setInterval(rtcScript, 2000);
	</script>
   <!-- Favicons ================================================== -->
	<link rel="shortcut icon" href="favicon.png" >

</head>

<body onload="GetPChomeCookie();">



   <div id="preloader">      
      <div id="status">
         <img src="images/preloader.gif" height="64" width="64" alt="">
      </div>
   </div>

   <!-- Header ================================================== -->
   <header>
      <div class="logo">
         <a href="index.html"><img alt="" src="images/logo.png"></a>
      </div>
      <nav id="nav-wrap">         
         
         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
	      <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>         

         <ul id="nav" class="nav">
			<li><s style="background-color: #DDDDDD; display: inline-block; padding: 0; font-size: 18px; line-height: 38px; text-decoration: none; text-align: left"><a href="search.html">個人頁面</a></s></li>
         </ul> 

      </nav> 

   </header> 


   <!-- Stock Store and feedback ================================================== -->
   
    <section id='features'>

      <div class="table_wrapper">
      <h1>股票收藏</h1>
        <div class="table_table">
    
          <div class="table_row header">
            <div class="table_cell"> 股票名稱 </div>
            <div class="table_cell"> 股價 </div>
            <div class="table_cell"> 漲跌 </div>
            <div class="table_cell"> 本益比 </div>
            <div class="table_cell"> 勾選 </div>
          </div>
    

<?php

$data=mysql_query("SELECT `company_code` FROM `stock_group_track` WHERE `mem_code` = '" . $_SESSION['account_number'] . "'");
$result_code = "";
$json_result = mysql_fetch_row($data);
$result_code = $json_result[0];          //接回sql傳回的值，欄位為company_code，型態為string，內容預計為 code,code,code
$code_array = explode(",",$result_code); //分解回傳值，split by " , "，型態為array

for ($i = 0 ; $i < count($code_array) ; $i++){
  $get_codeCHT    = mysql_query("SELECT `company_name` FROM `stock_code` WHERE `code` = '" . $code_array[$i] . "'");
  $result_CHT     = $code_array[$i] . " " . mysql_fetch_row($get_codeCHT)[0];
    echo '<div class="table_row">';
    echo '<div class="table_cell">' . $result_CHT . '</div>';
  $get_datailData = mysql_query("SELECT `close_price` FROM stock_data WHERE NO_STOCK = '" . $code_array[$i] . "' AND date > " . date("Y-m-d") . " ORDER BY date DESC LIMIT 1");
  $result_closeP  = mysql_fetch_row($get_datailData)[0];
    echo '<div class="table_cell">' . $result_closeP . '</div>';
  $get_datailData = mysql_query("SELECT `price_minus` FROM stock_data WHERE NO_STOCK = '" . $code_array[$i] . "' AND date > " . date("Y-m-d") . " ORDER BY date DESC LIMIT 1");
  $result_priceMi = mysql_fetch_row($get_datailData)[0];
    echo '<div class="table_cell">' . $result_priceMi . '</div>';
  $get_datailData = mysql_query("SELECT `PEratio` FROM stock_data WHERE NO_STOCK = '" . $code_array[$i] . "' AND date > " . date("Y-m-d") . " ORDER BY date DESC LIMIT 1");
  $result_PEratio = mysql_fetch_row($get_datailData)[0];
    echo '<div class="table_cell">' . $result_PEratio . '</div>';

    echo '<div class="table_cell">';
    echo '<input type="checkbox" onclick="getArray(this)" id="creat" value="' . $code_array[$i] . '">';
    echo '</div>';
    echo '</div>';
} 
echo '<div class="table_row">';
echo '<div class="table_cell"></div>';
echo '<div class="table_cell"></div>';
echo '<div class="table_cell"></div>';
echo '<div class="table_cell"></div>';
echo '<div class="table_cell"> <button type="button" onclick="transData("' . $_SESSION['account_number'] . '")">建立投資組合</button> </div>';
?>  
<script>
  var code_array = [];

  function getArray(button){
    var value = button.value;
    if (button.checked == true){
      code_array.push(value);
    } else if (button.checked == false) {
      code_array.remove(value);
    }
  }

  function transData(acNo){
    var strCode = "";
    for(var i = 0 ; i<code_array.length ; i++){
      strCode = strCode + code_array[i];
      if(i < code_array.length){
        strCode = strCode + ",";
      }
    }
    var query = 'INSERT INTO `memInvest_group`(`account_name`, `code`) VALUES ("' + acNo + '","' + strCode + '")';

    $.ajax({
				url 	   : "http://ligandpath.mis.ncyu.edu.tw:8888/DBB_prophitfolio.php",
				data 	   : { query_string : query },
				type 	   : "POST",
				cache 	 : true,
				success  : function(result){
          console.log(result);
          alert("已加入投資組合，請稍待片刻，馬上計算完畢");
        }
			});
  }
</script>
      </div>
    </div>


   <!-- Java Script ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

   <script src="js/jquery.flexslider.js"></script>
   <script src="js/waypoints.js"></script>
   <script src="js/jquery.fittext.js"></script>
   <script src="js/jquery.fitvids.js"></script>
   <script src="js/imagelightbox.js"></script>
   <script src="js/jquery.prettyPhoto.js"></script>   
   <script src="js/main.js"></script>
   <script src="js/all.js"></script> <!--Include hiding stock, showing the condition, sidebar button-->
   <script src="js/jquery.cookie.js"></script>


</body>

</html>
