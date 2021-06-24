

A Simple Demo Resturant Management System Project in PHP


A pure custom PHP Project. Build for reference!



<div class="section white-text" style="background: #B35458;">

	<div class="section">
		<h3>Payment Status</h3>
	</div>


  <?php

    if (isset($_SESSION['msg'])) {
        echo '<div class="section center" style="margin: 5px 35px;"><div class="row" style="background: red; color: white;">
        <div class="col s12">
            <h6>'.$_SESSION['msg'].'</h6>
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
          <?php

            foreach ($arr_all as $key) {

          ?>
          <tr>
            <td><?php echo $key['user_name']; ?></td>
            <td><?php echo $key['amount']; ?></td>
            <td><?php echo $key['payst']; ?></td>
            <td><form action=""><input type="checkbox" name="status" id="status" value="delivered" style="background-color:aliceblue";>
            <label for="status" style="color:white;">Delivered</label></form></td>
          </tr>

          <?php } ?>
         
        </tbody>
      </table>
	</div>
</div>



<?php foreach ($arr_all as $key) {

?>
      <tr>
      <td><?php echo $key['user_name']; ?></td>
            <td><?php echo $key['amount']; ?></td>
            <td><?php echo $key['payst']; ?></td>
            <td><?php echo '<form action="paid.php"> <button type="submit" value= payst> Paid </button> </form>'
            ?></td>
          </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>	



button type=<"submit" name="submit" value= $i> Paid </button>

<input type="radio" name="paym" id="Paid" value="Paid"><label for="Paid">Paid</label>
              <input type="radio" name="paym" id="Not_Paid" value="Not Paid"><label for="Not Paid">Not Paid</label>
          