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