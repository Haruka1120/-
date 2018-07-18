<?php
session_start();
if($_SESSION['account_number'] != null)
{
}
else
{
echo '您無權限觀看此頁面!';
echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
}

$conn = mysql_connect("127.0.0.1","work","w0rk@ncyu");//連接伺服器

 mysql_select_db("Prophifolio");//選擇資料庫
 mysql_query("set names utf8");//讓資料可以讀取中文
 
?>

<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="zh-TW"> <!--<![endif]-->
<head>
   <!--- Basic Page Needs
   ================================================== -->
	<meta charset="utf-8">
	<title>Prophitfolio - 以深度學習預言可獲利之最適投資組合</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- Mobile Specific Metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
    ================================================== -->
	<link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/layout.css">
	<link rel="stylesheet" href="css/media-queries.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" href="css/search.css" type="text/css">
	<!-- Java Script
   ================================================== -->
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
   <script type="text/javascript" src="js/search.js"></script> <!--Include hiding stock, showing the condition, sidebar button-->
   <script type="text/javascript" src="js/jquery.cookie.js"></script>
   
   <!-- Script
   ================================================== -->
	<script src="js/modernizr.js"></script>
<noscript>
  &lt;meta http-equiv="refresh" content="0;url=/oops/"&gt;
</noscript>

   <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.png" >

</head>

<body>

   <div id="preloader">      
      <div id="status">
         <img src="images/preloader.gif" height="64" width="64" alt="">
      </div>
   </div>

   <!-- Header
   ================================================== -->
   <header>
      <div class="logo">
         <a href="index.php" style="margin:0; width: 120px; height: 32px;"><img alt="" src="images/logo.png"></a>
      </div>
      <nav id="nav-wrap">         
         
         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
	      <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>         

         <ul id="nav" class="nav">
			<li><s style="background-color: #DDDDDD; display: inline-block; padding: 0; font-size: 18px; line-height: 38px; text-decoration: none; text-align: left"><a href="k_line.php">一般搜尋</a></s></li>
			
			<li><s style="background-color: #DDDDDD; display: inline-block; padding: 0; font-size: 18px; line-height: 38px; text-decoration: none; text-align: left"><a href="search.php">進階搜尋</a></s></li>
			
			<li><s style="background-color: #DDDDDD; display: inline-block; padding: 0; font-size: 18px; line-height: 38px; text-decoration: none; text-align: left"><a href="profile.php">個人頁面</a></s></li>
         </ul>
		 <!-- end #nav -->
		 
      </nav> <!-- end #nav-wrap -->

   </header> <!-- Header End -->

   
   <!-- Homepage Hero
   ================================================== -->
   <section id="hero">
   	   <div class="row">
		   <div class="twelve columns">
			   <div class="hero-text">
			<h1 class="responsive-headline" style="font-weight:300; margin-bottom: 30px">股票搜尋</h1>
			<div style="clear:both"></div>
		</div>
		<div style="clear:both"></div>
	</div>

            <!--<div class="buttons">
               <a class="button trial" href="#">Free Trial</a>
               <a class="button learn-more smoothscroll" href="#features">Learn More</a>
            </div>-->

            <!--<div class="hero-image">
               <img src="images/hero-image.png" alt="" />
            </div>-->

		   </div>

	   </div>

   </section> <!-- Homepage Hero end -->


   <!-- Features Section
   ================================================== -->
   
   <section id='features'>
	<center>
<div id="w995">
  <!--下欄 開始-->
  <div id="cont">
    <!--左欄 開始-->
    <div id="cont-area">
      <div class="l685">

<div class="lb665">

<!--快速選股 開始-->
<div class="selectbig">
  <div class="selectblk">
    <div id="qrankform">
      <div class="style_tt0725">待選條件清單</div>
            <div class="selectm">
                <div class="dpn">基本面</div>                        
                <div id="1" class="select_n">
          <input name="area_item1[]" type="checkbox" data-key="_21" id="_21" value="2_1">
          近1季每股盈餘(EPS) <select name="item2[]" id="item2" class="item2_21" disabled="disabled"><option value="1">大於</option><option value="2">虧損大於</option></select> <select name="item3[]" id="item3" class="item3_21" disabled="disabled"><option value="0">0</option><option value="1" selected="">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="10">10</option></select> 元
        </div>
                <div id="5" class="select_n">
          <input name="area_item1[]" type="checkbox" data-key="_25" id="_25" value="2_2">
          本益比(P/E) <select name="item2[]" id="item2" class="item2_25" disabled="disabled"><option value="1">小於</option><option value="2">大於</option></select> <select name="item3[]" id="item3" class="item3_25" disabled="disabled"><option value="10">10</option><option value="15" selected="">15</option><option value="20">20</option><option value="30">30</option><option value="40">40</option></select> 倍
        </div>
                <div id="11" class="select_n">
          <input name="area_item1[]" type="checkbox" data-key="_211" id="_211" value="2_4">
          股價淨值比(P/B) <select name="item2[]" id="item2" class="item2_211" disabled="disabled"><option value="1">小於</option><option value="2">大於</option></select> <select name="item3[]" id="item3" class="item3_211" disabled="disabled"><option value="0">0</option><option value="1" selected="">1</option><option value="2">2</option><option value="3">3</option><option value="5">5</option></select> 倍
        </div>
                <div id="6" class="select_n">
          <input name="area_item1[]" type="checkbox" data-key="_26" id="_26" value="2_6">
          開盤價 <select name="item2[]" id="item2" class="item2_26" disabled="disabled"><option value="2">大於</option><option value="1">小於</option></select> <select name="item3[]" id="item3" class="item3_26" disabled="disabled"><option value="0">0</option><option value="10" selected="">10</option><option value="20">20</option><option value="50">50</option><option value="100">100</option></select> 元
        </div>
                <div id="7" class="select_n">
          <input name="area_item1[]" type="checkbox" data-key="_27" id="_27" value="2_7">
          收盤價 <select name="item2[]" id="item2" class="item2_27" disabled="disabled"><option value="2">大於</option><option value="1">小於</option></select> <select name="item3[]" id="item3" class="item3_27" disabled="disabled"><option value="0">0</option><option value="10" selected="">10</option><option value="20">20</option><option value="50">50</option><option value="100">100</option></select> 元
        </div>
              </div>
		<div class="selectm_dpn">
                        <div class="dpn">財務面</div>                
                <div id="1" class="select_n">
          <input name="area_item1[]" type="checkbox" data-key="_31" id="_31" value="3_1"/>
          近1季毛利率 <select name="item2[]" id="item2" class="item2_31" disabled="disabled"><option value="1">大於</option><option value="2">小於</option></select> <select name="item3[]" id="item3" class="item3_31" disabled="disabled"><option value="0">0</option><option value="5" selected>5</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="40">40</option><option value="50">50</option></select> %
        </div>
                <div id="4" class="select_n">
          <input name="area_item1[]" type="checkbox" data-key="_34" id="_34" value="3_2"/>
          近1季營益率 <select name="item2[]" id="item2" class="item2_34" disabled="disabled"><option value="1">大於</option><option value="2">小於</option></select> <select name="item3[]" id="item3" class="item3_34" disabled="disabled"><option value="0">0</option><option value="5" selected>5</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="40">40</option><option value="50">50</option></select> %
        </div>
                <div id="7" class="select_n">
          <input name="area_item1[]" type="checkbox" data-key="_37" id="_37" value="3_3"/>
          近1季股東權益報酬率(ROE) <select name="item2[]" id="item2" class="item2_37" disabled="disabled"><option value="1">大於</option><option value="2">小於</option></select> <select name="item3[]" id="item3" class="item3_37" disabled="disabled"><option value="10">10</option><option value="12" selected>12</option><option value="15">15</option><option value="20">20</option><option value="30">30</option></select> %
        </div>
                <div id="11" class="select_n">
          <input name="area_item1[]" type="checkbox" data-key="_311" id="_311" value="3_4"/>
          近1季資產報酬率(ROA) <select name="item2[]" id="item2" class="item2_311" disabled="disabled"><option value="1">大於</option><option value="2">小於</option></select> <select name="item3[]" id="item3" class="item3_311" disabled="disabled"><option value="10">10</option><option value="12" selected>12</option><option value="15">15</option><option value="20">20</option><option value="30">30</option></select> %
        </div>
                <div id="15" class="select_n">
          <input name="area_item1[]" type="checkbox" data-key="_315" id="_315" value="3_5"/>
          近1季負債比率 <select name="item2[]" id="item2" class="item2_315" disabled="disabled"><option value="1">小於</option><option value="2">大於</option></select> <select name="item3[]" id="item3" class="item3_315" disabled="disabled"><option value="20">20</option><option value="30" selected>30</option><option value="40">40</option><option value="50">50</option><option value="60">60</option></select> %
        </div>
              </div>


      <!--選股設定選單 開始-->
      <div class="menu0725">
        <span class="menubg0725" style="cursor:pointer">基本面</span>
		<span class="menubg0725_no" style="cursor:pointer">財務面</span>
      </div>
      <!--選股設定選單 結束-->
    </div>
  </div>

  <div style="clear:both"></div>
  <div class="style_tt0725">選股條件</div>
  <div class="result0725"><ul class="ul1" id="ul1"></ul></div>
  <div class="result_table">
