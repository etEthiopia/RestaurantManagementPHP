<?php require('../models/db_connect.php');
    session_start();
    // If form submitted, insert values into the database.
   if (isset($_REQUEST['registration'])):

        if($_REQUEST['password']!=$_REQUEST['confirm']):


   $error_conf="Don't want to Register? Explore More Options";


        else:


			$email = stripslashes($_REQUEST['email']);
			$email = mysqli_real_escape_string($conn,$email);

			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)):
				$error_email = "To email not valid.";
			else:
				// check if email already exists in the database

				$query = $conn->query("SELECT * FROM users WHERE email='$email'");

				if ($query->num_rows > 0):
          $_SESSION['message'] = "Already a customer before";
					header("location: login.php");
				else:

					$lname = stripslashes($_REQUEST['lname']); // removes backslashes
					$lname = mysqli_real_escape_string($conn,$lname); //escapes special characters in a string

					$fname = stripslashes($_REQUEST['fname']); // removes backslashes
					$fname = mysqli_real_escape_string($conn,$fname); //escapes special characters in a string

					$password = stripslashes($_REQUEST['password']);
					$password = mysqli_real_escape_string($conn,$password);
					$password = md5($password);

					$mobile = stripslashes($_REQUEST['mobile']);
					$mobile = mysqli_real_escape_string($conn,$mobile);

					$admin = $_REQUEST['admin'];
                if($admin=='user'):
                  $admin=0;
                  	$insert = $conn->query("INSERT INTO users (id, fname, lname, email, password, mobile, admin, created_at) VALUES (NULL, '$fname', '$lname', '$email', '$password', '$mobile', $admin, now())");

                		if($insert===TRUE):

                  			$_SESSION['message'] = "Successfuly Registered, You can now Log In";
                  					header("location: login.php");

                		elseif($insert===FALSE):

                  	 		$fail = "Unsuccessful Registration, Please Try Again";

                		endif;


                elseif($admin=='admin'):
                  $admin=1;
                    if ((isset($_REQUEST['adminpass'])) && $_REQUEST['adminpass']!=""):
                        $adminpass = stripslashes($_REQUEST['adminpass']);
                        $adminpass = mysqli_real_escape_string($conn,$adminpass);
                            if ($adminpass!="admin"):
                              $error_adminpass = "Password Incorrect";
                            else:
                                $insert = $conn->query("INSERT INTO users (id, fname, lname, email, password, mobile, admin, created_at) VALUES (NULL, '$fname', '$lname', '$email', '$password', '$mobile', $admin, now())");

                                    if($insert===TRUE):

                                        $_SESSION['message'] = "Successfuly Registered, You can now Log In.";
                                        header("location: login.php");

                                    elseif($insert===FALSE):

                                        $fail = "Unsuccessful Registration, Please Try Again";

                                    endif; // if($insert===TRUE):


                            endif;
                    endif;
                endif;
  


				endif; // if ($query->num_rows > 0):


			endif; // if (!filter_var($email, FILTER_VALIDATE_EMAIL)):


		endif; // if($_REQUEST['password']!=$_REQUEST['confirm']):

	endif; // if(isset($_REQUEST['registration'])):
?>
