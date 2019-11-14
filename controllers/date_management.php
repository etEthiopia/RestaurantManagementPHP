<?php
session_start();

if(isset($_POST['date_upd'])):

    $day_upd = $_POST['day_upd'];
    $day_id = (int)$day_upd;
    $open = $_POST['opening_upd'];
    $opening_upd = date('H:i:s', strtotime($open));
    $close = $_POST['closing_upd'];
    $closing_upd = date('H:i:s', strtotime($close));


    $sql = $conn->query("SELECT day_id FROM days INNER JOIN hours ON days.id=day_id WHERE day_id=$day_id");
      if($sql->num_rows > 0):

          $d_update = $conn->query("UPDATE hours SET opened_at='$opening_upd', closed_at='$closing_upd' WHERE day_id='$day_id'");
              if($d_update===TRUE):
            		$success = "Changing Opeing Hours is Successful";
            	else:
            		$fail = "Changing Opeing Hours is not Successful";
            	endif;

      else:

        $d_edit = $conn->query("INSERT INTO hours (id, opened_at, closed_at, day_id) VALUES (NULL, '$opening_upd', '$closing_upd', $day_id)");
            if($d_edit===TRUE):
              $success = "Changing Opeing Hours is Successful";
            	else:
            		$fail = "Changing Opeing Hours is not Successful";
            endif;

      endif;

endif;


if(isset($_POST['day_close'])):

    $day_close_id = $_POST['day_close_id'];
    $day_close = (int)$day_close_id;


    $del = $conn->query("DELETE FROM hours WHERE day_id=$day_close");

              if($del===TRUE):
            		$success = "Changing Holiday is Successful";
            	else:
            		$fail = "Changing Holiday is not Successful";
            	endif;

endif;
?>