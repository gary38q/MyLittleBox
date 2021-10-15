<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <script src="bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-4.5.3-dist/jquery.min.js"></script>
    <link rel="stylesheet" href="Style.css"> 
    <title>Checkout Page</title>
</head>
<body>
    <div class="Sliders">
        <img class="Logo" src="Asset/RentalKuy.png">
        <?php

        session_start();
        include('Connect.php');
        
        if($_SESSION !=NULL){
        $query = "SELECT * FROM user WHERE ID=".$_SESSION["ID"];
        $result = mysqli_query($connect,$query);
        $row = mysqli_fetch_array($result);}

        if($_SESSION !=NULL)
        {
          echo '<a href="Profile.php">'.$row["Nama"].'</a>';
          echo '<a href="index.php">Home</a>';
        }
        else {
        echo '<a href="Login.html">Login/Register</a>';
        echo '<a href="index.php">Home</a>';
        }?>
            <div class="input-group" style="width: 40%; float: right; right: 12%; margin-top: 10px;">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
              aria-describedby="search-addon" />
            <button type="button" style="color: white;" class="btn btn-outline-primary">Search</button>
          </div>
    </div>

        <br><br><br>
        <center>
        <?php
        $id = $_GET['myid'];
        $jumlah = $_GET['jumlah'];
        $query1 = "SELECT * FROM produk WHERE ID = $id";
        $result1 = mysqli_query($connect,$query1);
        $rows = mysqli_fetch_array($result1);
            $name = $rows['Nama'];
            $Cost = $rows['Harga'];
            $Desc = $rows['Deskripsi'];
            $Penjual = $rows['Penjual'];
            $ImageN = $rows['ImageName'];
            $Image = $rows['Gambar'];?>
            <div class="Checkout">
                  <div class="ProdukC">
                    <?php
                    echo'<div><b>'.$row['Nama'].'</b></div>
                        <br>
                        <p>'.$row['Alamat'].'</p>
                    
                  </div>'  ?>
                   
            <div>
              <?php
                echo '<div class="ProdukD">
                    <img style="float: left;" src="Asset/Camera.jpg"><br>
                    <div><b>'.$name.'</b></div>
                          <br>
                          <div><b>Rent : Rp. '.$Cost.' / days</b></div>
                          <br>
                          <b>Total Hari : '.$jumlah.'</b>
                          <div style="margin-left: 22.5%;" class="col-lg-2">
                            
            </div>
            <br>
                          
                  </div>
            </div><hr>
            <br><br><b  r>
            <div class="ProdukC">
                <br><br>
                <div><b>Total Harga Rp. '.$jumlah*$Cost.'</b></div>'?>
                    <br>
                    <button style="background-color: #225199;color: white;" type="button" class="btn">Pilih pembayaran</button>
              </div>  
        </center>
    </div>

    <div class="footer">
        <center>
          <br><br><br>
            <div>For More Information</div><br>
            <a href="#"> <img  src="Asset/instagram.png"></a>&nbsp;&nbsp;
            <a href="#"> <img  src="Asset/twitter.png"></a><br><br>
            <div>&copy; 2021 RentalKuy. All Right Reserved.</div><br>
            <div>Legal | Privacy Policy</div><br><br>
        </center> 
 </div>
    
</body>
</html>