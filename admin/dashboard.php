<?php require('../models/db_connect.php');
  require('../controllers/dashboard.php');
    ?>

<!doctype html>
<html>
<?php include('../inc/header.php'); ?>

<body>

<?php include ('../inc/navigation.php'); ?>

<section id="dashboard" class="main">

<div class="container pt-2 pb-5">

<h4 class="text-center pb-3">Management Settings</h4>

      <form id="dateform" name="dateform" action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="col-md-6 offset-md-3 pt-2 pb-3">

    <div class="form-group">
    <label for="res_date">Find Day Reservations</label>
    <input type="date" name="res_date" class="form-control" id="res_date" min="<?= date("Y-m-d"); ?>" required>

    </div>

    <button type="submit" id="submit_date" name="submit_date" class="form-control submit-btn btn btn-info d-block mr-auto ml-auto">Find by Date</button>
    </form>

    <form id="allresults" name="allresults" action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="col-md-6 offset-md-3 mt-3 mb-5">
  <button type="submit" id="all_reservations" name="all_reservations" class="form-control submit-btn btn btn-warning d-block mr-auto ml-auto">All Reservations</button>
  </form>

<?php if(isset($_POST['all_reservations'])):

     if(isset($none)): ?>

                <div class="col-md-6 offset-md-3 alert alert-danger p-2 mt-2 text-center" role="alert">
                      <?= $none;      ?>

                </div>

      <?php else: ?>

<table class="table table-striped text-center">
<thead class="thead-dark">
<tr>

<th scope="col">Reservation Code</th>
<th scope="col" class="text-left">First Name</th>
<th scope="col" class="text-left">Last Name</th>
<th scope="col">Date</th>
<th scope="col">Table Number</th>
<th scope="col">Number of Customers</th>
</tr>
</thead>
<tbody>

<?php for($i=0; $i<sizeof($res_id); $i++): ?>

<tr <?php if($res_admin[$i]==1): echo "class='text-muted'"; endif; ?>>
<td><?= $res_id[$i]; ?></td>
<td class="text-left"><?= $res_fname[$i]; ?></td>
<td class="text-left"><?= $res_lname[$i]; ?></td>
<td><?= $res_date[$i]; ?></td>
<td><?= $res_table[$i]; ?></td>
<td><?= $res_people[$i]; ?></td>
</tr>

<?php endfor;  ?>

</tbody>

</table>

<?php
endif;
endif; ?>

<?php if(isset($_POST['submit_date'])):

    if(isset($err_day)): ?>

    <div class="col-md-6 offset-md-3 alert alert-danger p-2 mt-2 text-center" role="alert">
          <?= $err_day;      ?>

    </div>

  <?php   elseif(isset($none)): ?>

                <div class="col-md-6 offset-md-3 alert alert-danger p-2 mt-2 text-center" role="alert">
                      <?= $none;      ?>

                </div>

      <?php else: ?>

<table class="table table-striped text-center">
<thead class="thead-dark">
<tr>

<th scope="col">Reservation Code</th>
<th scope="col" class="text-left">First Name</th>
<th scope="col" class="text-left">Last Name</th>
<th scope="col">Date</th>
<th scope="col">Table Number</th>
<th scope="col">Number of Customers</th>
</tr>
</thead>
<tbody>

<?php for($i=0; $i<sizeof($res_id); $i++): ?>

<tr <?php if($res_admin[$i]==1): echo "class='text-muted'"; endif; ?>>
<td><?= $res_id[$i]; ?></td>
<td class="text-left"><?= $res_fname[$i]; ?></td>
<td class="text-left"><?= $res_lname[$i]; ?></td>
<td><?= $res_date[$i]; ?></td>
<td><?= $res_table[$i]; ?></td>
<td><?= $res_people[$i]; ?></td>
</tr>

<?php endfor;  ?>

</tbody>

</table>

<?php
endif;
endif; ?>

</div>

<?php include('../inc/footer.php') ?>
</body>
</html>