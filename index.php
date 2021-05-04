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

   if ($_POST) {

     $name=@$_POST['name'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $passwordmd5=md5($password);

     $user=$database->prepare("INSERT into user set

        name=:name,
        email=:email,
        password=:password
     ");
     $insert=$user->execute(array(
       'name'=>$name,
       'email'=>$email,
       'password'=>$passwordmd5
     ));

     if ($insert) {
       echo "başarıyla kayıt oldun";
     }else{
       echo "sistemsel hata !!";
     }
   }

   // INSERT into kayıt etmek
   // DELETE silme işlemi
   // UPDATE güncellleme
   // SELECT * FROM listeleme


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h3> Kayıt İşlemi </h3>
  <form class="" method="post">
   <input type="text" name="name" placeholder="Kullanıcı Adınız" required><br><br>
   <input type="text" name="email" placeholder="Email Adresiniz" required><br><br>
   <input type="text" name="password" placeholder="Şifreniz" required><br>
   <!-- required ifadesi şart koşuludur. -->
<br>
   <button type="submit">Kayıt Ol</button>

  </form>

  <h3> Giriş İşlemi </h3>
  <form class="" action="login.php" method="post">
   <input type="text" name="email" placeholder="Email Adresiniz" required><br><br>
   <input type="text" name="password" placeholder="Şifreniz" required><br>
   <!-- required ifadesi şart koşuludur. -->
<br>
   <button type="submit" name="girisyap">Giriş Yap</button>

  </form>
</body>
</html>
