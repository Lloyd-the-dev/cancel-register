<?php 
    include "config.php";

    if(isset($_POST["button"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 1){
            session_start();
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["firstName"] = $row["First Name"];
            header("Location: save.php");
        } else {
            echo '<script type="text/JavaScript">';
            echo 'alert("Invalid credentials, Contact an admin");';
            echo 'window.location.href = "index.php";'; // Redirect after displaying the alert
            echo '</script>';
        }

        $conn->close();
    }

?>