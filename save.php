<?php 
require "./conn.php";
session_start();
$name =  $_SESSION["firstName"];
    // if(isset($_POST['button'])){
    //     $name = $_POST["name"];
    //     if(isset($_FILES['file'])){
    //         if($_FILES['file']['type'] == "application/pdf"){
    //             $img=$_FILES['file']['name'];
    //             move_uploaded_file($_FILES['file']['tmp_name'], './images/'.$img);
    //             // echo "Image Moved";
    //         }else {
    //             echo "This system only supports pdf files";
    //             return false;
    //         }
    //         if(!empty($name)){
    //             pdf::insert($name, $img);
    //         } else {
    //             pdf::$alerts[]= 'Please fill the fields';
    //         }
    //     }
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/save.scss">
</head>
<body>
    <section class="et-hero-tabs" >
        <h1>Welcome <?php echo $name; ?></h1>
        <h3>Store all cancelled invoices securely and easily</h3>
        <div class="et-hero-tabs-container">
        <a class="et-hero-tab" href="#home">HOME</a>
        <a class="et-hero-tab" href="#cancel">CANCEL INVOICE</a>
        <a class="et-hero-tab" href="#">VIEW INVOICES</a>
        <a class="et-hero-tab" href="#">lOGOUT</a>
        <span class="et-hero-tab-slider"></span>
        </div>
    </section>
   

    <div class="alerts">
            <?php 
                // if(count(pdf::$alerts)>0){
                //     $alert = pdf::$alerts;
                //     foreach($alert as $value) {
                //         echo $value;
                //     }
                // } else {
                //     echo 'No alerts';
                // }
            ?>
    </div>
    <div class="container rounded bg-white mt-5" id="cancel">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="./img/user-profile.webp" width="90"><span class="font-weight-bold"></span><span class="text-black-50"></span><span></span></div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mt-2">
                                <div class="col-md-6"><input type="text" class="form-control" placeholder="first name" value="" name="first_name"></div>
                                <div class="col-md-6"><input type="text" class="form-control" value="" placeholder="Lastname" name="last_name"></div>
                        </div>
                        <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" placeholder="Email" value="" name="email"></div>
                                <div class="col-md-6"><input type="text" class="form-control" value="" placeholder="Phone number" name="phone_number"></div>
                        </div>
                        <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" placeholder="address" value="" name="address"></div>
                                <div class="col-md-6"><input type="password" id="passwordField" class="form-control" value="" placeholder="Password" name="Password"><button id="togglePassword" type="button">Show</button></div>
                        </div>
                        </div>
                        <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit" name="button">Save Profile</button></div>
                        </div>
                    </form>
                    
            </div>
    </div>
    <!-- <form action="" method="post" enctype="multipart/form-data">
        <label for="pdf">Enter your name ser</label>
        <input type="text" name="name" placeholder="name">
        <input type="file" name="file">
        <input type="submit" name="button" value="Register">
    </form> -->


        <div class="container">
            <?php 
                if(count(pdf::select())>0){
                    $fetch= pdf::select();
                    foreach ($fetch as $value) {
            ?>   
            <a href="images/<?php echo $value["img"]; ?>" download="<?php echo $value["img"]; ?>"><?php echo $value["name"]; ?></a>        
            <?php }
                }
            ?>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="./js/save.js"></script>
</body>
</html>