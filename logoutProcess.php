<?php
 session_start();

 if(isset($_SESSION["Admin"])){
    $_SESSION["Admin"]=null;
    session_destroy();
    echo("success");
 }
?>