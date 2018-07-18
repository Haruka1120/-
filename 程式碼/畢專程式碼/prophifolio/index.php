<?php
    
    session_start();
   
   
    
    
    if($_SESSION['account_number'] != null){
     $username = $_SESSION['account_number'];
    echo $_SESSION['account_number'];
    $conn = mysqli_connect("127.0.0.1","work","w0rk@ncyu");//連接伺服器
    
    mysqli_select_db($conn,"Prophifolio");//選擇資料庫
    mysqli_query($conn,"set names utf8");//讓資料可以讀取中文
    
    if (!$conn)
    {
        die('Could not connect: ' . mysql_error());
    }
    //搜尋資料庫資料
    $sql = "SELECT * FROM member WHERE account_number = '".$username."'" ;
    $result = mysqli_query($conn,$sql);
    if(!result)
    {
        echo ("Error: ".mysqli_error($connect));
        exit();
    }
    
    
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $name =  $row['name'];

        $_SESSION['account_number'] = $username;


    }else{
        
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
        
    }
    
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

   <!-- Script
   ================================================== -->
	<script src="js/modernizr.js"></script>

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
         <a class="smoothscroll" style="margin:0; width: 120px; height: 32px;" href="#hero"><img style="width: 120px; height: 32px;" alt="" src="images/logo.png"></a>
      </div>

      <nav id="nav-wrap">         
         
         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
	      <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>         

         <ul id="nav" class="nav">
			<li><s style="background-color: #DDDDDD; display: inline-block; padding: 0; font-size: 18px; line-height: 38px; text-decoration: none; text-align: left"><a href="k_line.php">一般搜尋</a></s></li>
			
			<li><s style="background-color: #DDDDDD; display: inline-block; padding: 0; font-size: 18px; line-height: 38px; text-decoration: none; text-align: left"><a href="search.php">進階搜尋</a></s></li>

			<li><s style="background-color: #DDDDDD; display: inline-block; padding: 0; font-size: 18px; line-height: 38px; text-decoration: none; text-align: left"><a href="profile.php">個人頁面</a></s></li>
            <li><a class="smoothscroll" href="#features">系統特色</a></li>

            <li><a class="smoothscroll" href="#charts">歷史績效</a></li>
            <li><a class="smoothscroll" href="#news">新聞瀏覽</a></li>
         </ul> <!-- end #nav -->

      </nav> <!-- end #nav-wrap -->

   </header> <!-- Header End -->


   <!-- Homepage Hero
   ================================================== -->
   <section id="hero">

	   <div class="row">
