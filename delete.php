<?php
require './inc/header.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:signin.php');
    exit();
} else {
    require './inc/database.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Perform the delete operation
        $sql = "DELETE FROM newpatient WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo 'Record deleted successfully.';
        } else {
            echo 'Error deleting record.';
        }
    } else {
        echo 'Invalid Request';
    }

    $conn = null;
}

require './inc/footer.php';
?>