<div class="div_to_remove">
<div class="style_tt0725">篩選結果 494 檔股票符合</div>
<div class="pages"><b>1</b>&nbsp;.&nbsp;<a data-js="2_1911">2</a>&nbsp;.&nbsp;<a data-js="3_1911">3</a><a data-js="2_1911">下一頁<span>&gt;</span></a><a data-js="17_1911">最後一頁<span>&gt;</span></a><br>第 1 頁，共 494 筆 (第 1 - 30 筆資料)</div></div></div>
</div>
<!--快速選股 結束-->

<script type="text/javascript">
var sid = 0;
var countx = 3;
//利用傳入的 qrank_ary 來比對所選的項目
var ary_json = {"1":{"1":{"title":"\u8fd11\u65e5\u80a1\u50f9\u5275 <!--item3--> \u65e5\u4f86 <!--item2-->","item1":1,"item2":{"1":"\u65b0\u9ad8","2":"\u65b0\u4f4e"},"item3":[2,5,10,20,60],"htmlcode":"\u8fd11\u65e5\u80a1\u50f9\u5275 <select name=\"item3[]\" id=\"item3\" class=\"item3_11\" disabled=\"disabled\"><option value=\"2\">2<\/option><option value=\"5\" selected>5<\/option><option value=\"10\">10<\/option><option value=\"20\">20<\/option><option value=\"60\">60<\/option><\/select> \u65e5\u4f86 <select name=\"item2[]\" id=\"item2\" class=\"item2_11\" disabled=\"disabled\"><option value=\"1\">\u65b0\u9ad8<\/option><option value=\"2\">\u65b0\u4f4e<\/option><\/select>"},"3":{"title":"\u8fd1 <!--item3--> \u65e5\u80a1\u50f9 <!--item2--> \u524d30\u540d","item1":2,"item2":{"1":"\u6f32\u5e45","2":"\u8dcc\u5e45"},"item3":[1,2,3,5,10,20],"htmlcode":"\u8fd1 <select name=\"item3[]\" id=\"item3\" class=\"item3_13\" disabled=\"disabled\"><option value=\"1\">1<\/option><option value=\"2\" selected>2<\/option><option value=\"3\">3<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><option value=\"20\">20<\/option><\/select> \u65e5\u80a1\u50f9 <select name=\"item2[]\" id=\"item2\" class=\"item2_13\" disabled=\"disabled\"><option value=\"1\">\u6f32\u5e45<\/option><option value=\"2\">\u8dcc\u5e45<\/option><\/select> \u524d30\u540d"},"4":{"title":"\u8fd11\u65e5\u6210\u4ea4\u91cf <!--item2--> 5\u65e5\u5747\u91cf\u7684 <!--item3--> %","item1":3,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[5,10,20,30,40,50],"htmlcode":"\u8fd11\u65e5\u6210\u4ea4\u91cf <select name=\"item2[]\" id=\"item2\" class=\"item2_14\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> 5\u65e5\u5747\u91cf\u7684 <select name=\"item3[]\" id=\"item3\" class=\"item3_14\" disabled=\"disabled\"><option value=\"5\">5<\/option><option value=\"10\" selected>10<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><option value=\"40\">40<\/option><option value=\"50\">50<\/option><\/select> %"}},"2":{"1":{"title":"\u8fd11\u5b63\u6bcf\u80a1\u76c8\u9918(EPS) <!--item2--> <!--item3--> \u5143","item1":1,"item2":{"1":"\u5927\u65bc","2":"\u8667\u640d\u5927\u65bc"},"item3":[0,1,2,3,4,5,10],"htmlcode":"\u8fd11\u5b63\u6bcf\u80a1\u76c8\u9918(EPS) <select name=\"item2[]\" id=\"item2\" class=\"item2_21\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u8667\u640d\u5927\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_21\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"1\" selected>1<\/option><option value=\"2\">2<\/option><option value=\"3\">3<\/option><option value=\"4\">4<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><\/select> \u5143"},"2":{"title":"\u8fd14\u5b63\u6bcf\u80a1\u76c8\u9918(EPS)\u5408\u8a08 <!--item2--> <!--item3--> \u5143","item1":1,"item2":{"3":"\u5927\u65bc","4":"\u8667\u640d\u5927\u65bc"},"item3":[0,1,2,3,4,5,10],"htmlcode":"\u8fd14\u5b63\u6bcf\u80a1\u76c8\u9918(EPS)\u5408\u8a08 <select name=\"item2[]\" id=\"item2\" class=\"item2_22\" disabled=\"disabled\"><option value=\"3\">\u5927\u65bc<\/option><option value=\"4\">\u8667\u640d\u5927\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_22\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"1\" selected>1<\/option><option value=\"2\">2<\/option><option value=\"3\">3<\/option><option value=\"4\">4<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><\/select> \u5143"},"3":{"title":"\u4eca\u5e74\u7d2f\u8a08\u6bcf\u80a1\u76c8\u9918(EPS) <!--item2--> <!--item3--> \u5143","item1":1,"item2":{"5":"\u5927\u65bc","6":"\u8667\u640d\u5927\u65bc"},"item3":[0,1,2,3,4,5,10],"htmlcode":"\u4eca\u5e74\u7d2f\u8a08\u6bcf\u80a1\u76c8\u9918(EPS) <select name=\"item2[]\" id=\"item2\" class=\"item2_23\" disabled=\"disabled\"><option value=\"5\">\u5927\u65bc<\/option><option value=\"6\">\u8667\u640d\u5927\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_23\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"1\" selected>1<\/option><option value=\"2\">2<\/option><option value=\"3\">3<\/option><option value=\"4\">4<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><\/select> \u5143"},"14":{"title":"<!--item4-->\u5e74\u5e73\u5747\u6bcf\u80a1\u76c8\u9918(EPS)<!--item2--> <!--item3--> \u5143","item1":7,"item2":{"1":"\u5927\u65bc","2":"\u8667\u640d\u5927\u65bc"},"item3":[0,1,2,3,4,5,10],"item4":[3,5,10],"htmlcode":"<select name=\"item4[]\" id=\"item4\" class=\"item4_214\" disabled=\"disabled\"><option value=\"3\">3<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><\/select>\u5e74\u5e73\u5747\u6bcf\u80a1\u76c8\u9918(EPS)<select name=\"item2[]\" id=\"item2\" class=\"item2_214\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u8667\u640d\u5927\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_214\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"1\" selected>1<\/option><option value=\"2\">2<\/option><option value=\"3\">3<\/option><option value=\"4\">4<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><\/select> \u5143"},"5":{"title":"\u672c\u76ca\u6bd4(P\/E) <!--item2--> <!--item3--> \u500d","item1":2,"item2":{"1":"\u5c0f\u65bc","2":"\u5927\u65bc"},"item3":[10,15,20,30,40],"htmlcode":"\u672c\u76ca\u6bd4(P\/E) <select name=\"item2[]\" id=\"item2\" class=\"item2_25\" disabled=\"disabled\"><option value=\"1\">\u5c0f\u65bc<\/option><option value=\"2\">\u5927\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_25\" disabled=\"disabled\"><option value=\"10\">10<\/option><option value=\"15\" selected>15<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><option value=\"40\">40<\/option><\/select> \u500d"},"15":{"title":"<!--item4-->\u5e74\u5e73\u5747\u672c\u76ca\u6bd4(P\/E) <!--item2--> <!--item3--> \u500d","item1":8,"item2":{"1":"\u5c0f\u65bc","2":"\u5927\u65bc"},"item3":[10,15,20,30,40],"item4":[3,5,8],"htmlcode":"<select name=\"item4[]\" id=\"item4\" class=\"item4_215\" disabled=\"disabled\"><option value=\"3\">3<\/option><option value=\"5\">5<\/option><option value=\"8\">8<\/option><\/select>\u5e74\u5e73\u5747\u672c\u76ca\u6bd4(P\/E) <select name=\"item2[]\" id=\"item2\" class=\"item2_215\" disabled=\"disabled\"><option value=\"1\">\u5c0f\u65bc<\/option><option value=\"2\">\u5927\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_215\" disabled=\"disabled\"><option value=\"10\">10<\/option><option value=\"15\" selected>15<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><option value=\"40\">40<\/option><\/select> \u500d"},"6":{"title":"\u958B\u76E4\u50F9 <!--item2--> <!--item3--> \u5143","item1":3,"item2":{"1":"\u5C0F\u65BC","2":"\u5927\u65BC"},"item3":[0,10,20,50,100],"htmlcode":"\u958B\u76E4\u50F9 <select name=\"item3[]\" id=\"item3\" class=\"item3_26\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"10\" selected>10<\/option><option value=\"20\">20<\/option><option value=\"50\">50<\/option><option value=\"100\">100<\/option><\/select> \u5143 <select name=\"item2[]\" id=\"item2\" class=\"item2_26\" disabled=\"disabled\"><option value=\"1\">\u65b0\u9ad8<\/option><option value=\"2\">\u65b0\u4f4e<\/option><\/select>"},"7":{"title":"\u6536\u76E4\u50F9 <!--item2--> <!--item3--> \u5143","item1":3,"item2":{"1":"\u5C0F\u65BC","2":"\u5927\u65BC"},"item3":[0,10,20,50,100],"htmlcode":"\u6536\u76E4\u50F9 <select name=\"item2[]\" id=\"item2\" class=\"item2_27\" disabled=\"disabled\"><option value=\"3\">\u6210\u9577<\/option><option value=\"4\">\u8870\u9000<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_27\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"10\" selected>10<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><option value=\"40\">40<\/option><option value=\"50\">50<\/option><option value=\"100\">100<\/option><\/select> %\u4ee5\u4e0a"},"8":{"title":"\u8fd11\u6708\u71df\u6536\u8f03\u53bb\u5e74\u540c\u671f <!--item2--> <!--item3--> %\u4ee5\u4e0a","item1":3,"item2":{"5":"\u6210\u9577","6":"\u8870\u9000"},"item3":[0,10,20,30,40,50,100],"htmlcode":"\u8fd11\u6708\u71df\u6536\u8f03\u53bb\u5e74\u540c\u671f <select name=\"item2[]\" id=\"item2\" class=\"item2_28\" disabled=\"disabled\"><option value=\"5\">\u6210\u9577<\/option><option value=\"6\">\u8870\u9000<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_28\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"10\" selected>10<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><option value=\"40\">40<\/option><option value=\"50\">50<\/option><option value=\"100\">100<\/option><\/select> %\u4ee5\u4e0a"},"9":{"title":"\u4eca\u5e74\u7d2f\u8a08\u71df\u6536\u8f03\u53bb\u5e74\u540c\u671f <!--item2--> <!--item3--> %\u4ee5\u4e0a","item1":3,"item2":{"7":"\u6210\u9577","8":"\u8870\u9000"},"item3":[0,10,20,30,40,50,100],"htmlcode":"\u4eca\u5e74\u7d2f\u8a08\u71df\u6536\u8f03\u53bb\u5e74\u540c\u671f <select name=\"item2[]\" id=\"item2\" class=\"item2_29\" disabled=\"disabled\"><option value=\"7\">\u6210\u9577<\/option><option value=\"8\">\u8870\u9000<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_29\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"10\" selected>10<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><option value=\"40\">40<\/option><option value=\"50\">50<\/option><option value=\"100\">100<\/option><\/select> %\u4ee5\u4e0a"},"16":{"title":"<!--item4-->\u5e74\u5e73\u5747\u71df\u6536 <!--item2--> <!--item3--> \u5104","item1":9,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[50,100,500,1000,3000,5000],"item4":[3,5,10],"htmlcode":"<select name=\"item4[]\" id=\"item4\" class=\"item4_216\" disabled=\"disabled\"><option value=\"3\">3<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><\/select>\u5e74\u5e73\u5747\u71df\u6536 <select name=\"item2[]\" id=\"item2\" class=\"item2_216\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_216\" disabled=\"disabled\"><option value=\"50\">50<\/option><option value=\"100\" selected>100<\/option><option value=\"500\">500<\/option><option value=\"1000\">1000<\/option><option value=\"3000\">3000<\/option><option value=\"5000\">5000<\/option><\/select> \u5104"},"17":{"title":"<!--item4-->\u5e74\u5e73\u5747\u7a05\u5f8c\u6de8\u5229 <!--item2--> <!--item3--> \u5104","item1":10,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[5,10,30,50,100,200,500],"item4":[3,5,10],"htmlcode":"<select name=\"item4[]\" id=\"item4\" class=\"item4_217\" disabled=\"disabled\"><option value=\"3\">3<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><\/select>\u5e74\u5e73\u5747\u7a05\u5f8c\u6de8\u5229 <select name=\"item2[]\" id=\"item2\" class=\"item2_217\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_217\" disabled=\"disabled\"><option value=\"5\">5<\/option><option value=\"10\" selected>10<\/option><option value=\"30\">30<\/option><option value=\"50\">50<\/option><option value=\"100\">100<\/option><option value=\"200\">200<\/option><option value=\"500\">500<\/option><\/select> \u5104"},"10":{"title":"\u6bcf\u80a1\u6de8\u503c <!--item2--> <!--item3--> \u5143","item1":4,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[5,10,15,20,30,50,100],"htmlcode":"\u6bcf\u80a1\u6de8\u503c <select name=\"item2[]\" id=\"item2\" class=\"item2_210\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_210\" disabled=\"disabled\"><option value=\"5\">5<\/option><option value=\"10\" selected>10<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><option value=\"50\">50<\/option><option value=\"100\">100<\/option><\/select> \u5143"},"11":{"title":"\u80a1\u50f9\u6de8\u503c\u6bd4(P\/B) <!--item2--> <!--item3--> \u500d","item1":4,"item2":{"3":"\u5c0f\u65bc","4":"\u5927\u65bc"},"item3":[0,1,2,3,5],"htmlcode":"\u80a1\u50f9\u6de8\u503c\u6bd4(P\/B) <select name=\"item2[]\" id=\"item2\" class=\"item2_211\" disabled=\"disabled\"><option value=\"3\">\u5c0f\u65bc<\/option><option value=\"4\">\u5927\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_211\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"1\" selected>1<\/option><option value=\"2\">2<\/option><option value=\"3\">3<\/option><option value=\"5\">5<\/option><\/select> \u500d"},"18":{"title":"<!--item4-->\u5e74\u5e73\u5747\u80a1\u50f9\u6de8\u503c\u6bd4(P\/B) <!--item2--> <!--item3--> \u500d","item1":11,"item2":{"1":"\u5c0f\u65bc","2":"\u5927\u65bc"},"item3":[0,1,2,3,5],"item4":[3,5,10],"htmlcode":"<select name=\"item4[]\" id=\"item4\" class=\"item4_218\" disabled=\"disabled\"><option value=\"3\">3<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><\/select>\u5e74\u5e73\u5747\u80a1\u50f9\u6de8\u503c\u6bd4(P\/B) <select name=\"item2[]\" id=\"item2\" class=\"item2_218\" disabled=\"disabled\"><option value=\"1\">\u5c0f\u65bc<\/option><option value=\"2\">\u5927\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_218\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"1\" selected>1<\/option><option value=\"2\">2<\/option><option value=\"3\">3<\/option><option value=\"5\">5<\/option><\/select> \u500d"},"12":{"title":"\u7e3d\u5e02\u503c <!--item2--> <!--item3--> \u5104","item1":5,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[10,30,50,100,200,300],"htmlcode":"\u7e3d\u5e02\u503c <select name=\"item2[]\" id=\"item2\" class=\"item2_212\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_212\" disabled=\"disabled\"><option value=\"10\">10<\/option><option value=\"30\" selected>30<\/option><option value=\"50\">50<\/option><option value=\"100\">100<\/option><option value=\"200\">200<\/option><option value=\"300\">300<\/option><\/select> \u5104"},"13":{"title":"\u80a1\u672c <!--item2--> <!--item3--> \u5104","item1":6,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[10,20,30,50,100,200,300],"htmlcode":"\u80a1\u672c <select name=\"item2[]\" id=\"item2\" class=\"item2_213\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_213\" disabled=\"disabled\"><option value=\"10\">10<\/option><option value=\"20\" selected>20<\/option><option value=\"30\">30<\/option><option value=\"50\">50<\/option><option value=\"100\">100<\/option><option value=\"200\">200<\/option><option value=\"300\">300<\/option><\/select> \u5104"},"19":{"title":"<!--item4-->\u5e74\u5e73\u5747\u73fe\u91d1\u80a1\u5229 <!--item2--> <!--item3--> \u5143","item1":12,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[5,10,15,20,25,30],"item4":[3,5,10],"htmlcode":"<select name=\"item4[]\" id=\"item4\" class=\"item4_219\" disabled=\"disabled\"><option value=\"3\">3<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><\/select>\u5e74\u5e73\u5747\u73fe\u91d1\u80a1\u5229 <select name=\"item2[]\" id=\"item2\" class=\"item2_219\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_219\" disabled=\"disabled\"><option value=\"5\">5<\/option><option value=\"10\" selected>10<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"25\">25<\/option><option value=\"30\">30<\/option><\/select> \u5143"},"20":{"title":"<!--item4-->\u5e74\u5e73\u5747\u80a1\u7968\u80a1\u5229 <!--item2--> <!--item3--> \u5143","item1":13,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[5,10,15,20,25,30],"item4":[3,5,10],"htmlcode":"<select name=\"item4[]\" id=\"item4\" class=\"item4_220\" disabled=\"disabled\"><option value=\"3\">3<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><\/select>\u5e74\u5e73\u5747\u80a1\u7968\u80a1\u5229 <select name=\"item2[]\" id=\"item2\" class=\"item2_220\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_220\" disabled=\"disabled\"><option value=\"5\">5<\/option><option value=\"10\" selected>10<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"25\">25<\/option><option value=\"30\">30<\/option><\/select> \u5143"},"21":{"title":"<!--item4-->\u5e74\u5e73\u5747\u73fe\u91d1\u6b96\u5229\u7387 <!--item2--> <!--item3--> %","item1":14,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[1,2,3,4,5,6,7,9,10,15],"item4":[3,5,10],"htmlcode":"<select name=\"item4[]\" id=\"item4\" class=\"item4_221\" disabled=\"disabled\"><option value=\"3\">3<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><\/select>\u5e74\u5e73\u5747\u73fe\u91d1\u6b96\u5229\u7387 <select name=\"item2[]\" id=\"item2\" class=\"item2_221\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_221\" disabled=\"disabled\"><option value=\"1\">1<\/option><option value=\"2\" selected>2<\/option><option value=\"3\">3<\/option><option value=\"4\">4<\/option><option value=\"5\">5<\/option><option value=\"6\">6<\/option><option value=\"7\">7<\/option><option value=\"9\">9<\/option><option value=\"10\">10<\/option><option value=\"15\">15<\/option><\/select> %"},"22":{"title":"<!--item4-->\u5e74\u5e73\u5747\u80a1\u7968\u6b96\u5229\u7387 <!--item2--> <!--item3--> %","item1":15,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[1,2,3,4,5,6,7,9,10,15],"item4":[3,5,10],"htmlcode":"<select name=\"item4[]\" id=\"item4\" class=\"item4_222\" disabled=\"disabled\"><option value=\"3\">3<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><\/select>\u5e74\u5e73\u5747\u80a1\u7968\u6b96\u5229\u7387 <select name=\"item2[]\" id=\"item2\" class=\"item2_222\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_222\" disabled=\"disabled\"><option value=\"1\">1<\/option><option value=\"2\" selected>2<\/option><option value=\"3\">3<\/option><option value=\"4\">4<\/option><option value=\"5\">5<\/option><option value=\"6\">6<\/option><option value=\"7\">7<\/option><option value=\"9\">9<\/option><option value=\"10\">10<\/option><option value=\"15\">15<\/option><\/select> %"}},"3":{"1":{"title":"\u8fd11\u5b63\u6bdb\u5229\u7387 <!--item2--> <!--item3--> %","item1":1,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[0,5,10,15,20,25,30,40,50],"htmlcode":"\u8fd11\u5b63\u6bdb\u5229\u7387 <select name=\"item2[]\" id=\"item2\" class=\"item2_31\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_31\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"5\" selected>5<\/option><option value=\"10\">10<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"25\">25<\/option><option value=\"30\">30<\/option><option value=\"40\">40<\/option><option value=\"50\">50<\/option><\/select> %"},"2":{"title":"\u8fd11\u5b63\u6bdb\u5229\u7387\u8f03\u524d\u671f <!--item2--> <!--item3--> %\u4ee5\u4e0a","item1":1,"item2":{"3":"\u589e\u52a0","4":"\u6e1b\u5c11"},"item3":[0,5,10,15,20],"htmlcode":"\u8fd11\u5b63\u6bdb\u5229\u7387\u8f03\u524d\u671f <select name=\"item2[]\" id=\"item2\" class=\"item2_32\" disabled=\"disabled\"><option value=\"3\">\u589e\u52a0<\/option><option value=\"4\">\u6e1b\u5c11<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_32\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"5\" selected>5<\/option><option value=\"10\">10<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><\/select> %\u4ee5\u4e0a"},"3":{"title":"\u8fd11\u5b63\u6bdb\u5229\u7387\u8f03\u53bb\u5e74\u540c\u671f <!--item2--> <!--item3--> %\u4ee5\u4e0a","item1":1,"item2":{"5":"\u589e\u52a0","6":"\u6e1b\u5c11"},"item3":[0,5,10,15,20],"htmlcode":"\u8fd11\u5b63\u6bdb\u5229\u7387\u8f03\u53bb\u5e74\u540c\u671f <select name=\"item2[]\" id=\"item2\" class=\"item2_33\" disabled=\"disabled\"><option value=\"5\">\u589e\u52a0<\/option><option value=\"6\">\u6e1b\u5c11<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_33\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"5\" selected>5<\/option><option value=\"10\">10<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><\/select> %\u4ee5\u4e0a"},"17":{"title":"<!--item4-->\u5e74\u5e73\u5747\u6bdb\u5229\u7387 <!--item2--> <!--item3--> %","item1":6,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[0,5,10,15,20,25,30,40,50],"item4":[3,5,10],"htmlcode":"<select name=\"item4[]\" id=\"item4\" class=\"item4_317\" disabled=\"disabled\"><option value=\"3\">3<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><\/select>\u5e74\u5e73\u5747\u6bdb\u5229\u7387 <select name=\"item2[]\" id=\"item2\" class=\"item2_317\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_317\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"5\" selected>5<\/option><option value=\"10\">10<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"25\">25<\/option><option value=\"30\">30<\/option><option value=\"40\">40<\/option><option value=\"50\">50<\/option><\/select> %"},"4":{"title":"\u8fd11\u5b63\u71df\u76ca\u7387 <!--item2--> <!--item3--> %","item1":2,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[0,5,10,15,20,25,30,40,50],"htmlcode":"\u8fd11\u5b63\u71df\u76ca\u7387 <select name=\"item2[]\" id=\"item2\" class=\"item2_34\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_34\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"5\" selected>5<\/option><option value=\"10\">10<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"25\">25<\/option><option value=\"30\">30<\/option><option value=\"40\">40<\/option><option value=\"50\">50<\/option><\/select> %"},"5":{"title":"\u8fd11\u5b63\u71df\u76ca\u7387\u8f03\u524d\u671f <!--item2--> <!--item3--> %\u4ee5\u4e0a","item1":2,"item2":{"3":"\u589e\u52a0","4":"\u6e1b\u5c11"},"item3":[0,5,10,15,20],"htmlcode":"\u8fd11\u5b63\u71df\u76ca\u7387\u8f03\u524d\u671f <select name=\"item2[]\" id=\"item2\" class=\"item2_35\" disabled=\"disabled\"><option value=\"3\">\u589e\u52a0<\/option><option value=\"4\">\u6e1b\u5c11<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_35\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"5\" selected>5<\/option><option value=\"10\">10<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><\/select> %\u4ee5\u4e0a"},"6":{"title":"\u8fd11\u5b63\u71df\u76ca\u7387\u8f03\u53bb\u5e74\u540c\u671f <!--item2--> <!--item3--> %\u4ee5\u4e0a","item1":2,"item2":{"5":"\u589e\u52a0","6":"\u6e1b\u5c11"},"item3":[0,5,10,15,20],"htmlcode":"\u8fd11\u5b63\u71df\u76ca\u7387\u8f03\u53bb\u5e74\u540c\u671f <select name=\"item2[]\" id=\"item2\" class=\"item2_36\" disabled=\"disabled\"><option value=\"5\">\u589e\u52a0<\/option><option value=\"6\">\u6e1b\u5c11<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_36\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"5\" selected>5<\/option><option value=\"10\">10<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><\/select> %\u4ee5\u4e0a"},"18":{"title":"<!--item4-->\u5e74\u5e73\u5747\u6de8\u5229\u7387 <!--item2--> <!--item3--> %","item1":7,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[0,5,10,15,20,25,30,40,50],"item4":[3,5,10],"htmlcode":"<select name=\"item4[]\" id=\"item4\" class=\"item4_318\" disabled=\"disabled\"><option value=\"3\">3<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><\/select>\u5e74\u5e73\u5747\u6de8\u5229\u7387 <select name=\"item2[]\" id=\"item2\" class=\"item2_318\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_318\" disabled=\"disabled\"><option value=\"0\">0<\/option><option value=\"5\" selected>5<\/option><option value=\"10\">10<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"25\">25<\/option><option value=\"30\">30<\/option><option value=\"40\">40<\/option><option value=\"50\">50<\/option><\/select> %"},"7":{"title":"\u8fd11\u5b63\u80a1\u6771\u6b0a\u76ca\u5831\u916c\u7387(ROE) <!--item2--> <!--item3--> %","item1":3,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[10,12,15,20,30],"htmlcode":"\u8fd11\u5b63\u80a1\u6771\u6b0a\u76ca\u5831\u916c\u7387(ROE) <select name=\"item2[]\" id=\"item2\" class=\"item2_37\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_37\" disabled=\"disabled\"><option value=\"10\">10<\/option><option value=\"12\" selected>12<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><\/select> %"},"8":{"title":"\u4eca\u5e74\u4ee5\u4f86\u80a1\u6771\u6b0a\u76ca\u5831\u916c\u7387(ROE) <!--item2--> <!--item3--> %","item1":3,"item2":{"3":"\u5927\u65bc","4":"\u5c0f\u65bc"},"item3":[10,12,15,20,30],"htmlcode":"\u4eca\u5e74\u4ee5\u4f86\u80a1\u6771\u6b0a\u76ca\u5831\u916c\u7387(ROE) <select name=\"item2[]\" id=\"item2\" class=\"item2_38\" disabled=\"disabled\"><option value=\"3\">\u5927\u65bc<\/option><option value=\"4\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_38\" disabled=\"disabled\"><option value=\"10\">10<\/option><option value=\"12\" selected>12<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><\/select> %"},"9":{"title":"\u53bb\u5e74\u80a1\u6771\u6b0a\u76ca\u5831\u916c\u7387(ROE) <!--item2--> <!--item3--> %","item1":3,"item2":{"5":"\u5927\u65bc","6":"\u5c0f\u65bc"},"item3":[10,12,15,20,30],"htmlcode":"\u53bb\u5e74\u80a1\u6771\u6b0a\u76ca\u5831\u916c\u7387(ROE) <select name=\"item2[]\" id=\"item2\" class=\"item2_39\" disabled=\"disabled\"><option value=\"5\">\u5927\u65bc<\/option><option value=\"6\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_39\" disabled=\"disabled\"><option value=\"10\">10<\/option><option value=\"12\" selected>12<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><\/select> %"},"10":{"title":"\u524d\u5e74\u80a1\u6771\u6b0a\u76ca\u5831\u916c\u7387(ROE) <!--item2--> <!--item3--> %","item1":3,"item2":{"7":"\u5927\u65bc","8":"\u5c0f\u65bc"},"item3":[10,12,15,20,30],"htmlcode":"\u524d\u5e74\u80a1\u6771\u6b0a\u76ca\u5831\u916c\u7387(ROE) <select name=\"item2[]\" id=\"item2\" class=\"item2_310\" disabled=\"disabled\"><option value=\"7\">\u5927\u65bc<\/option><option value=\"8\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_310\" disabled=\"disabled\"><option value=\"10\">10<\/option><option value=\"12\" selected>12<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><\/select> %"},"19":{"title":"<!--item4-->\u5e74\u5e73\u5747\u80a1\u6771\u6b0a\u76ca\u5831\u916c\u7387(ROE) <!--item2--> <!--item3--> %","item1":8,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[10,12,15,20,30],"item4":[3,5,10],"htmlcode":"<select name=\"item4[]\" id=\"item4\" class=\"item4_319\" disabled=\"disabled\"><option value=\"3\">3<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><\/select>\u5e74\u5e73\u5747\u80a1\u6771\u6b0a\u76ca\u5831\u916c\u7387(ROE) <select name=\"item2[]\" id=\"item2\" class=\"item2_319\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_319\" disabled=\"disabled\"><option value=\"10\">10<\/option><option value=\"12\" selected>12<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><\/select> %"},"11":{"title":"\u8fd11\u5b63\u8cc7\u7522\u5831\u916c\u7387(ROA) <!--item2--> <!--item3--> %","item1":4,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[10,12,15,20,30],"htmlcode":"\u8fd11\u5b63\u8cc7\u7522\u5831\u916c\u7387(ROA) <select name=\"item2[]\" id=\"item2\" class=\"item2_311\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_311\" disabled=\"disabled\"><option value=\"10\">10<\/option><option value=\"12\" selected>12<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><\/select> %"},"12":{"title":"\u4eca\u5e74\u4ee5\u4f86\u8cc7\u7522\u5831\u916c\u7387(ROA) <!--item2--> <!--item3--> %","item1":4,"item2":{"3":"\u5927\u65bc","4":"\u5c0f\u65bc"},"item3":[10,12,15,20,30],"htmlcode":"\u4eca\u5e74\u4ee5\u4f86\u8cc7\u7522\u5831\u916c\u7387(ROA) <select name=\"item2[]\" id=\"item2\" class=\"item2_312\" disabled=\"disabled\"><option value=\"3\">\u5927\u65bc<\/option><option value=\"4\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_312\" disabled=\"disabled\"><option value=\"10\">10<\/option><option value=\"12\" selected>12<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><\/select> %"},"13":{"title":"\u53bb\u5e74\u8cc7\u7522\u5831\u916c\u7387(ROA) <!--item2--> <!--item3--> %","item1":4,"item2":{"5":"\u5927\u65bc","6":"\u5c0f\u65bc"},"item3":[10,12,15,20,30],"htmlcode":"\u53bb\u5e74\u8cc7\u7522\u5831\u916c\u7387(ROA) <select name=\"item2[]\" id=\"item2\" class=\"item2_313\" disabled=\"disabled\"><option value=\"5\">\u5927\u65bc<\/option><option value=\"6\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_313\" disabled=\"disabled\"><option value=\"10\">10<\/option><option value=\"12\" selected>12<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><\/select> %"},"14":{"title":"\u524d\u5e74\u8cc7\u7522\u5831\u916c\u7387(ROA) <!--item2--> <!--item3--> %","item1":4,"item2":{"7":"\u5927\u65bc","8":"\u5c0f\u65bc"},"item3":[10,12,15,20,30],"htmlcode":"\u524d\u5e74\u8cc7\u7522\u5831\u916c\u7387(ROA) <select name=\"item2[]\" id=\"item2\" class=\"item2_314\" disabled=\"disabled\"><option value=\"7\">\u5927\u65bc<\/option><option value=\"8\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_314\" disabled=\"disabled\"><option value=\"10\">10<\/option><option value=\"12\" selected>12<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><\/select> %"},"20":{"title":"<!--item4-->\u5e74\u5e73\u5747\u8cc7\u7522\u5831\u916c\u7387(ROA) <!--item2--> <!--item3--> %","item1":9,"item2":{"1":"\u5927\u65bc","2":"\u5c0f\u65bc"},"item3":[10,12,15,20,30],"item4":[3,5,10],"htmlcode":"<select name=\"item4[]\" id=\"item4\" class=\"item4_320\" disabled=\"disabled\"><option value=\"3\">3<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><\/select>\u5e74\u5e73\u5747\u8cc7\u7522\u5831\u916c\u7387(ROA) <select name=\"item2[]\" id=\"item2\" class=\"item2_320\" disabled=\"disabled\"><option value=\"1\">\u5927\u65bc<\/option><option value=\"2\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_320\" disabled=\"disabled\"><option value=\"10\">10<\/option><option value=\"12\" selected>12<\/option><option value=\"15\">15<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><\/select> %"},"15":{"title":"\u8fd11\u5b63\u8ca0\u50b5\u6bd4\u7387 <!--item2--> <!--item3--> %","item1":5,"item2":{"1":"\u5c0f\u65bc","2":"\u5927\u65bc"},"item3":[20,30,40,50,60],"htmlcode":"\u8fd11\u5b63\u8ca0\u50b5\u6bd4\u7387 <select name=\"item2[]\" id=\"item2\" class=\"item2_315\" disabled=\"disabled\"><option value=\"1\">\u5c0f\u65bc<\/option><option value=\"2\">\u5927\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_315\" disabled=\"disabled\"><option value=\"20\">20<\/option><option value=\"30\" selected>30<\/option><option value=\"40\">40<\/option><option value=\"50\">50<\/option><option value=\"60\">60<\/option><\/select> %"},"16":{"title":"\u8fd14\u5b63\u8ca0\u50b5\u6bd4\u7387 <!--item2--> <!--item3--> %","item1":5,"item2":{"3":"\u5c0f\u65bc","4":"\u5927\u65bc"},"item3":[20,30,40,50,60],"htmlcode":"\u8fd14\u5b63\u8ca0\u50b5\u6bd4\u7387 <select name=\"item2[]\" id=\"item2\" class=\"item2_316\" disabled=\"disabled\"><option value=\"3\">\u5c0f\u65bc<\/option><option value=\"4\">\u5927\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_316\" disabled=\"disabled\"><option value=\"20\">20<\/option><option value=\"30\" selected>30<\/option><option value=\"40\">40<\/option><option value=\"50\">50<\/option><option value=\"60\">60<\/option><\/select> %"}},"4":{"3":{"title":"9\u65e5K\u503c <!--item2--> 9\u65e5D\u503c","item1":2,"item2":{"1":"\u5411\u4e0a\u7a81\u7834","2":"\u5411\u4e0b\u8dcc\u7834"},"htmlcode":"9\u65e5K\u503c <select name=\"item2[]\" id=\"item2\" class=\"item2_43\" disabled=\"disabled\"><option value=\"1\">\u5411\u4e0a\u7a81\u7834<\/option><option value=\"2\">\u5411\u4e0b\u8dcc\u7834<\/option><\/select> 9\u65e5D\u503c"},"4":{"title":"9\u65e5K\u503c <!--item2-->","item1":2,"item2":{"3":"\u4f4e\u65bc20\u4e14\u53cd\u8f49\u5411\u4e0a","4":"\u8d85\u904e80\u4e14\u53cd\u8f49\u5411\u4e0b"},"htmlcode":"9\u65e5K\u503c <select name=\"item2[]\" id=\"item2\" class=\"item2_44\" disabled=\"disabled\"><option value=\"3\">\u4f4e\u65bc20\u4e14\u53cd\u8f49\u5411\u4e0a<\/option><option value=\"4\">\u8d85\u904e80\u4e14\u53cd\u8f49\u5411\u4e0b<\/option><\/select>"},"5":{"title":"9\u65e5D\u503c <!--item2-->","item1":2,"item2":{"5":"\u4f4e\u65bc10\u4e14\u53cd\u8f49\u5411\u4e0a","6":"\u8d85\u904e90\u4e14\u53cd\u8f49\u5411\u4e0b"},"htmlcode":"9\u65e5D\u503c <select name=\"item2[]\" id=\"item2\" class=\"item2_45\" disabled=\"disabled\"><option value=\"5\">\u4f4e\u65bc10\u4e14\u53cd\u8f49\u5411\u4e0a<\/option><option value=\"6\">\u8d85\u904e90\u4e14\u53cd\u8f49\u5411\u4e0b<\/option><\/select>"},"6":{"title":"5\u65e5\u5747\u7dda(MA) <!--item2--> <!--item3--> \u5747\u7dda(MA)","item1":3,"item2":{"1":"\u5411\u4e0a\u7a81\u7834","2":"\u5411\u4e0b\u8dcc\u7834"},"item3":[10,20,60],"htmlcode":"5\u65e5\u5747\u7dda(MA) <select name=\"item2[]\" id=\"item2\" class=\"item2_46\" disabled=\"disabled\"><option value=\"1\">\u5411\u4e0a\u7a81\u7834<\/option><option value=\"2\">\u5411\u4e0b\u8dcc\u7834<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_46\" disabled=\"disabled\"><option value=\"10\">10<\/option><option value=\"20\" selected>20<\/option><option value=\"60\">60<\/option><\/select> \u5747\u7dda(MA)"},"7":{"title":"10\u65e5\u5747\u7dda(MA) <!--item2--> <!--item3--> \u5747\u7dda(MA)","item1":3,"item2":{"3":"\u5411\u4e0a\u7a81\u7834","4":"\u5411\u4e0b\u8dcc\u7834"},"item3":[20,60],"htmlcode":"10\u65e5\u5747\u7dda(MA) <select name=\"item2[]\" id=\"item2\" class=\"item2_47\" disabled=\"disabled\"><option value=\"3\">\u5411\u4e0a\u7a81\u7834<\/option><option value=\"4\">\u5411\u4e0b\u8dcc\u7834<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_47\" disabled=\"disabled\"><option value=\"20\">20<\/option><option value=\"60\" selected>60<\/option><\/select> \u5747\u7dda(MA)"},"8":{"title":"10\u65e5MTM <!--item2--> \u7684\u80a1\u7968","item1":4,"item2":{"1":"\u7531\u6b63\u8f49\u8ca0","2":"\u7531\u8ca0\u8f49\u6b63"},"htmlcode":"10\u65e5MTM <select name=\"item2[]\" id=\"item2\" class=\"item2_48\" disabled=\"disabled\"><option value=\"1\">\u7531\u6b63\u8f49\u8ca0<\/option><option value=\"2\">\u7531\u8ca0\u8f49\u6b63<\/option><\/select> \u7684\u80a1\u7968"},"9":{"title":"14\u65e5\u5a01\u5ec9\u6307\u6a19 <!--item2--> <!--item3--> \u7684\u80a1\u7968","item1":5,"item2":{"1":"\u5411\u4e0a\u7a81\u7834","2":"\u5411\u4e0b\u8dcc\u7834"},"item3":[50],"htmlcode":"14\u65e5\u5a01\u5ec9\u6307\u6a19 <select name=\"item2[]\" id=\"item2\" class=\"item2_49\" disabled=\"disabled\"><option value=\"1\">\u5411\u4e0a\u7a81\u7834<\/option><option value=\"2\">\u5411\u4e0b\u8dcc\u7834<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_49\" disabled=\"disabled\"><option value=\"50\">50<\/option><\/select> \u7684\u80a1\u7968"},"10":{"title":"20\u65e5\u5a01\u5ec9\u6307\u6a19 <!--item2--> <!--item3--> \u7684\u80a1\u7968","item1":5,"item2":{"3":"\u5411\u4e0a\u7a81\u7834","4":"\u5411\u4e0b\u8dcc\u7834"},"item3":[50],"htmlcode":"20\u65e5\u5a01\u5ec9\u6307\u6a19 <select name=\"item2[]\" id=\"item2\" class=\"item2_410\" disabled=\"disabled\"><option value=\"3\">\u5411\u4e0a\u7a81\u7834<\/option><option value=\"4\">\u5411\u4e0b\u8dcc\u7834<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_410\" disabled=\"disabled\"><option value=\"50\">50<\/option><\/select> \u7684\u80a1\u7968"},"11":{"title":" MA5 & MA10 & MA20 \u4e09\u5747\u7dda\u7cfe <!--item2--> <!--item3--> %","item1":6,"item2":{"1":"\u5c0f\u65bc","2":"\u5927\u65bc"},"item3":[3],"htmlcode":" MA5 & MA10 & MA20 \u4e09\u5747\u7dda\u7cfe <select name=\"item2[]\" id=\"item2\" class=\"item2_411\" disabled=\"disabled\"><option value=\"1\">\u5c0f\u65bc<\/option><option value=\"2\">\u5927\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_411\" disabled=\"disabled\"><option value=\"3\">3<\/option><\/select> %"},"12":{"title":" MA5 & MA20 & MA60 \u4e09\u5747\u7dda\u7cfe <!--item2--> <!--item3--> %","item1":6,"item2":{"3":"\u5c0f\u65bc","4":"\u5927\u65bc"},"item3":[3],"htmlcode":" MA5 & MA20 & MA60 \u4e09\u5747\u7dda\u7cfe <select name=\"item2[]\" id=\"item2\" class=\"item2_412\" disabled=\"disabled\"><option value=\"3\">\u5c0f\u65bc<\/option><option value=\"4\">\u5927\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_412\" disabled=\"disabled\"><option value=\"3\">3<\/option><\/select> %"}},"5":{"1":{"title":"\u8fd1 <!--item3--> \u65e5\u4e09\u5927\u6cd5\u4eba <!--item2--> \u524d30\u540d","item1":1,"item2":{"1":"\u8cb7\u8d85","2":"\u8ce3\u8d85"},"item3":[1,2,3,4,5,10,20,30],"htmlcode":"\u8fd1 <select name=\"item3[]\" id=\"item3\" class=\"item3_51\" disabled=\"disabled\"><option value=\"1\">1<\/option><option value=\"2\" selected>2<\/option><option value=\"3\">3<\/option><option value=\"4\">4<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><\/select> \u65e5\u4e09\u5927\u6cd5\u4eba <select name=\"item2[]\" id=\"item2\" class=\"item2_51\" disabled=\"disabled\"><option value=\"1\">\u8cb7\u8d85<\/option><option value=\"2\">\u8ce3\u8d85<\/option><\/select> \u524d30\u540d"},"2":{"title":"\u8fd1 <!--item3--> \u65e5\u5916\u8cc7 <!--item2--> \u524d30\u540d","item1":2,"item2":{"1":"\u8cb7\u8d85","2":"\u8ce3\u8d85"},"item3":[1,2,3,4,5,10,20,30],"htmlcode":"\u8fd1 <select name=\"item3[]\" id=\"item3\" class=\"item3_52\" disabled=\"disabled\"><option value=\"1\">1<\/option><option value=\"2\" selected>2<\/option><option value=\"3\">3<\/option><option value=\"4\">4<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><\/select> \u65e5\u5916\u8cc7 <select name=\"item2[]\" id=\"item2\" class=\"item2_52\" disabled=\"disabled\"><option value=\"1\">\u8cb7\u8d85<\/option><option value=\"2\">\u8ce3\u8d85<\/option><\/select> \u524d30\u540d"},"3":{"title":"\u8fd1 <!--item3--> \u65e5\u6295\u4fe1 <!--item2--> \u524d30\u540d","item1":3,"item2":{"1":"\u8cb7\u8d85","2":"\u8ce3\u8d85"},"item3":[1,2,3,4,5,10,20,30],"htmlcode":"\u8fd1 <select name=\"item3[]\" id=\"item3\" class=\"item3_53\" disabled=\"disabled\"><option value=\"1\">1<\/option><option value=\"2\" selected>2<\/option><option value=\"3\">3<\/option><option value=\"4\">4<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><\/select> \u65e5\u6295\u4fe1 <select name=\"item2[]\" id=\"item2\" class=\"item2_53\" disabled=\"disabled\"><option value=\"1\">\u8cb7\u8d85<\/option><option value=\"2\">\u8ce3\u8d85<\/option><\/select> \u524d30\u540d"},"4":{"title":"\u8fd1 <!--item3--> \u65e5\u81ea\u71df\u5546 <!--item2--> \u524d30\u540d","item1":4,"item2":{"1":"\u8cb7\u8d85","2":"\u8ce3\u8d85"},"item3":[1,2,3,4,5,10,20,30],"htmlcode":"\u8fd1 <select name=\"item3[]\" id=\"item3\" class=\"item3_54\" disabled=\"disabled\"><option value=\"1\">1<\/option><option value=\"2\" selected>2<\/option><option value=\"3\">3<\/option><option value=\"4\">4<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><\/select> \u65e5\u81ea\u71df\u5546 <select name=\"item2[]\" id=\"item2\" class=\"item2_54\" disabled=\"disabled\"><option value=\"1\">\u8cb7\u8d85<\/option><option value=\"2\">\u8ce3\u8d85<\/option><\/select> \u524d30\u540d"},"5":{"title":"\u8fd1 <!--item3--> \u65e5\u878d\u8cc7 <!--item2--> \u524d30\u540d","item1":5,"item2":{"1":"\u589e\u52a0","2":"\u6e1b\u5c11"},"item3":[1,2,3,4,5,10,20,30],"htmlcode":"\u8fd1 <select name=\"item3[]\" id=\"item3\" class=\"item3_55\" disabled=\"disabled\"><option value=\"1\">1<\/option><option value=\"2\" selected>2<\/option><option value=\"3\">3<\/option><option value=\"4\">4<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><\/select> \u65e5\u878d\u8cc7 <select name=\"item2[]\" id=\"item2\" class=\"item2_55\" disabled=\"disabled\"><option value=\"1\">\u589e\u52a0<\/option><option value=\"2\">\u6e1b\u5c11<\/option><\/select> \u524d30\u540d"},"6":{"title":"\u8fd1 <!--item3--> \u65e5\u878d\u5238 <!--item2--> \u524d30\u540d","item1":5,"item2":{"3":"\u589e\u52a0","4":"\u6e1b\u5c11"},"item3":[1,2,3,4,5,10,20,30],"htmlcode":"\u8fd1 <select name=\"item3[]\" id=\"item3\" class=\"item3_56\" disabled=\"disabled\"><option value=\"1\">1<\/option><option value=\"2\" selected>2<\/option><option value=\"3\">3<\/option><option value=\"4\">4<\/option><option value=\"5\">5<\/option><option value=\"10\">10<\/option><option value=\"20\">20<\/option><option value=\"30\">30<\/option><\/select> \u65e5\u878d\u5238 <select name=\"item2[]\" id=\"item2\" class=\"item2_56\" disabled=\"disabled\"><option value=\"3\">\u589e\u52a0<\/option><option value=\"4\">\u6e1b\u5c11<\/option><\/select> \u524d30\u540d"},"7":{"title":"\u878d\u8cc7\u4f7f\u7528\u7387 <!--item2--> <!--item3--> %","item1":5,"item2":{"5":"\u5927\u65bc","6":"\u5c0f\u65bc"},"item3":[20,30,40,50,60,70],"htmlcode":"\u878d\u8cc7\u4f7f\u7528\u7387 <select name=\"item2[]\" id=\"item2\" class=\"item2_57\" disabled=\"disabled\"><option value=\"5\">\u5927\u65bc<\/option><option value=\"6\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_57\" disabled=\"disabled\"><option value=\"20\">20<\/option><option value=\"30\" selected>30<\/option><option value=\"40\">40<\/option><option value=\"50\">50<\/option><option value=\"60\">60<\/option><option value=\"70\">70<\/option><\/select> %"},"8":{"title":"\u878d\u5238\u4f7f\u7528\u7387 <!--item2--> <!--item3--> %","item1":5,"item2":{"7":"\u5927\u65bc","8":"\u5c0f\u65bc"},"item3":[20,30,40,50,60,70],"htmlcode":"\u878d\u5238\u4f7f\u7528\u7387 <select name=\"item2[]\" id=\"item2\" class=\"item2_58\" disabled=\"disabled\"><option value=\"7\">\u5927\u65bc<\/option><option value=\"8\">\u5c0f\u65bc<\/option><\/select> <select name=\"item3[]\" id=\"item3\" class=\"item3_58\" disabled=\"disabled\"><option value=\"20\">20<\/option><option value=\"30\" selected>30<\/option><option value=\"40\">40<\/option><option value=\"50\">50<\/option><option value=\"60\">60<\/option><option value=\"70\">70<\/option><\/select> %"}}}

