<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.css">
    <script src="bootstrap-4.5.3-dist/jquery.min.js"></script>
    <script src="bootstrap-4.5.3-dist/js/bootstrap.bundle.js"></script>
    
    <link rel="stylesheet" href="Style.css"> 
    <title>Profile Page</title>
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
        echo '<a href="index.php">Home</a>';?>

            <div class="input-group" style="width: 40%; margin: auto;margin-top:-3%; padding-bottom:1%;">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
              aria-describedby="search-addon" />
            <button type="button" style="color: white;" class="btn btn-outline-primary">Search</button>
          </div>
        </div>
          <center>
              <br><br><br>
          <form action="#" method="POST" style=width:50%;text-align:left; onsubmit="return CHECK_Data()" class="RegisForm" >
                <div>
                    Nama 
                    <?php
                    echo '<span><input name="nama" type="text" placeholder="'.$row["Nama"].'" class="form-control input-sm" id="Name" ></span>'
                    ?>
                    <span class="error" id="Name_Error"></span>
                </div>
                <br>
                <div>
                    Gender<br>
                    <?php
                    if($row["Gender"]=="Male"){
                    echo'
                    <span><input type="radio" name="Radio" checked="checked" id="RadioM" value="Male">Male 
                    <input type="radio" name="Radio" id="RadioF" value="Female">Female</span><br>';}
                    else{
                    echo'
                    <span><input type="radio" name="Radio" id="RadioM" value="Male">Male 
                    <input type="radio" name="Radio" checked="checked" id="RadioF" value="Female">Female</span><br>';
                    }
                    ?>
                </div>
                <br>
                <div>
                    Address<br>
                    <?php
                    echo '<span><textarea name="Add" placeholder="'.$row["Alamat"].'" class="form-control input-sm" id="Address"></textarea></span>';
                    ?>
                    <span class="error" id="Address_Error"></span>
                </div>
                <br>
                <div>
                    Phone
                    <?php
                    echo'<span><input name="Num" type="number" placeholder='.$row["Nomor"].' class="form-control input-sm" id="Number" name="Num" ></span>';
                    ?>
                    <span class="error" id="Number_Error"></span>
                </div>
                <br>
                <div>
                    Email<br>
                    <?php
                    echo '<h4>'.$row["Email"].'</h4>';
                    ?>
                </div>
                <br>
                <center>
                <button type="submit" name="Update" class="btn btn-primary" >Update</button><br><br><?php
                
                // UPDATE Profile
                if(isset($_POST['Update'])){
                if(!empty($_POST['nama'])){
                    
                    $Name = $_POST['nama'];
                    $UpdateName = "UPDATE user SET Nama = (?) WHERE ID = ". $_SESSION['ID'];
                    $stmt = $connect->prepare($UpdateName);
                    $stmt->bind_param("s", $Name);
                    $stmt->execute();
                }

                if(!empty($_POST['Radio'])){
                    $Gender = $_POST['Radio'];
                    $UpdateRadio = "UPDATE user SET Gender = (?) WHERE ID = ". $_SESSION['ID'];
                    $stmt = $connect->prepare($UpdateRadio);
                    $stmt->bind_param("s", $Gender);
                    $stmt->execute();
                }

                if(!empty($_POST['Add'])){
                    $Address = $_POST['Add'];
                    $UpdateAdd = "UPDATE user SET Alamat = (?) WHERE ID = ". $_SESSION['ID'];
                    $stmt = $connect->prepare($UpdateAdd);
                    $stmt->bind_param("s", $Address);
                    $stmt->execute();
                }

                if(!empty($_POST['Num'])){
                    $Phone = $_POST['Num'];
                    $UpdateNum = "UPDATE user SET Nomor = (?) WHERE ID = ". $_SESSION['ID'];
                    $stmt = $connect->prepare($UpdateNum);
                    $stmt->bind_param("i", $Phone);
                    $stmt->execute();
                }

                $message= "Profile Updated";
                echo "<script type='text/javascript'>alert('$message');
                window.location.replace('Profile.php');
                </script>";
            }
                
                ?>
        </div>
                <a class="btn btn-primary" href="Logout.php" >Logout</a><br><br>
            </form>

                <div class="footer">
        <center>
            <div>For More Information</div><br>
            <a href="#"> <img  src="Asset/instagram.png"></a>&nbsp;&nbsp;
            <a href="#"> <img  src="Asset/twitter.png"></a><br><br>
            <div>&copy; 2021 RentalKuy. All Right Reserved.</div><br>
            <div>Legal | Privacy Policy</div><br><br>
        </center> 
        
 </div>
    <script>
    function CHECK_Data(){  

    let result = true

    let Name = document.getElementById('Name').value
    let Address = document.getElementById('Address').value
    let Number = document.getElementById('Number').value

    let Name_Error = document.getElementById('Name_Error')
    let Address_Error = document.getElementById('Address_Error')
    let Number_Error = document.getElementById('Number_Error')


    if(Name == 0){
        Name_Error.innerHTML = ""
    }
    else if(Name.length <3){
        Name_Error.innerHTML = "Minimal 3 Huruf"
        result = false
    }
    else{
        Name_Error.innerHTML = ""
    }

    if(Address == 0){
        Address_Error.innerHTML = ""
    }
    else if(Address.length < 10){
        Address_Error.innerHTML = "Minimal 10 Karakter"
        result = false
    }
    else{
        Address_Error.innerHTML = ""
    }

    if(Number == 0){
        Number_Error.innerHTML = ""
    }
    else if(Number.length < 10){
        Number_Error.innerHTML = "Minimal 10 Karakter"
        result = false
    }
    else{
        Number_Error.innerHTML = ""
    }

    return result
    }

</script>
</body>
</html>