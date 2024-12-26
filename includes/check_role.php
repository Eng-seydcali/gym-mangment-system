<?php
session_start();
if( isset($_SESSION["role_id"]) && $_SESSION["role_id"] == 2){
    header("location:404.php");
}
session_write_close();
?>