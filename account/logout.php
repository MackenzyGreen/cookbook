<?php 

    session_start();
    session_destroy();

    header("location: /cookbook/index.php");

?>