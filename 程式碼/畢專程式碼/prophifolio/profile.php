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
 
//搜尋資料庫資料
$sql_no = "SELECT p.NO_STOCK FROM portfolio p LEFT JOIN member m ON m.risk_income_rank = p.RR WHERE p.date = (SELECT p.date FROM portfolio p LEFT JOIN member m ON p.RR = m.risk_income_rank WHERE p.RR = (SELECT risk_income_rank FROM member WHERE account_number = '".$_SESSION['account_number']."') ORDER BY p.date DESC LIMIT 1) AND m.account_number = '".$_SESSION['account_number']."'";
$sql_per= "SELECT p.percentage FROM portfolio p LEFT JOIN member m ON m.risk_income_rank = p.RR WHERE p.date = (SELECT p.date FROM portfolio p LEFT JOIN member m ON p.RR = m.risk_income_rank WHERE p.RR = (SELECT risk_income_rank FROM member WHERE account_number = '".$_SESSION['account_number']."') ORDER BY p.date DESC LIMIT 1) AND m.account_number = '".$_SESSION['account_number']."'";
$no_stock = mysql_query($sql_no);
$percentage = mysql_query($sql_per);

$stock_array = array();
$percentage_array = array();

for($i=1;$i<=30;$i++){
    $s = mysql_fetch_row($no_stock);
	$p = mysql_fetch_row($percentage);
	
    $NewString1 = explode('"', $s[0]);
	$NewString2 = explode('"', $p[0]);
	
    $a = $NewString1;
	$b = $NewString2;
    array_push($stock_array,$a);
    array_push($percentage_array,$b);
}
for($j=0;$j<30;$j+=2){
    unset($stock_array[0][$j]);
	unset($percentage_array[0][$j]);
}

$stock_array = array_values($stock_array[0]);
$percentage_array = array_values($percentage_array[0]);

$sn_array = array();

for($k=0;$k<30;$k++){

	$sn_temp = mysql_query("SELECT Stock_name FROM Stock_referance WHERE stock_code = '$stock_array[$k]'");
    
	
	    $rs = mysql_fetch_row($sn_temp);
	    $a = $rs[0];
	    array_push($sn_array,$a);
	
}

$sql_date = "SELECT p.date FROM portfolio p LEFT JOIN member m ON p.RR = m.risk_income_rank WHERE p.RR = (SELECT risk_income_rank FROM member WHERE account_number = '".$_SESSION['account_number']."') ORDER BY p.date DESC LIMIT 1";

	$date = array();
	$date_result = mysql_query($sql_date);
	$temp_date = mysql_fetch_row($date_result);
	$c = $temp_date[0];
	array_push($date,$c);

?>



<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- Basic Page Needs================================================== -->
   <meta charset="utf-8">
	<title>Prophitfolio - 以深度學習預言可獲利之最適投資組合</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- Mobile Specific Metas================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS================================================== -->
	<link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/layout.css">
	<link rel="stylesheet" href="css/media-queries.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="css/table_style.css">

   <!-- Script================================================== -->
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
         <a href="index.php" style="margin:0; width: 120px; height: 32px;"><img style="width: 120px; height: 32px;" alt="" src="images/logo.png"></a>
      </div>

      <nav id="nav-wrap">         
         
         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
	      <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>       
		<ul id="nav" class="nav">
			<li><s style="background-color: #DDDDDD; display: inline-block; padding: 0; font-size: 18px; line-height: 38px; text-decoration: none; text-align: left"><a href="k_line.php">一般搜尋</a></s></li>
			
			<li><s style="background-color: #DDDDDD; display: inline-block; padding: 0; font-size: 18px; line-height: 38px; text-decoration: none; text-align: left"><a href="search.php">進階搜尋</a></s></li>
			
			<li><s style="background-color: #DDDDDD; display: inline-block; padding: 0; font-size: 18px; line-height: 38px; text-decoration: none; text-align: left"><a href="profile.php">個人頁面</a></s></li>
         </ul>

      </nav> <!-- end #nav-wrap -->

   </header> <!-- Header End -->
   
   <!-- Homepage Hero
   ================================================== -->
   <section id="hero">

	   <div class="row">

		   <div class="twelve columns">

			   <div class="hero-text">
			   
				   <h1 class="responsive-headline"  style="font-weight:300; margin-bottom:30px;">個人頁面</h1>
			   
			   </div>

		   </div>

	   </div>

   </section> <!-- Homepage Hero end -->

   <section id="styles" style="padding: 30px 0 72px; background: #fff;">

    <div class="row section-head">

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="js/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>

		<div id="container" style="width: 100%; margin: 0 auto"></div>

                 

      </div> <!-- Row End-->

      <hr> 

