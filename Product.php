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
    <title>Product Page</title>
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

    <br><br>

    <div class="ProdukD">
        <?php
        $id = $_GET['myid'];
        $query1 = "SELECT * FROM produk WHERE ID = $id";
        $result1 = mysqli_query($connect,$query1);
        $rows = mysqli_fetch_array($result1);
            $name = $rows['Nama'];
            $Cost = $rows['Harga'];
            $Desc = $rows['Deskripsi'];
            $Penjual = $rows['Penjual'];
            $ImageN = $rows['ImageName'];
            $Image = $rows['Gambar'];
            
            
        echo '<div style="float: left; width: 34%;">
        <img  height="auto" width="60%" src=data:Icon;base64,'.$Image.' alt="'.$ImageN.'"><br></div>
        <br><br><br><br>
        <div><h3><b>'.$name.'</b></h3></div>
              <div><b>Rent : Rp. '.$Cost.' / days</b></div>
              <b>Total Hari</b>
              <div style="margin-left: 23%;" class="col-lg-3">
        <form action="ProductPindah.php?myid='.$id.'" method = POST>
                <div style="margin-left: 37%;" class="input-group">
            <span class="input-group-btn butt">
                <button type="button" class="quantity-left-minus btn btn-number"  data-type="minus" data-field=""><img src="Asset/minus.png"></button>
            </span>
            <input style="text-align: center;" type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
            <span class="input-group-btn butt">
                <button type="button" class="quantity-right-plus btn btn-number" data-type="plus" data-field=""><img src="Asset/plus.png"></button>
            </span>
        </div>'?>
            <?php
            if($_SESSION !=NULL){
                echo'<button style="margin-left: 45%; 
                padding: 5px 65px 5px 65px; background-color: #225199;color: white;" type="submit" class="btn">Rent</button></a>';
            }
            else{
                echo'<a href="Pindah.php"><button style="margin-left: 45%; 
                padding: 5px 65px 5px 65px; background-color: #225199;color: white;" type="button" class="btn">Rent</button></a>';
            }
        ?>
        </form>
        <br>
        
        </div>
        <div>
            <h4><b>Description</b></h4>
            <?php
            echo $Desc
            ?>
            <br>
            <b>
            <p>Status: Free</p>
            <p>Minimal time for rent: one day</p>
            <p>Maximal time for rent: one week</p>
            </b>
        </div>
    </div>

    <div class="Checkout">
        <div class="ProdukC">
            <?php
          echo '<div style="font-size: 30px;"><img style="width: 15%;" src="Asset/orang.png">'.$Penjual.' '?>
            <button style="background-color: #225199;color: white;" type="button" class="btn">Follow</button></div>
              <br>
        </div>  

    <div  class="footer">
        <center>
          <br><br><br>
            <div>For More Information</div><br>
            <a href="#"> <img  src="Asset/instagram.png"></a>&nbsp;&nbsp;
            <a href="#"> <img  src="Asset/twitter.png"></a><br><br>
            <div>&copy; 2021 RentalKuy. All Right Reserved.</div><br>
            <div>Legal | Privacy Policy</div><br><br>
        </center> 
 </div>
 
        <script>
            $(document).ready(function(){
    
    var quantitiy=0;
       $('.quantity-right-plus').click(function(e){
            
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
                
                
                if (quantity < 7){
                    $('#quantity').val(quantity + 1);
                }
              
                // Increment
            
        });
    
         $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
          
                // Increment
                if(quantity>0){
                $('#quantity').val(quantity - 1);
                }
        });
        
    });
        </script>
</body>
</html>