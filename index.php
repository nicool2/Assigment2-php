<?php
require './inc/header.php';
?>
<main>
    <section class="masthead">
    </section>
    <section class="form-row row">
      <div class="col-sm-12 col-md-6 col-lg-6">
        <h3>Don't have an account, then sign up below!</h3>
        <form method="post" action="save-admin.php">
          
        	<p><select class="form-select" name="pet_race" required>
                <option selected disabled value="">Pet Race</option>
                <option>Dog</option>
                <option>Cat</option>
                <option>Raccon</option>
                <option>Bird</option>
            </select></p>
        	<p><input class="form-control" name="pet_name" type="text" placeholder="Pet name" required /></p>
        	<p><input class="form-control" name="pet_age" type="number" placeholder="Pet age" required /></p>
            <p><input class="form-control" name="owner_name" type="text" placeholder="Owner name" required /></p>
        	<p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
        	<p><input class="form-control" name="confirm" type="password" placeholder="Confirm Password" required /></p>
          <input class="btn btn-primary" type="submit" name="submit" value="Register" />
        </form>
      </div>





      <div class="col-sm-12 col-md-6 col-lg-6">
        <h3>Already have an account, then sign in below!</h3>
        <form method="post" action="./inc/validate.php">
        	<p><input class="form-control" name="pet_name" type="text" placeholder="Pet name" required /></p>
        	<p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
          <input class="btn btn-primary" type="submit" value="Login" />
        </form>
      </div>
    </section>
  </main>
<!-- Let's add our footer file. -->
<?php require ('./inc/footer.php'); ?>
