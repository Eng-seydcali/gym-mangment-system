<?php session_start();
include "conn/functions.php";
if(isset($_POST["login_btn"])){
    $Userinfo = readAllWhere("*","user",$_POST["username"],"username");
    $user = $Userinfo[0]->username;
    $pass = $Userinfo[0]->password;

    if($user == $_POST["username"] && $pass == md5($_POST["password"]) && $Userinfo[0]->status == "1"){
        foreach($Userinfo [0] as $key => $val){
            $_SESSION[$key]= $val;
        }
        if($Userinfo[0]->role_id == 1){
            header("location:home.php");
        }else{
            header("location:customer.php");
        }
    }else{
        header("location:index.php?msg=Invalid Username Or Password");
    }

    // print_r($Userinfo);
}



// header("location:home.php");

?>