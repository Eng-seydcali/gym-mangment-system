<?php session_start();

if(!$_SESSION["id"]){
    header("location:index.php?msg=Please Login");
}

include "conn/functions.php";
include "includes/head.php";
include "includes/sidebar.php";
include "includes/topbar.php";



?>