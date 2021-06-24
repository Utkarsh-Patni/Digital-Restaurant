<?php
session_start();

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


</head>

<body>

  <?php require('./chunks/login-modal.php'); ?>

  <?php require('chunks/register-modal.php'); ?>

  <?php require('chunks/info-modal.php'); ?>

  <?php require('chunks/navbar.php'); ?>


  <?php

  $payment = false;

  if ($payment == true) { ?>
    <div class="alert alert-success" role="alert">
      Payment SUCCESSFUL! <a href="#" class="alert-link">Visit Us Agian!</a>Thank You for your visit.
    </div>
  <?php
  } else {

    // echo "<h4 class= center>Please Pay your bill</h3>";

    $sql = 'SELECT orders.order_id , food.fname,food.price, orders.timestamp FROM orders LEFT JOIN food ON orders.food_id = food.id';
    require('backends/connection-pdo.php');
    $query  = $pdoconn->prepare($sql);
    $query->execute();
    $arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
  ?>

    <div class="section white-text" style="background: #B35458;">

      <div class="center">
        <h3>Your bill and Orders are here.</h3>
      </div>

      <?php

      if (isset($_SESSION['msg'])) {
        echo '<div class="section center" style="margin: 5px 35px;"><div class="row" style="background: red; color: white;">
        <div class="col s12">
            <h6>' . $_SESSION['msg'] . '</h6>
            </div>
        </div></div>';
        unset($_SESSION['msg']);
      }

      ?>

      <?php

      try {

        if (!file_exists('backends/connection-pdo.php'))
          throw new Exception();
        else
          require_once('backends/connection-pdo.php');
      } catch (Exception $e) {

        $arr = array('code' => "0", 'msg' => "There were some problem in the Server! Try after some time!");

        echo json_encode($arr);

        exit();
      }
      // require_once('./backends/config.php');		 

      $user_name = $_SESSION['user'];
      ?>

      <div class="center">
        <h5></h5>
        <?php echo "<h5>Bill For :- $user_name</h5>";
        echo "<br>"; ?>
      </div>


      <?php
      $sql = 'SELECT food_id,user_name,food.fname,food.price FROM custorder INNER JOIN food ON custorder.food_id= food.id WHERE `user_name` =?';

      $query  = $pdoconn->prepare($sql);
      $result = $query->execute([$user_name]);

      $arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <div class="center">
        <table class="centered">
          <thead>
            <tr>
              <th style="width: 500px;">Food Name</th>
              <th style="width: 200px; padding-right:300px;">Price</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($arr_all as $key) {
            ?>

              <tr>

                <td><?php echo $key['fname']; ?></td>
                <td style="width: 200px; padding-right:300px;"><?php echo $key['price']; ?></td>
              </tr>
              <br>



            <?php } ?>
          </tbody>
        </table>
      </div>

      <?php


      $sql1 = 'SELECT SUM(food.price) FROM custorder INNER JOIN food ON custorder.food_id= food.id WHERE `user_name` =?';


      $query1  = $pdoconn->prepare($sql1);
      $result1 = $query1->execute([$user_name]);

      $arr = $query1->fetchAll(PDO::FETCH_ASSOC);

      foreach ($arr as $key) {
      ?>

        <h5 class=center><?php echo "The Amont Payable = " . $key['SUM(food.price)']; ?> Rs. </h5>
    <?php
      }
    }
    ?>
    <style>
      <?php include 'paysty.css'; ?>
    </style>
  
    <figure>
      <img src="images/QR.jpg" alt="QR Code">
      <h6 class="center"> Scan this Code to pay the bill.</h6>
    </figure>

    <form action="paid.php">
      <button type="submit" value="Pay"> PAID </button>
    </form>


    <?php require('chunks/footer.php'); ?>




    <script>
      src = "https://code.jquery.com/jquery-3.4.1.min.js"
      integrity = "sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin = "anonymous"
    </script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="js/loaders.js"></script>
    <script src="js/ajax.js"></script>

</body>

</html>