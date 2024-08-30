<?php 
include "config.php";

if (isset($_POST['user_id'])) {
    $userId = intval($_POST['user_id']);

    $makeAdminQuery = "UPDATE users SET is_admin = 1 WHERE user_id = ?";
    $stmt = $conn->prepare($makeAdminQuery);
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        echo "User successfully made an admin!";
    } else {
        echo "Error making user admin: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No user ID provided.";
}
?>