$j('.menubg0725_no').live('click', function(){
    $j('.menubg0725').attr('class', 'menubg0725_no');
    $j(this).attr('class', 'menubg0725');
    var no = $j(this).index();
    $j('.selectm').attr('class', 'selectm_dpn');
    $j('.selectm_dpn').eq(no).attr('class', 'selectm');
});
$j(document).ready(function(){
    //判斷有沒有 cookie 值，如果有就把選過的項目塞回去
    //var cookie_item1 = $j.cookie('stock_qrank_cbxitem1');
    //var cookie_item2 = $j.cookie('stock_qrank_selitem2');
    //var cookie_item3 = $j.cookie('stock_qrank_selitem3');

    var cookie_item1 = '_26,_27';
    var cookie_item2 = '2,2';
    var cookie_item3 = '10,10';

    //確認有這三個 cookie 值後，就把動作塞進去
    if(cookie_item1!=null && cookie_item2!=null && cookie_item3!=null){
        //根據 cookie 存的 item1 值來將 checkbox 打勾
        var item1Ary = cookie_item1.split(',');
        $j.each(item1Ary, function(index, item){

            $j('#'+item1Ary[index]).attr('checked', true); //item1 checkbox
            var prediv = $j('.item2'+item1Ary[index]).closest('div'); //將該項目背景設定已選項的 class
            prediv.attr('class', 'select_y');

            //根據 cookie 存的 item2 值來將 select 選擇
            var item2Ary = cookie_item2.split(',');
            $j.each(item2Ary, function(index, item){
                $j('.item2'+item1Ary[index]).attr('disabled', false); //將 item2 的 <select> disable 解除
                $j('.item2'+item1Ary[index]).val(item2Ary[index]);  //設定選項被選取
            });
            //根據 cookie 存的 item3 值來將 select 選擇
            var item3Ary = cookie_item3.split(',');
            $j.each(item3Ary, function(index, item){
                $j('.item3'+item1Ary[index]).attr('disabled', false); //將 item2 的 <select> disable 解除
                $j('.item3'+item1Ary[index]).val(item3Ary[index]);  //設定選項被選取
            });
            //『選股條件』文字也要塞進去
            var ckey1 = item1Ary[index].substr(1, 1);
            var ckey2 = item1Ary[index].substr(2, 2);
            var ctitle_buff = ary_json[ckey1][ckey2]['title'];
            //比對目前所選擇的項目為何
            ctitle_buff = ctitle_buff.replace(/<\!--item2-->/, '<font color="red">'+prediv.find('#item2 option:selected').text()+'</font>');
            if(typeof(ary_json[ckey1][ckey2]['item3'])!='undefined'){
                ctitle_buff = ctitle_buff.replace(/<\!--item3-->/, '<font color="red">'+prediv.find('#item3 option:selected').text()+'</font>');
            }
            ctitle_buff = '<li class="li'+ ckey1+ckey2+'">'+ctitle_buff+'</li>';
            $j('.ul1').append(ctitle_buff);

        });
        //送出結果
        chkqrankform(1);
    }
    //判斷有沒有cookie值，如果有就把選過的項目塞回去

    //checkbox onchange 事件
    $j('input:checkbox').change(function(){

        var chk        = $j(this).attr('checked'); //checkbox 事件
        var thediv     = $j(this).closest('div');
        var key1       = $j(this).data('key').substr(1,1);
        var key2       = $j(this).data('key').substr(2,2);
        var title_buff = ary_json[key1][key2]['title'];

        //比對目前所選擇的項目為何
        title_buff = title_buff.replace(/<\!--item2-->/, '<font color="red">'+thediv.find('#item2 option:selected').text()+'</font>');
        if(typeof(ary_json[key1][key2]['item3'])!='undefined'){
            title_buff = title_buff.replace(/<\!--item3-->/, '<font color="red">'+thediv.find('#item3 option:selected').text()+'</font>');
        }
        if(typeof(ary_json[key1][key2]['item4'])!='undefined'){
            title_buff = title_buff.replace(/<\!--item4-->/, '<font color="red">'+thediv.find('#item4 option:selected').text()+'</font>');
        }
        title_buff = '<li class="li'+ key1+key2+'">'+title_buff+'</li>';

        //如果打勾，把該行的 class 置換，且打勾的項目在下方的『選股條件』下方顯示
        if(chk){
            //最多只能勾選 3 個項目，超過顯示提示訊息
            if($j('input:checked').length > 3){
                if($j('input:checked').length > 3) $j(this).attr('checked', false);
                alert('最多只能勾選3個項目!');
                return;
            }
            //勾選時將該項的 select 選項 disabled=false
            $j('.item2_'+key1+key2).attr('disabled', false); //將 item2 的 <select> disable 解除
            $j('.item3_'+key1+key2).attr('disabled', false); //將 item3 的 <select> disable 解除
            $j('.item4_'+key1+key2).attr('disabled', false); //將 item4 的 <select> disable 解除
            thediv.attr('class', 'select_y'); //顯示文字在『選股條件』項下
            //如果是已存在的項目就置換，如果不存在就 append
            if($j('.ul1 li').filter('.li'+key1+key2).html()!=null){
                $j('.ul1 li').filter('.li'+key1+key2).html(title_buff);
            }else{
                $j('.ul1').append(title_buff);
            }
        }else{
            //勾選時將該項的 select 選項 disabled=true
            $j('.item2_'+key1+key2).attr('disabled', true); //將item2的<select> disable上鎖
            $j('.item3_'+key1+key2).attr('disabled', true); //將item3的<select> disable上鎖
            $j('.item4_'+key1+key2).attr('disabled', true); //將item4的<select> disable上鎖
            thediv.attr('class', 'select_n');
            $j('.li'+key1+key2).remove();
        }
        //送出結果
        chkqrankform(1);
    });
    //checkbox onchange 事件

    //如果已打勾的選項再去選擇 select 項目，就要再觸發打勾的動作
    $j('select').change(function(){
        $j(this).closest('div').find('input:checkbox').trigger('change');
    });
});

