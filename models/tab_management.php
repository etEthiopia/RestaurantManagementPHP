<?php require('../models/db_connect.php');

    session_start();


    if(isset($_POST['edit_tab'])):

    	$edit_people = $_POST['edit_people'];
      $edit_id = $_POST['edit_id'];

    	$edit = $conn->query("UPDATE tables SET people=$edit_people WHERE id=$edit_id");

		if($edit===TRUE):
			
    		$success = "Tables Customer Number Changed Successfully";
    	else:
    		$fail = "Tables Customer Number Changing was not Successful";
    	endif;

    else:

    endif;




if(isset($_POST['add_tab'])):

	$people_num = $_POST['people_num'];

	$add = $conn->query("INSERT INTO tables (id, people) VALUES (NULL, $people_num)");

	if($add===TRUE):
		$success = "Adding Number on Table is Successful ";
	else:
		$fail = "Adding Number on Table is not Successful ";
	endif;

else:

endif;




if(isset($_POST['del_tab'])):

	$del = $_POST['tab_id'];

	$delete = $conn->query("DELETE FROM tables WHERE id=$del");

	if($delete===TRUE):
		$success = "Successfuly Removed Table";
	else:
		$fail = "Table not Successfuly Removed.";
	endif;

else:

endif;

    ?>