<!--===股票收藏===================-->
	  
      <div class="row section-head">


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
  // echo $code_array[$i];
  $get_codeCHT    = mysql_query("SELECT `Stock_name` FROM `Stock_referance` WHERE `Stock_code` = '" . $code_array[$i] . "'");
  $result_CHT     = $code_array[$i] . " " . mysql_fetch_row($get_codeCHT)[0];
    echo '<div class="table_row">';
    echo '<div class="table_cell">';
    echo '<form style="
            margin-bottom: 0px;" 
            action="k_line.php" method="Post"> 
          <button style="
            padding-bottom: 05px;
            padding-top: 05px;
            padding-right: 17px;
            padding-left: 17px;
            background-color: #f3b330;
            font-weight: 900;"
            name="number" value="' . $code_array[$i] . '">' . $result_CHT . '</button></form>';
    echo '</div>';
  $get_datailData = mysql_query("SELECT `close_price` FROM stock_data2 WHERE NO_STOCK = '" . $code_array[$i] . "' AND date > " . date("Y-m-d") . " ORDER BY date DESC LIMIT 1");
  $result_closeP  = mysql_fetch_row($get_datailData)[0];
    echo '<div class="table_cell">' . $result_closeP . '</div>';
  $get_datailData = mysql_query("SELECT `price_minus` FROM stock_data2 WHERE NO_STOCK = '" . $code_array[$i] . "' AND date > " . date("Y-m-d") . " ORDER BY date DESC LIMIT 1");
  $result_priceMi = mysql_fetch_row($get_datailData)[0];
    echo '<div class="table_cell">' . $result_priceMi . '</div>';
  $get_datailData = mysql_query("SELECT `PEratio` FROM stock_data2 WHERE NO_STOCK = '" . $code_array[$i] . "' AND date > " . date("Y-m-d") . " ORDER BY date DESC LIMIT 1");
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
echo '<div class="table_cell"> <button type="button" onclick="transData(\'' . $_SESSION['account_number'] . '\')">建立投資組合</button> </div>';
echo '</div>';
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

      <hr />

      </div> <!-- Row End-->
	  
<!--  股票收藏===================-->

      <div class="row section-head">

        

      </div> <!-- Row End-->


   </section> <!-- Style Guide Section End-->


   <!-- Footer
   ================================================== -->
   <footer>

      <div class="row">         

            <div class="footer-logo">
               <a href="#">
                  <img src="images/footer-logo.png" alt="">
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


   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

   <script src="js/waypoints.js"></script>
   <script src="js/jquery.fittext.js"></script>    
   <script src="js/main.js"></script>

   <script language="JavaScript">
   /*Highcharts.chart('container', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: '最新個人選股(<?php echo $date[0] ?>)'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        }
      }
    }
  },
  series: [{
    name: 'Brands',
    colorByPoint: true,
    data: [{
      name: '<?php echo $sn_array[0]?>',
      y: <?php echo $percentage_array[0]?>
    }, {
      name: '<?php echo $sn_array[1]?>',
      y: <?php echo $percentage_array[1]?>,
      sliced: true,
      selected: true
    }, {
      name: '<?php echo $sn_array[2]?>',
      y: <?php echo $percentage_array[2]?>
    }, {
      name: '<?php echo $sn_array[3]?>',
      y: <?php echo $percentage_array[3]?>
    }, {
      name: '<?php echo $sn_array[4]?>',
      y: <?php echo $percentage_array[4]?>
    }, {
      name: '<?php echo $sn_array[5]?>',
      y: <?php echo $percentage_array[5]?>
    }, {
      name: '<?php echo $sn_array[6]?>',
      y: <?php echo $percentage_array[6]?>
    }, {
      name: '<?php echo $sn_array[7]?>',
      y: <?php echo $percentage_array[7]?>
    }, {
      name: '<?php echo $sn_array[8]?>',
      y: <?php echo $percentage_array[8]?>
    }, {
      name: '<?php echo $sn_array[9]?>',
      y: <?php echo $percentage_array[9]?>
    }/*, {
      name: '<?php echo $stock_array[10]?>',
      y: <?php echo $percentage_array[10]?>
    }, {
      name: '<?php echo $stock_array[11]?>',
      y: <?php echo $percentage_array[12]?>
    }, {
      name: '<?php echo $stock_array[13]?>',
      y: <?php echo $percentage_array[13]?>
    }, {
      name: '<?php echo $stock_array[14]?>',
      y: <?php echo $percentage_array[14]?>
    }, {
      name: '<?php echo $stock_array[15]?>',
      y: <?php echo $percentage_array[15]?>
    }, {
      name: '<?php echo $stock_array[16]?>',
      y: <?php echo $percentage_array[16]?>
    }, {
      name: '<?php echo $stock_array[17]?>',
      y: <?php echo $percentage_array[17]?>
    }, {
      name: '<?php echo $stock_array[18]?>',
      y: <?php echo $percentage_array[18]?>
    }, {
      name: '<?php echo $stock_array[19]?>',
      y: <?php echo $percentage_array[19]?>
    }, {
      name: '<?php echo $stock_array[20]?>',
      y: <?php echo $percentage_array[20]?>
    }, {
      name: '<?php echo $stock_array[21]?>',
      y: <?php echo $percentage_array[21]?>
    }, {
      name: '<?php echo $stock_array[22]?>',
      y: <?php echo $percentage_array[22]?>
    }, {
      name: '<?php echo $stock_array[23]?>',
      y: <?php echo $percentage_array[23]?>
    }, {
      name: '<?php echo $stock_array[24]?>',
      y: <?php echo $percentage_array[24]?>
    }, {
      name: '<?php echo $stock_array[25]?>',
      y: <?php echo $percentage_array[25]?>
    }, {
      name: '<?php echo $stock_array[26]?>',
      y: <?php echo $percentage_array[26]?>
    }, {
      name: '<?php echo $stock_array[27]?>',
      y: <?php echo $percentage_array[27]?>
    }, {
      name: '<?php echo $stock_array[28]?>',
      y: <?php echo $percentage_array[28]?>
    }, {
      name: '<?php echo $stock_array[29]?>',
      y: <?php echo $percentage_array[29]?>
    }]
  }]
});*/


