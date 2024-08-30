<?php
include "config.php"; // Include the database connection file

session_start();
// Get the employee ID from the query parameter
$employeeId = $_SESSION["user_id"];
$passiveAdmin = $_SESSION["passiveAdmin"];

// Fetch employee details from the database based on the ID
$sql = "SELECT * FROM user_details WHERE user_id = '$employeeId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeFirstname = $row['Firstname'];
    $employeeLastname = $row['Lastname'];
    $employeeFullname = $row['Firstname']. " " . $row['Lastname'];
    $employeeEmail = $row['Email'];
    $employeePassword = $row['Password'];
    $employeePhone = $row['Phonenumber'];
    $employeeAddress = $row['Address'];

} else {
    echo "Employee not found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $employeeFullname; ?>'s Profile</title>
    <link rel="stylesheet" href="./css/user-profile.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container rounded bg-white mt-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="./images/user-profile.webp" width="90"><span class="font-weight-bold"><?php echo $employeeFirstname; ?></span><span class="text-black-50"><?php echo $employeeEmail; ?></span><span><?php echo $employeeAddress; ?></span></div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back">
                            <i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                            <a href="./dashboard.php" class="mb-1 text-decoration-none text-body">Back to home</a>
                        </div>
                        <h6 class="text-right">Edit Profile</h6>
                    </div>
                    <form action="user_profile.php" method="POST">
                        <div class="row mt-2">
                                <div class="col-md-6"><input type="text" class="form-control" placeholder="first name" value="<?php echo $employeeFirstname; ?>" name="first_name"></div>
                                <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $employeeLastname; ?>" placeholder="Lastname" name="last_name"></div>
                        </div>
                        <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" placeholder="Email" value="<?php echo $employeeEmail; ?>" name="email"></div>
                                <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $employeePhone; ?>" placeholder="Phone number" name="phone_number"></div>
                        </div>
                        <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" placeholder="address" value="<?php echo $employeeAddress; ?>" name="address"></div>
                                <div class="col-md-6"><input type="password" id="passwordField" class="form-control" value="<?php echo $employeePassword; ?>" placeholder="Password" name="Password"><button id="togglePassword" type="button">Show</button></div>
                        </div>
                        </div>
                        <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit" name="submit">Save Profile</button></div>
                        </div>
                    </form>
                    
            </div>
    </div>
    <!-- </div> -->
    <script>
        const passwordField = document.getElementById('passwordField');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', () => {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            togglePassword.textContent = 'Hide';
        } else {
            passwordField.type = 'password';
            togglePassword.textContent = 'Show';
        }
        });

    </script>
</body>
</html>
<?php 
    include "config.php";
    // session_start();


    // Get the employee ID from the query parameter
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $newFirstname = $_POST["first_name"];
        $newLastname = $_POST["last_name"];
        $newEmail = $_POST["email"];
        $newPassword = $_POST["Password"];
        $newPhone = $_POST["phone_number"];
        $newAddress = $_POST["address"];
        $userId = $_SESSION["user_id"];

        $updateQuery = "UPDATE user_details SET Firstname = '$newFirstname', Lastname = '$newLastname', Email = '$newEmail', Phonenumber = '$newPhone', Address = '$newAddress', Password = '$newPassword', first_login = '0', passiveAdmin = '$passiveAdmin' WHERE user_id = '$userId'";
        
        
        if ($conn->query($updateQuery) === TRUE) {
            echo '<script type ="text/JavaScript">'; 
            echo 'alert("Profile Updated successfully!")';
            echo '</script>';
        } else {
            echo "Error updating profile: " . $conn->error;
        }
    
        $conn->close();
    }
?>
