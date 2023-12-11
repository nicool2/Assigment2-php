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
    
            // Fetch the data for the specified id from the database
            $sql = "SELECT * FROM newpatient WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Display a form with the fetched data for updating
            echo '<h2>Update Patient</h2>';
            echo '<form action="update_process.php" method="post" class="row g-3 ">
            
                    <input type="hidden" name="id" value="' . $id . '">
    
                    <div class="col-md-5">
                    <label for="pet_race">Pet Race:</label>
                    <input class="form-control" type="text" name="pet_race" value="' . $row['pet_race'] . '">
                    </div>
    
    
                    <div class="col-md-5">
                    <label for="pet_name">Pet Name:</label>
                    <input class="form-control" type="text" name="pet_name" value="' . $row['pet_name'] . '">
                    </div>
    
    
            <div class="col-md-4">
            <label for="pet_age">Pet age:</label>
                    <input class="form-control" type="number" name="pet_age" value="' . $row['pet_age'] . '">
                    </div>
    
                    
            <div class="col-md-3">
            <label for="owner_name">Owner Name:</label>
                    <input class="form-control" type="text" name="owner_name" value="' . $row['owner_name'] . '">
                    </div>
    
    
    
            <div class="col-md-3">
    
                    <input class="btn btn-primary" type="submit" value="Update">
    
                </div>
                  </form>';
        } else {
            echo 'Invalid Request';
        }

    $conn = null;
}

require './inc/footer.php';
?>
