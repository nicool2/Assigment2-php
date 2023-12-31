<?php require ('./inc/header.php'); 
echo "Image Gallery";

require "./inc/database.php";
$uploadSuccess = false; 
$valid_file=true;


if(!empty($_POST['submit'])) {


  // Count total files
  $countfiles = count($_FILES['files']['name']);

  
  // Prepared statement
  $query = "INSERT INTO imgupload (name,image) 
  VALUES(?,?)";
  $statement = $conn->prepare($query);


  // Loop all files
  for($i = 0; $i < $countfiles; $i++) {


    // File name
    $filename = $_FILES['files']['name'][$i]
    
    ;
    // Location
    $target_file = './uploads/'.$filename;


    // file extension
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);


    // Valid image extension
    $valid_extension = array("png","jpeg","jpg","pdf");
    if(in_array($file_extension, $valid_extension)) {


      // Upload file
      if(move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)){


        // Execute query
        $statement->execute(
        array($filename,$target_file));
        $uploadSuccess = true; 
        
      }  
    }
    else{
      $valid_file=false;
    }
  }
}
?>

<section class="form-row">
  <form method='post' action='' enctype='multipart/form-data'>
    <p><input type='file' name='files[]' multiple /></p>
    <p><input class="btn btn-dark" type='submit' value='Submit' name='submit'/></p>
  </form>


  <?php 
  if($uploadSuccess){
    echo "<p>File upload successfully</p>"; 
  }
  if(!$valid_file){
    echo "<p>Upload image files only</p>";
  }?>


  <a href="view_image.php" class="btn btn-primary">View Uploads</a>

  
</section>


<?php require './inc/footer.php'; ?>