//查詢快速選股結果
function chkqrankform(page, sort, nsid){
    //取得 checkbox 有打勾的資料
    var cbxValues = new Array();
    var it1Values = new Array();
    var selitem2Values = new Array();
    var selitem3Values = new Array();
    var selitem4Values = new Array();
	var length = $j('input:checked').length;
	var width = window.innerWidth;

    $j("#qrankform input:checkbox:checked[name='area_item1[]']").each(function(i) {
        cbxValues[i] = $j(this).data('key');
        it1Values[i] = $j(this).val();

        //取得 select 值
        var key1 = $j(this).data('key').substr(1,1);
        var key2 = $j(this).data('key').substr(2,2);
        selitem2Values[i] = $j('.item2_'+key1+key2).val();
        selitem3Values[i] = $j('.item3_'+key1+key2).val();
        selitem4Values[i] = $j('.item4_'+key1+key2).val()===undefined?null:$j('.item4_'+key1+key2).val();
    });
    if(cbxValues.length == 0){
        //alert('請至少勾選1個條件!');
        $j('.result_table').html('');
        return false;
    }

    //設定 cookie
    var date = new Date();
    date.setTime(date.getTime()+(60 * 60 * 1000));
    $j.cookie('stock_qrank_cbxitem1', cbxValues, { path: '/', expires: date }); //for js use
    $j.cookie('stock_qrank_selitem1', it1Values, { path: '/', expires: date }); //for php use
    $j.cookie('stock_qrank_selitem2', selitem2Values, { path: '/', expires: date }); //for js,php use
    $j.cookie('stock_qrank_selitem3', selitem3Values, { path: '/', expires: date }); //for js,php use
    $j.cookie('stock_qrank_selitem4', selitem4Values, { path: '/', expires: date }); //for js,php use
	
    //$j('.result_table').html('<div style="text-align:center;"><img src="http://img.stock.pchome.com.tw/img/ajax-loader.gif"></div>');
	$j('.result_table').html('<div style="text-align:center;"><img src="images/preloader.gif"></div>');
    $j.post('search1.php', {area_item1: it1Values, item2: selitem2Values, item3: selitem3Values, item4: selitem4Values, screen: width, sort: sort, length: length}, function(data){
        //alert(data);
        $j('.result_table').remove('.div_to_remove');
        $j('.result_table').html(data);
        if(nsid == undefined) sid=0;
        move_select();
    });
    $j('.spanL').die().live('click', function(){
        move_select(-1);
    });
    $j('.spanR').die().live('click', function(){
        move_select(1);
    });
    $j('.ul_title .col_name, .ul_title .li_warp, .pages a').die().live('click', function(){
        var param = $j(this).data('js').split('_');
        chkqrankform(param[0], param[1], sid);
    });
}

