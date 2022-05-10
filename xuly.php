<?php
    require_once "config.php";

    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $content = $_POST['content'];

    if($name == ""){echo"vui lòng nhập Họ và tên";}
    if($email == ""){echo"vui lòng nhập email";}
    if($phone == ""){echo"vui lòng nhập số điện thoại";}

    if($name != "" && $email != "" && $phone != ""){
    $sql = "INSERT INTO lienhe(name,email,phone,content) VALUES
    ('$name','$email','$phone','$content')";
    $result = $conn->query($sql);
    }
    if($result!=null){
        header("location:index.php");

    }else{
        header("location:index.php");
    }

    

?>