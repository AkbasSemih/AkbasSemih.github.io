<?php
require 'baglan.php';
ob_start();
session_start();

if(isset($_POST['kayit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

		$query = "INSERT INTO users(user_name,user_password) VALUES('$username','$password')";

   $res = mysqli_query($db,$query);

		if($res){
			header("location: index.html");
		 }
		 else{
		 	echo "Bir hata oluştu, tekrar kontrol edin";

		 }
	

	}



	if(isset($_POST['giris'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "SELECT * FROM users WHERE user_name = '$username' and user_password = '$password'";

		$sql_check = mysqli_query($db,$query);
 $count = mysqli_num_rows($sql_check);

if($count == 1)  {
    header("location: admin.php");
}
else {
    if($username=="" or $password=="") {
        echo "kullanıcı adı veya şifre boş bırakma>";
    }
    else {
        echo "kulanıcı adı şifren yanlış";
    }
}
}

		
?>