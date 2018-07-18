<!DOCTYPE html>
<html style="height: 30%" lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>註冊會員</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style1.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->

 <form name="form" method="post" id="insert" action="rigister_insert.php" >
                    <div class="row">

                        <div >

                        	<div style="width: 80px height:200px">

	                            <div class="form-botton">
				                   
                                    <div style="width: 80px height:200px">
                                        <h3><font face ="微軟正黑體" size="5">註冊會員</font> </h3>
                                    </div style="width: 80px height:200px">
				                        <div class="form-group">
				                        	<input type="text" name="username" placeholder="username"  id="username">
				                        </div>
										<div class="form-group">
				                        	<input type="text" name="name" placeholder="name"  id="name">
				                        </div>
				                        <div class="form-group">
				                        	<input type="text" name="password" placeholder="請輸入密碼"  id="password">
				                        </div>
				                        <div class="form-group">
				                        	<input type="text" name="con_password" placeholder="請再次輸入密碼"  id="con_password">
				                        </div>
				                       <input type="submit" name="confirm" value="加入我們" onclick="Insert();" />
									   <script>

					var Insert=function(){
					var URLs="rigister_insert.php";
					$.ajax({
                url:URLs,
                data: $("#insert").serialize(),
                type:"POST",
                dataType:'text',
                success: function(msg){
                    switch(msg) {                    
                        case "1":
                          alert("新增成功!")
                            break;
						 
                    }
                }
            });
					}
					
		
					</script>
									   
				                    
			                    </div>
                        	</div>

                        </div>
                    </div>
</form>




        <!-- Javascript -->
 
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
