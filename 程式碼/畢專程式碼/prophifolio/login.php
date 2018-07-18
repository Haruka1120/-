<?php
    ini_set("display_errors", "On");
session_start();
    
$username =$_POST['username'];
$password =$_POST['password'];
    
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
    
    //假如帳號密碼都對
    if(($row['account_number'] == $username) && ($row['password'] == $password)){
       
        
        
      
        
        $_SESSION['account_number'] = $username;
     

     echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
        
   }    else {
       echo "帳號或密碼錯誤";
       echo $username;
       echo $password;
       echo $row['account_number'];

    

       echo '<meta http-equiv=REFRESH CONTENT=1;url=login.html>';

   }
   
?>


