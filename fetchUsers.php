<?php 
    include "config.php";

    $sql = "SELECT * FROM users";

    $result = $conn->query($sql);
    $users = [];
    while($row = $result -> fetch_assoc()){
        $users[] = $row;
    }
    echo json_encode(['users' => $users]);
    mysqli_close($conn);

?>