<?php
require './inc/header.php';

// check for authentication before we show any data
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:signin.php');
    exit();
} else {
    // connect to db
    require './inc/database.php';

    // set up query
    $sql = "SELECT * FROM newpatient";

    // run the query and store the results
    $result = $conn->query($sql);

    // start our table
    echo '<section class="person-row">';
    echo '<table class="table table-striped">
            <tr>
                <th>pet_name</th>
                <th>pet_race</th>
                <th>pet_age</th>
                <th>owner_name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>';

    foreach ($result as $row) {
        echo '<tr>
                <td>' . $row['pet_name']  . '</td>
                <td>' . $row['pet_race']  . '</td>
                <td>' . $row['pet_age']  . '</td>
                <td>' . $row['owner_name']  . '</td>
                <td>
                    <a class="btn btn-warning" href="update.php?id=' . $row['id'] . '">Update</a>
                    </td>
                    <td>

                    <a class="btn btn-danger" href="delete.php?id=' . $row['id'] . '">Delete</a>
                </td>
            </tr>';
    }

    // close the table
    echo '</table>';
    echo '<a class="btn btn-primary" href="logout.php">Logout</a>';
    echo '</section>';

    // disconnect
    $conn = null;
}

require './inc/footer.php';