$(document).ready(function () {

    // Build the chart
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            //text: '最新個人化投資組合(<?php echo $date[0] ?>)'
            text: '最新個人化投資組合(2018-01-02)'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
      name: '<?php echo $sn_array[0]?>',
      y: <?php echo $percentage_array[0]?>
    }, {
      name: '<?php echo $sn_array[1]?>',
      y: <?php echo $percentage_array[1]?>,
      sliced: true,
      selected: true
    }, {
      name: '<?php echo $sn_array[2]?>',
      y: <?php echo $percentage_array[2]?>
    }, {
      name: '<?php echo $sn_array[3]?>',
      y: <?php echo $percentage_array[3]?>
    }, {
      name: '<?php echo $sn_array[4]?>',
      y: <?php echo $percentage_array[4]?>
    }, {
      name: '<?php echo $sn_array[5]?>',
      y: <?php echo $percentage_array[5]?>
    }, {
      name: '<?php echo $sn_array[6]?>',
      y: <?php echo $percentage_array[6]?>
    }, {
      name: '<?php echo $sn_array[7]?>',
      y: <?php echo $percentage_array[7]?>
    }, {
      name: '<?php echo $sn_array[8]?>',
      y: <?php echo $percentage_array[8]?>
    }, {
      name: '<?php echo $sn_array[9]?>',
      y: <?php echo $percentage_array[9]?>
    }, {
      name: '<?php echo $sn_array[10]?>',
      y: <?php echo $percentage_array[10]?>
    }, {
      name: '<?php echo $sn_array[11]?>',
      y: <?php echo $percentage_array[11]?>
    }, {
      name: '<?php echo $sn_array[12]?>',
      y: <?php echo $percentage_array[12]?>
    },/*{
      name: '<?php echo $sn_array[13]?>',
      y: <?php echo $percentage_array[13]?>
    }, /*{
      name: '<?php echo $sn_array[14]?>',
      y: <?php echo $percentage_array[14]?>
    }, {
      name: '<?php echo $sn_array[15]?>',
      y: <?php echo $percentage_array[15]?>
    }, {
      name: '<?php echo $sn_array[16]?>',
      y: <?php echo $percentage_array[16]?>
    }, {
      name: '<?php echo $sn_array[17]?>',
      y: <?php echo $percentage_array[17]?>
    }, {
      name: '<?php echo $sn_array[18]?>',
      y: <?php echo $percentage_array[18]?>
    }, {
      name: '<?php echo $sn_array[19]?>',
      y: <?php echo $percentage_array[19]?>
    }, {
      name: '<?php echo $sn_array[20]?>',
      y: <?php echo $percentage_array[20]?>
    }, {
      name: '<?php echo $sn_array[21]?>',
      y: <?php echo $percentage_array[21]?>
    }, {
      name: '<?php echo $sn_array[22]?>',
      y: <?php echo $percentage_array[22]?>
    }, {
      name: '<?php echo $sn_array[23]?>',
      y: <?php echo $percentage_array[23]?>
    }, {
      name: '<?php echo $sn_array[24]?>',
      y: <?php echo $percentage_array[24]?>
    }, {
      name: '<?php echo $sn_array[25]?>',
      y: <?php echo $percentage_array[25]?>
    }, {
      name: '<?php echo $sn_array[26]?>',
      y: <?php echo $percentage_array[26]?>
    }, {
      name: '<?php echo $sn_array[27]?>',
      y: <?php echo $percentage_array[27]?>
    }, {
      name: '<?php echo $sn_array[28]?>',
      y: <?php echo $percentage_array[28]?>
    }, {
      name: '<?php echo $sn_array[29]?>',
      y: <?php echo $percentage_array[29]?>
    }*/]
        }]
    });
});
chart.reflow();


	</script>
   
</body>

</html>