<?php
    $name=trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));
    $password=trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));
// Проверка
    if(strlen($name)<2){
        echo "Name error";
        exit;}
    if(strlen($password)<2){
        echo "Password error";
        exit;}
 
//Password
$security="02k*DO-si390";
$password=md5($security.$password);

//DB
require "dbconnect.php";

// Auth user
$sql='SELECT id FROM users WHERE username=? AND password=?';
$query=$pdo->prepare($sql);
$query->execute([$name, $password]);
$showAlert=true;

if($query->rowCount()==0) {
    echo "Такого пользователя не существует";
}
else {
    setcookie('name', $name, time()+3600*24*30, "/"); // cookie на 30 дней: 3600сек * 24 = 24ч, 24ч * 30 = 30 дней
    header('Location: /user.php'); 
}


?>