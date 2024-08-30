<?php 
    session_start();
    $name =  $_SESSION["firstName"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/user.css">
    <link rel="stylesheet" href="./css/save.scss">
</head>
<body>
    <section class="et-hero-tabs" >
        <h1>View Users</h1>
        <h3>You can View and onboard users easily below</h3>
        <div class="et-hero-tabs-container">
        <a class="et-hero-tab" href="save.php" style="text-decoration: none;">HOME</a>
        <a class="et-hero-tab" href="view_invoices.php" style="text-decoration: none;">VIEW INVOICES</a>
        <a class="et-hero-tab" href="#users" style="text-decoration: none;">USERS</a>
        <a class="et-hero-tab" href="logout.php" style="text-decoration: none;">lOGOUT</a>
        <span class="et-hero-tab-slider" style="text-decoration: none;"></span>
        </div>
    </section>
    <div id="users">
        <h1 class="cancel-heading">Users</h1>
        <div class="container" id="userContainer"></div>
        
       <div class="add-users">
            <h3>Onboard Users</h3>
            <form method="post" action="users.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User's Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                </div>
                <button type="submit" class="btn btn-primary" name="button">Add User</button>
            </form>
       </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('fetchUsers.php')
                .then(response => response.json())
                .then(data => {
                    const users = data.users;
                    const userContainer = document.getElementById('userContainer');
                    userContainer.innerHTML = ''; 

                    users.forEach(user => {
                        const admin = user.is_admin;
                        const userCard = `
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">${user.FirstName} ${user.LastName} 
                                        ${admin == 1 ? "(Admin)" : ""}
                                    </h5>
                                    <p class="card-text">Email: ${user.Email}</p>
                                    <a href="deleteUser.php?id=${user.user_id}" class="btn btn-primary">Delete User</a>
                                    <button class="btn btn-primary make-admin-btn" data-user-id="${user.user_id}">Make Admin</button>
                                </div>
                            </div>
                        `;
                        userContainer.innerHTML += userCard;
                    });

                    // Add event listeners to all 'Make Admin' buttons
                    document.querySelectorAll('.make-admin-btn').forEach(button => {
                        button.addEventListener('click', function() {
                            const userId = this.getAttribute('data-user-id');
                            makeUserAdmin(userId);
                        });
                    });
                })
                .catch(error => console.error('Error fetching users:', error));
        });

        function makeUserAdmin(userId) {
            fetch('makeAdmin.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `user_id=${userId}`,
            })
            .then(response => response.text())
            .then(result => {
                alert(result); // Show a success or error message
                location.reload(); // Reload the page to see the changes
            })
            .catch(error => console.error('Error making user admin:', error));
        }
    </script>

</body>
</html>

<?php 
include "config.php";

if (isset($_POST["button"])) {
    // Validate the email input
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script type="text/JavaScript">'; 
        echo 'alert("Invalid email address!")';
        echo '</script>';  
    } else {
        // Prepare an SQL statement to prevent SQL injection
        $sql = "INSERT INTO users (FirstName, LastName, Email, Password, is_admin) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        
        $firstName = '';
        $lastName = '';
        $password = '';
        $id_admin = 0;

        // Bind parameters to the prepared statement
        $stmt->bind_param("ssssi", $firstName, $lastName, $email, $password, $id_admin);

        if ($stmt->execute()) {
            echo '<script type="text/JavaScript">'; 
            echo 'alert("User successfully onboarded!")';
            echo '</script>';  
        } else {
            echo '<script type="text/JavaScript">'; 
            echo 'alert("Error onboarding user: ' . $stmt->error . '")';
            echo '</script>';  
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}

?>
