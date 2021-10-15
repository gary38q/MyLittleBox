<?php
    $Name = $_POST['nama'];
    $Gender = $_POST['Radio'];
    $Address = $_POST['Add'];
    $Number = $_POST['Num'];
    $email = $_POST['email'];
    $password = $_POST['Password'];
    $salt = "Garam";
    $password = md5($salt.$password);
    
    include('Connect.php');
    if(!$connect)
    {
        die ("tidak bisa connect").mysqli_error($connect);
    }

    $SELECT = "SELECT email From user Where email = ? Limit 1";
    $INSERT = "INSERT INTO user (Email, Nama, Gender, Alamat, Nomor, Password) 
    VALUES (?,?,?,?,?,?)";

    $stmt = $connect->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum==0) {
            $stmt->close();
            $stmt = $connect->prepare($INSERT);
            $stmt->bind_param ("ssssis" , $email, $Name, $Gender, $Address, $Number, $password);
            $stmt->execute();
            
            $message = "Register Successful";
            echo "<script type='text/javascript'>alert('$message');
            window.location.replace('Login.html');
            </script>";
        
    }
        else {
            $message = "Someone already use this Email or Username";
            echo "<script type='text/javascript'>alert('$message');
            window.location.replace('Register.html');
            </script>";
            
       }

       $stmt->close();
       $connect->close();

?>