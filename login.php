<!--
  Author: Paradox
  License: MIT LICENSE
  Create History: 04.05.2021
  -->
<?php
try {
  $database= new pdo("mysql:host=localhost;dbname=video;charset=utf8;", "root", "");

} catch (PDOException $e) {

}

if (isset($_POST['girisyap'])) {


  $email=$_POST['email'];
  $password=$_POST['password'];
  $passwordmd5=md5($password);


  $user=$database->prepare("SELECT * FROM user where email=:email and password=:password ");

  $insertx=$user->execute(array(
    'email'=>$email,
    'password'=>$passwordmd5
    ));

  if ($insertx) {
    echo "giriş yapıldı";
  }else{
    echo "x";
  }
}


?>
