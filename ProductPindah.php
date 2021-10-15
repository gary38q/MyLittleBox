<?php
    $id = $_GET['myid'];
    $jumlah = $_POST['quantity'];
    
    echo "<script type='text/javascript'>
            window.location.replace('Checkout.php?myid=$id&jumlah=$jumlah');
            </script>";

?>