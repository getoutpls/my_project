<?php
    $name=trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));
    $phone=trim(filter_var($_POST['phone'], FILTER_SANITIZE_SPECIAL_CHARS));
    $mail=trim(filter_var($_POST['mail'], FILTER_SANITIZE_SPECIAL_CHARS));
    $password=trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

    if(strlen($name)<2){
        echo "Name error";
        exit;}
    if(strlen($phone)<10){
        echo "Phone error";
        exit;}
    if(strlen($mail)<2 && str_contains($mail, "@")){
        echo "Email error";
        exit;}
    if(strlen($password)<2){
        echo "Password error";
        exit;}
 
//Password
$security="02k*DO-si390";
$password=md5($security.$password);

//DB
require "dbconnect.php";

//INSERT
$sql='INSERT INTO users(username, phone, email, password) VALUES(?,?,?,?)';
$query=$pdo->prepare($sql);
$query->execute([$name,$phone,$mail,$password]);

header('Location: /user.php');
?>