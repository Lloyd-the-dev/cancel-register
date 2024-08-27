<?php 
require "./conn.php";
    if(isset($_POST['button'])){
        $name = $_POST["name"];
        if(isset($_FILES['file'])){
            if($_FILES['file']['type'] == "application/pdf"){
                $img=$_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], './images/'.$img);
                // echo "Image Moved";
            }else {
                echo "This system only supports pdf files";
                return false;
            }
            if(!empty($name)){
                pdf::insert($name, $img);
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
    <title>Dashboadr</title>
</head>
<body>
    <h1>Welcome Omoiya</h1>

    <div class="alerts">
            <?php 
                if(count(pdf::$alerts)>0){
                    $alert = pdf::$alerts;
                    foreach($alert as $value) {
                        echo $value;
                    }
                } else {
                    echo 'No alerts';
                }
            ?>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="pdf">Enter your name ser</label>
            <input type="text" name="name" placeholder="name">
            <input type="file" name="file">
            <input type="submit" name="button" value="Register">
        </form>


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
</body>
</html>