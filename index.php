<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <script src="bootstrap-4.5.3-dist/jquery.min.js"></script>
    <script src="bootstrap-4.5.3-dist/js/bootstrap.bundle.js"></script>
    
    <link rel="stylesheet" href="Style.css"> 
    <title>Home Page</title>
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
            <div class="input-group" style="width: 40%; margin: auto;margin-top:-3%; padding-bottom:1%;">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
              aria-describedby="search-addon" />
            <button type="button" style="color: white;" class="btn btn-outline-primary">Search</button>
          </div>
    </div>
    </div>

    <div class="w3-content w3-section Slide" style="width:100%; height:20%;">
        <h1 class="mySlides">Gambar Promo 1</h1>
        <h1 class="mySlides">Gambar Promo 2</h1>
        <h1 class="mySlides">Gambar Promo 3</h1>
      </div>
      <br><br><br><br><br><br><br><br><br><br>
      
      
      <div style=margin-left:10%;width:80%>
            <?php
            if($_SESSION !=NULL){
              ?>
            
            <button style="margin-left:80%;margin-bottom: 3%;" class="btn btn-primary"type="button" data-toggle="modal" data-target="#exampleModalCenter" >Add Product</button>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data">
          <div style=text-align:left;>
                    Name 
                    <span><input name="C_Name" type="text" placeholder="Product Name" class="form-control input-sm" id="Name"  required></span>
                    <span class="error" id="Name_Error"></span>
                </div>
                <br>
                <div style=text-align:left;>
                    Harga
                    <span><input name="Cost" type="number" placeholder="5000" class="form-control input-sm" id="Number" name="Num" required></span>
                    <span class="error" id="Number_Error"></span>
                </div>
                <br>
                <div style=text-align:left;>
                    Deskripsi
                    <span><input name="Desc" type="text" placeholder="Description" class="form-control input-sm" id="Desc" required></span>
                    <span class="error" id="Desc_Error"></span>
                </div>
                <br>
                <div style=text-align:left;>
                    Picture
                    <span><input type="file" name="PP"  class="form-control input-sm" accept=".png,.jpg,.jpeg,.gif,.svg" required></span>
                    <span class="error" id="Image_Error"></span>
                </div><br>
            </div>  
            <div class="modal-footer">
                <button type="submit" name="Submit_Product" class="btn btn-primary">Add Product</button>
            </div>
        </form>
            </div>
        </div>
        </div><?php }?>
        <?php

        if(isset($_POST['Submit_Product'])){
                
                    $Name = $_POST['C_Name'];
                    $Cost = $_POST['Cost'];
                    $Desc = $_POST['Desc'];
                    $Penjual = $row['Nama'];
                    $icon = $_FILES['PP']['tmp_name'];
                    $icon_name = $_FILES['PP']['name'];
                    if($icon == true){
                    $icon = base64_encode(file_get_contents(addslashes($icon)));
                    $AddProduct = "INSERT INTO produk (Nama, Harga, Deskripsi, Penjual, Gambar, ImageName) VALUES (?,?,?,?,?,?)";
                    $stmt = $connect->prepare($AddProduct);
                    $stmt->bind_param("sissss", $Name, $Cost, $Desc, $Penjual, $icon, $icon_name);
                    $stmt->execute();
                

                $message= "Product Added Successfully";
                echo "<script type='text/javascript'>alert('$message');
                window.location.replace('index.php');
                </script>";
                }
            }
            
            ?>
<center>
  <div class="container">
                <div class="row">
  <?php
                $query = "SELECT * FROM produk";
                $result = mysqli_query($connect,$query);
                
                while($row = mysqli_fetch_assoc($result)){
                    $name = $row['Nama'];
                    $id = $row['ID'];
                    $Cost = $row['Harga'];
                    $Desc = $row['Deskripsi'];
                    $ImageN = $row['ImageName'];
                    $Image = $row['Gambar'];
      
                echo' 
                <div class="col-sm-3" style="margin-bottom: 15px;">
                <a class="Product" style="box-sizing: border-box;border: 2px solid black;text-decoration:none;color:black;"
                 href="Product.php?myid='.$id.'">
                <div class="baris1">
                    <img  height="auto" width="20%" src=data:Icon;base64,'.$Image.' alt="'.$ImageN.'">
                    <div>'.$name.'</div>
                    <div>Rp.'.$Cost.' / Hari</div>
                </div>
              </a></div>
              ';
                }
                    ?></div></div>
</center>
      <div class="footer">
        <center>
          <br><br>
            <div>For More Information</div><br>
            <a href="#"> <img  src="Asset/instagram.png"></a>&nbsp;&nbsp;
            <a href="#"> <img  src="Asset/twitter.png"></a><br><br>
            <div>&copy; 2021 RentalKuy. All Right Reserved.</div><br>
            <div>Legal | Privacy Policy</div><br><br>
        </center> 
 </div>

        <script>var myIndex = 0;
            carousel();
            
            function carousel() {
              var i;
              var x = document.getElementsByClassName("mySlides");
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
              }
              myIndex++;
              if (myIndex > x.length) {myIndex = 1}    
              x[myIndex-1].style.display = "block";  
              setTimeout(carousel, 5000); // Change image every 2 seconds
            }
            </script>
</body>
</html>