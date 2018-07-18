<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
    
$name =$_POST['name'];
//echo $comname;
 
$phone =$_POST['phone'];

$email =$_POST['email'];
//echo $email;

$username=$_POST['username'];
//echo $mem_id;


$password=$_POST['password'];
//echo $password;
    
$con_password = $_POST['con_password'];

$a = $_POST['a'];
$a = implode (",", $a);
$b = $_POST['b'];
$b = implode (",", $b);
$c = $_POST['c'];
$c = implode (",", $c);
$d = $_POST['d'];
$d = implode (",", $d);
$e = $_POST['e'];
$e = implode (",", $e);
$f = $_POST['f'];
$f = implode (",", $f);
$g = $_POST['g'];
$g = implode (",", $g);
$total = (int)$a + (int)$b +(int)$c+(int)$d+(int)$e+(int)$f+(int)$g;

    if ((int)$total < 10){
        $total = 1;
    }
    if ((int)$total >= 10 && (int)$total < 21){
        $total = 2;
    }
    if ((int)$total >= 21){
        $total = 3;
    }

$conn = mysqli_connect("127.0.0.1","work","w0rk@ncyu");//連接伺服器

    
//mysql_connect("127.0.0.1", "root", "qazwsxedc"); //連接伺服器
 mysqli_select_db($conn,"Prophifolio");//選擇資料庫
 mysqli_query($conn,"set names utf8");//讓資料可以讀取中文
 
    $sql2 = "SELECT account_number FROM member WHERE account_number ='".$username."'";
    $result = mysqli_query($conn,$sql2);
    
    if($con_password==$password){
        
    
        if ($result){
            if(mysqli_num_rows($result)>0){
                echo '帳號已註冊過';
            }else{
                $sql  = 'INSERT INTO member  VALUES (\'' . $username . '\', \'' . $password . '\', \'' .$name.'\', \''.$total .'\', \'' .$email.'\', \''.$phone.'\')';
                
                $result = mysqli_query($conn,$sql);
                echo '註冊成功';
                
            }
        }else{}
   
        
    }else{
        
        echo "二次輸入密碼不一樣";
        
    }
    


?>
