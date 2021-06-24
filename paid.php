<?php
session_start();
if (isset($_POST['name'])) {

  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $review = $_POST['review'];

  $sql4 = "INSERT INTO `custreview` (`Name`, `age`, `Gender`, `mobile`, `email`, `review`) VALUES ('$name', '$age', '$gender', '$mobile', '$email', '$review');";
  require('backends/connection-pdo.php');
  $query4  = $pdoconn->prepare($sql4);
  $query4->execute();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Payment Gateway</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- <meta http-equiv="refresh" content="1"> -->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <link rel="stylesheet" href="css/style.css">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <link rel="stylesheet" href="css/review.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

  <?php require('chunks/login-modal.php'); ?>

  <?php require('chunks/register-modal.php'); ?>

  <?php require('chunks/info-modal.php'); ?>

  <?php require('chunks/navbar.php'); ?>


  <div class="alert alert-success center" role="alert">

    <h3>Payment SUCCESSFULL! <a href="#" class="alert-link">Visit Us Again!</a><br> Thank You for your visit.</h3>
  </div>

  <div class="container">
    <h3 class="center hl">We Would Like to Have Your Quick Review.</h3>

    <form action="paid.php" method="post">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" placeholder="Enter your name"><br>
      <label for="age">Age:</label>
      <input type="text" name="age" id="age" placeholder="Enter your age"><br>
      <div class="select">
        <label for="gender">Gender:</label>
        <select name="gender" class="form-select" aria-label="Default select example">
          <option selected>Select Your Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
      </div>
      <br>
      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Enter your email"><br>
      <label for="mobile">Mobile No.</label>
      <input type="phone" name="mobile" id="mobile" placeholder="Enter your mobile no."><br>
      <label for="review">Review</label><br>
      <label for=""></label>
      <textarea name="review" id="review" cols="30" rows="5"></textarea><br>
      <div class="center"> <button class="button" type="submit">Submit Your Review.</button></div>

    </form>

  </div>

  <?php require('chunks/footer.php'); ?>

</body>

</html>

<?php
$user_name = $_SESSION['user'];
$sql = 'DELETE FROM custorder WHERE user_name=?';
require('backends/connection-pdo.php');
$query  = $pdoconn->prepare($sql);
$query->execute([$user_name]);

?>