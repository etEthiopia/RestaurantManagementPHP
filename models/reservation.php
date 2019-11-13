<?php require('db_connect.php');
    session_start();

if(isset($_POST['submit_table'])):

$date_sess = $_SESSION['date'];
$person = $_SESSION['id'];

foreach ($_POST['table'] as $tab1):
$tab = (int)$tab1;
$newres = $conn->query("INSERT INTO reservations (id, table_id, reserved_by, reserved_for, reserved_at) VALUES (NULL, $tab, $person, '$date_sess', now())");
endforeach;

if($newres===TRUE):
        $success = "Reservation Successful, Thank You";
      else:
        $fail = "Reservation not Successful, Please Try Again";
      endif;
endif;
?>