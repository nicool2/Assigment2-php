<?php
require './inc/header.php';
?>
<?php
  require "inc/database.php";
  $stmt = $conn->prepare('select * from imagupload');
  $stmt->execute();
  $imagelist = $stmt->fetchAll();
?>
  <section class="view-masthead">
    <div>
      <h1>View Images</h1>
    </div>
  </section>
  <section class="image-row row">
<?php
  foreach($imagelist as $image) {
 ?>
    <div class="col-sm-12 col-md-3 col-lg-3"> 
      <img src="<?=$image['image']?>" alt="<?=$image['name'] ?>" class="img-fluid" >
      <p><?php echo $image["name"]; ?></p>
    </div>
<?php
}
?>
  </section>
  <?php require ('./inc/footer.php'); ?>

