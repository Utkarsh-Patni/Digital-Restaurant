<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>

<link rel="stylesheet" href="../css/tablestatus.css">

<?php

require('../backends/connection-pdo.php');

$sql = 'SELECT  user_name,payst, amount FROM useramt';

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

$name = ['user_name'];
$amt = ['amount'];
$payst = ['payst'];


?>
<div class="section white-text" style="background: #B35458;">

  <div class="section">
    <h3>Payment Status</h3>
  </div>


  <?php
  $payment = false;

  if ($payment == true) {;
  }


  if (isset($_SESSION['msg'])) {
    echo '<div class="section center" style="margin: 5px 35px;"><div class="row" style="background: red; color: white;">
    <div class="col s12">
        <h6>' . $_SESSION['msg'] . '</h6>
        </div>
    </div></div>';
    unset($_SESSION['msg']);
  }

  ?>

  <div class="section center" style="padding: 20px;">
    <table class="centered responsive-table">
      <thead>
        <tr>
          <th>User Name</th>
          <th>Total Amount</th>
          <th>Payment Status</th>
        </tr>
      </thead>

      <tbody>
        <?php for ($i = 1; $i <= count($arr_all);) { ?>



          <td><?php echo $arr_all[$i - 1]['user_name']; ?></td>
          <td><?php echo $arr_all[$i - 1]['amount']; ?></td>
          <td><input type="checkbox" name="paid[i]" id="paid[i]">Paid</td>
          </tr>
        <?php $i = $i + 1;
        } ?>
      </tbody>
    </table>
  </div>
</div>
















<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>