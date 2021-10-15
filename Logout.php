<?php
session_start();

session_unset();
session_destroy();
    $message="Logout Success";
    echo "<script type='text/javascript'>alert('$message');
    window.location.replace('index.php');
    </script>";

?>
