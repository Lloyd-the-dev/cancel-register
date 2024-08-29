<?php 
require "./conn.php";
session_start();
$name =  $_SESSION["firstName"];

if(isset($_POST['button'])){
    $cancelled = $_POST["cancelled"];
    $replacement = $_POST["replacement"];
    $client = $_POST["client"];
    $amount = $_POST["amount"];
    $vat = $_POST["vat"];
    $reason = $_POST["reason"];
    if(isset($_FILES['file'])){
        if($_FILES['file']['type'] == "application/pdf"){
            $img= $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'],'./img/'.$img);
            // echo "Image Moved";
        }else {
            echo "This system only supports pdf files";
            return false;
        }
        if(!empty($name)){
            
            pdf::insert($cancelled, $replacement, $client, $amount, $vat, $img, $reason, $name);
        } else {
            pdf::$alerts[]= 'Please fill the fields';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/save.scss">
</head>
<body>
    <section class="et-hero-tabs" id="home">
        <h1>Welcome <?php echo $name; ?></h1>
        <h3>Store all cancelled invoices securely and easily</h3>
        <div class="et-hero-tabs-container">
        <a class="et-hero-tab" href="#home" style="text-decoration: none;">HOME</a>
        <a class="et-hero-tab" href="#cancel" style="text-decoration: none;">CANCEL INVOICE</a>
        <a class="et-hero-tab" href="view_invoices.php" style="text-decoration: none;">VIEW INVOICES</a>
        <a class="et-hero-tab" href="#" style="text-decoration: none;">lOGOUT</a>
        <span class="et-hero-tab-slider" style="text-decoration: none;"></span>
        </div>
    </section>
   

   <div class="h-100 p-4 et-slide" id="cancel">
        <div class="alerts">
            <h1 class="alert-heading">
                <?php 
                    if(count(pdf::$alerts)>0){
                        $alert = pdf::$alerts;
                        foreach($alert as $value) {
                            echo $value;
                        }
                    } else {
                        echo '';
                    }
                ?>
            </h1>
        </div>
        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example container rounded bg-white mt-5 mb-5" tabindex="0">
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="mt-5" src="./img/thumbs.png" width="90"><span class="font-weight-bold"></span><span class="text-black-50"></span><span></span></div>
                </div>
                <div class="col-md-8">
                    <div class="p-3 py-5">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mt-2">
                                <div class="col-md-6"><label>Invoice No of Cancelled Invoice</label><input type="number" class="form-control" placeholder="Cancelled" value="" name="cancelled"></div>
                                <div class="col-md-6"><label>Invoice No of Replacement Invoice</label><input type="number" class="form-control" value="" placeholder="Replacement" name="replacement"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label>Client</label><input type="text" class="form-control" placeholder="Client" value="" name="client"></div>
                                <div class="col-md-6"><label>Total Amount</label><input type="number" class="form-control" value="" placeholder="Amount" name="amount"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label>VAT</label><input type="number" class="form-control" placeholder="VAT" value="" name="vat"></div>
                                <div class="col-md-6"><label>Reason</label><input type="text" class="form-control" value="" placeholder="Reason" name="reason"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label>Upload Invoice file below</label>
                                    <input type="file" class="form-control" value="" name="file">
                                </div>
                            </div>
                            </div>
                            <div class="mt-4 text-right"><button class="btn btn-primary profile-button" type="submit" name="button">Upload</button></div>
                            </div>
                        </form>
                        
                </div>
        </div>
   </div>



        <div class="container">
            <?php 
                // if(count(pdf::select())>0){
                //     $fetch= pdf::select();
                //     foreach ($fetch as $value) {
            ?>   
            <!-- <a href="images/<?php //echo $value["img"]; ?>" download="<?php // echo $value["img"]; ?>"><?php // echo $value["name"]; ?></a>         -->
            <?php //}
                //}
            ?>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="./js/save.js"></script>
        
</body>
</html>