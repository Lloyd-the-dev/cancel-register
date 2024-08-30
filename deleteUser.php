<?php  
  include "config.php";

  if(isset($_GET["id"])){
    $userId = $_GET["id"];

    $deleteQuery = "DELETE FROM users WHERE user_id = $userId";

    if($conn-> query($deleteQuery) === TRUE){
        header("Location: users.php");
        exit();
    } else {
        echo "Error Deleting row: " .$conn->error;
    }
    $conn-> close();
  }


?>