//快速選股左右移動
function move_select(x){
    var xlength = $j('.ul_title .li_warp').length;

    if(x==1){
        //按右邊
        if(sid+countx >= xlength) return;
        sid++;
    }else if(x==-1){
        //按左邊
        if(sid==0) return;
        sid--;
    }
    $j('.ul_title .li_warp').hide();
    $j('.ul_title li:eq('+(sid + countx + 1)+')').show();
    $j('.ul_title li:eq('+(sid + countx + 2)+')').show();
    $j('.ul_title li:eq('+(sid + countx + 3)+')').show();

    $j('.ul_stock').each(function(){
        for(i=4; i<$j(this).find('li').length-1; i++){
            $j(this).find('li').eq(i).hide();
        }
        $j(this).find('li:eq('+(sid + countx + 1)+')').show();
        $j(this).find('li:eq('+(sid + countx + 2)+')').show();
        $j(this).find('li:eq('+(sid + countx + 3)+')').show();
    });

    if(sid==0){
        $j('.spanL').css({'opacity':'0.5', 'cursor':'default'});
    }else{
        $j('.spanL').css({'opacity':'1', 'cursor':'pointer'});
    }
    if(sid + countx >= xlength){
        $j('.spanR').css({'opacity':'0.5', 'cursor':'default'});
    }else{
        $j('.spanR').css({'opacity':'1', 'cursor':'pointer'});
    }
}
</script>
</div>      </div>
    </div>
    <!--左欄 結束-->


</font></div><font face="arial">
</font></center>
   </section> <!-- Homepage Hero end -->

   <!-- Footer
   ================================================== -->
   <footer>

      <div class="row">         

            <div class="footer-logo">
               <a href="#">
                  <img src="images/footer-logo.png" alt="" />
               </a>
            </div>

            <p>
				<pre>2017第22屆全國大專校院資訊應用服務創新競賽 ——— &#60 Prophitfolio &#62</pre>
			<p class="copyright">&copy; 2017 Prophitfolio | IAP1-12, E.SUN FINTECH-02</p>

         <div id="go-top">
            <a class="smoothscroll" title="Back to Top" href="#hero"><i class="icon-up-open"></i></a>
         </div>

      </div> <!-- Row End -->

   </footer> <!-- Footer End-->


</body>

</html>