<b style="float:left; margin-left:10%; color:white; font-size:40px; line-height:50px;"><?php echo $name ?>，您好 </b>

		   <div class="twelve columns">

			   <div class="hero-text">
				   <h1 class="responsive-headline" style="font-weight:300;">以深度學習預言<br/>可獲利之最適投資組合</h1>
				
			   </div>

            <div class="buttons">
               <a class="button trial" href="logout.php">登出</a>

            </div>


		   </div>

	   </div>

   </section> <!-- Homepage Hero end -->


   <!-- Features Section
   ================================================== -->
   <section id='features'>

      <div class="row feature design">

         <div class="six columns right">
            <h3 style="font-size:36px; line-height:46px;"><br>源自於Google的機器學習———強大、可靠</h3>

            <p>
				<pre style="font-size:22px; line-height:30px;">
	Tensorflow 是由 Google Brain 團隊開發的開源(Open source)軟體庫，支援許多感知、語言理解的機器學習，也用於研究及開發 Google 商業產品，功能強大而完整。</pre>
            </p>
         </div>

         <div class="six columns feature-media left">
             <img src="images/tensorflow.png" alt="" />
         </div>

      </div>

      <div class="row feature responsive">

         <div class="six columns left">
            <h3 style="font-size:36px; line-height:46px;"><br>諾貝爾獎認證的經濟學模型———高效、精準</h3>

            <p>
				<pre style="font-size:22px; line-height:30px;">
	根據個人資產、機器學習結果與效率前緣模型，計算最高效的股票購買組合，兼顧獲利與風險規避，形成最適投資配置。</pre>
            </p>
         </div>

         <div class="six columns feature-media right">
             <img src="images/efficient frontier.png" alt="" />
         </div>

      </div>

      <div class="row feature cross-browser">

         <div class="six columns right">
            <h3 style="font-size:36px; line-height:46px;"><br>系統化歸納財經資訊———簡單、直覺</h3>

            <p>
			<pre style="font-size:22px; line-height:30px;">	以爬蟲抓取相關資料，並儲存於資料庫中，提供一般及進階搜尋，股票詳細資訊有條不紊、一覽無遺。</pre>
            </p>
         </div>

         <div class="six columns feature-media left">
             <img src="images/sap_opentxt_01.png" alt="" />
         </div>

      </div>

      <!--<div class="row feature video">

         <div class="six columns left">
            <h3>Video Support.</h3>

            <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
            enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu.
            Quis nostrum exercitationem ullam corporis suscipit laboriosam. No soleat fabulas prodesset vel, ut quo solum dicunt. Nec et amet vidisse mentitum. Cibo mutat nulla ei eam.
            </p>
         </div>

         <div class="six columns feature-media right">
             <div class="fluid-video-wrapper">
                  <iframe src="http://player.vimeo.com/video/14592941?title=0&amp;byline=0&amp;portrait=0&amp;color=F64B39" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> 
             </div>
         </div>

      </div>-->

   </section> <!-- Homepage Hero end -->


   <!-- Charts Section
   ================================================== -->
   <section id="charts">

      <div class="row">
		
		<div class="section-head">
			
			<h1 style="color: #fff;font-weight:100;margin-bottom:30px;">歷史績效</h1>
			
		</div>
		
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		
		<script src="https://code.highcharts.com/highcharts.js"></script>
		
		<script src="https://code.highcharts.com/modules/exporting.js"></script>

		<div id="container" style="min-width: 310px; height: 400px;"></div>

		<script src="charts_generation.js"></script>

      </div>

   </section> <!-- Charts Section End-->


   <!-- News
   ================================================== -->
   <section id="news">

      <div class="row section-head">

         <h1>新聞瀏覽</h1>

      </div>
	  
	  
	  <div class="news-container">
	  
		<div class="news-section" onclick="window.open('https://tw.news.yahoo.com/%E5%8F%B0%E7%A9%8D%E9%9B%BB%E5%95%83%E8%98%8B%E6%9E%9C-%E5%A4%96%E8%B3%87%E7%9C%8B%E5%A5%BD2019%E5%B9%B4%E5%AE%8C%E5%B0%81%E4%B8%89%E6%98%9F-044024729--finance.html')">
		
			<a><img src="images/news/1.jpg"></a>
			
			<b>台積電啃蘋果 外資看好2019年完封三星</b>
			
			<c>2018年01月03日</c>
			
		</div>
		
		<div class="news-section" onclick="window.open('https://tw.news.yahoo.com/%E6%AF%94%E7%89%B9%E5%B9%A3%E9%A3%86%E6%BC%B2%E6%9C%89%E5%AE%B3%E7%92%B0%E5%A2%83-050355004.html')">
		
			<a target="_blank"><img src="images/news/2.jpg"></a>
			
			<b>比特幣飆漲有害環境？</b>
			
			<c>2018年01月03日</c>
		
		</div>
		
		<div class="news-section" onclick="window.open('https://tw.news.yahoo.com/%E6%97%A5%E5%9C%93%E8%B7%B3%E6%B0%B4%E5%89%B5%E9%80%BE2%E5%B9%B4%E6%96%B0%E4%BD%8E-5%E8%90%AC%E5%8F%B0%E5%B9%A3%E5%8F%AF%E5%A4%9A%E6%8F%9B1%E8%90%AC%E6%97%A5%E5%9C%93-024954709.html')">
		
			<a target="_blank"><img src="images/news/3.jpg"></a>
			
			<b>日圓跳水創逾2年新低 5萬台幣可多換1萬日圓</b>
			
			<c>2018年01月03日</c>
			
		</div>
		
		<div class="news-section" onclick="window.open('https://tw.news.yahoo.com/%E5%8F%B0%E8%82%A1%E9%9B%99%E7%8E%8B%E9%A0%98%E8%BB%8D%E9%9C%87%E7%9B%AA%E8%B5%B0%E9%AB%98-%E6%94%B6%E7%9B%A4%E7%AB%99%E4%B8%8A10700%E9%BB%9E%E5%A4%A7%E9%97%9C-061818204.html')">
		
			<a target="_blank"><img src="images/news/4.jpg"></a>
			
			<b>台股雙王領軍震盪走高 收盤站上10700點大關</b>
			
			<c>2018年01月03日</c>
			
		</div>
		
		<div class="news-section" onclick="window.open('https://tw.news.yahoo.com/%E8%A1%8C%E5%8B%95%E6%94%AF%E4%BB%98%E5%B7%B2%E6%88%90%E8%B6%A8%E5%8B%A2-%E9%87%91%E7%AE%A1%E6%9C%83%E6%96%B0%E6%94%BF%E7%AD%96%E6%8F%90%E9%AB%98%E4%BE%BF%E5%88%A9%E6%80%A7-045229604.html')">
		
			<a target="_blank"><img src="images/news/5.jpg"></a>
			
			<b>行動支付已成趨勢 金管會新政策提高便利性</b>
			
			<c>2018年01月03日</c>
			
		</div>
		
		<div class="news-section" onclick="window.open('https://tw.news.yahoo.com/%E8%A1%9D%E7%A0%B4%E4%BD%8E%E8%96%AA-%E6%94%BF%E5%BA%9C%E7%B5%A6%E4%BC%81%E6%A5%AD%E5%8A%A0%E8%96%AA%E7%94%9C%E9%A0%AD-%E5%AD%B8%E8%80%85%E4%B8%8D%E7%9C%8B%E5%A5%BD-032214873.html')">
		
			<a target="_blank"><img src="images/news/6.jpg"></a>
			
			<b>衝破低薪 政府給企業加薪甜頭 學者不看好發</b>
			
			<c>2018年01月03日</c>
			
		</div>
	  
	  </div>


   </section> <!-- news End -->

   
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

   <script src="js/jquery.flexslider.js"></script>
   <script src="js/waypoints.js"></script>
   <script src="js/jquery.fittext.js"></script>
   <script src="js/jquery.fitvids.js"></script>
   <script src="js/imagelightbox.js"></script>
   <script src="js/jquery.prettyPhoto.js"></script>   
   <script src="js/main.js"></script>

</body>

</html>

