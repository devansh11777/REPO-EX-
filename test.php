<?php
// if($_SERVER["REQUEST_METHOD"]=="POST"){
//     $name=$_POST["name"];
//     $email=$_POST["email"];
//     echo "The name is $name and email is $email";
// }
// else{
//     echo "invalid request";
// }
IF ($_SERVER["REQUEST_METHOD"]=="POST"){
    $error=[];
    if(empty($_POST["name"])){
        $errors[]="name is required";
    }
    else{
        $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
        if(!preg_match("/^[a-zA-Z]*$/",$name)){
        $errors[]="Only letters and spaces are allowed";
    }
}
if(empty($_POST["email"])){
    $errors[]="email is required";
}
else{
    $email=filter_var(trim($_POST["email"]),FILTER_SANITIZE_EMAIL);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[]="email format is incorrect";
    }
}
if(empty($errors)){
    echo"name is $name and email is $email";
}
else{
    foreach($errors as $e)
    {
        echo"<p style= 'color:red;'>$e</p>";
    }
}
}
else{
    echo"invalid request";
}
?>