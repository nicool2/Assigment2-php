<?php
require './inc/header.php';
require './inc/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $id = $_POST['id'];
    $pet_name = $_POST['pet_name'];
    $pet_race = $_POST['pet_race'];
    $pet_age = $_POST['pet_age'];
    $owner_name = $_POST['owner_name'];

    try {
        // Update the record in the database
        $sql = "UPDATE newpatient SET 
                pet_name = :pet_name,
                pet_race = :pet_race,
                pet_age = :pet_age,
                owner_name = :owner_name
                WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':pet_name', $pet_name);
        $stmt->bindParam(':pet_race', $pet_race);
        $stmt->bindParam(':pet_age', $pet_age);
        $stmt->bindParam(':owner_name', $owner_name);

        if ($stmt->execute()) {
            echo 'Record updated successfully.';
        } else {
            echo 'Error updating record.';
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'Invalid Request';
}

$conn = null;

require './inc/footer.php';
?>
