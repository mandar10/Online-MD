<?php
include '../assets/backend/connect.php';
include '../assets/backend/core.php';
include '../methods/methods.php';
@$referer1=$_SERVER['HTTP_REFERER'];
?>

<html>
<Head>
	<meta charset="UTF-8">
	<title>
		Register
	</title>
</head>	
<?php 

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{

	$url='../profile.php?id='.$user_id;
	echo '<script type="text/javascript">';
	echo 'window.location.href="'.$url.'";';
	echo '</script>';

}
else
{
	$http_client_ip=@$_SERVER['HTTP_CLIENT_IP'];
	$http_x_forwarded_for= @$_SERVER['HTTP_X_FORWARDED_FOR'];
	$remote_addr= $_SERVER['REMOTE_ADDR'];

	if(!empty($http_client_ip)){
		$ip=$http_client_ip;
	}else if(!empty($http_x_forwarded_for)) {
		$ip=$http_x_forwarded_for;
	}else{
		$ip=$remote_addr;
	}
	if(
		isset($_POST['firstname1']) &&
		isset($_POST['surname1']) &&
		isset($_POST['password1']) &&
		isset($_POST['password2']) &&
		isset($_POST['email1']) &&
		isset($_POST['gender1']) &&
		isset($_POST['dob1']) &&
		isset($_POST['month1']) &&
		isset($_POST['year1'])
		)
		{
			$firstname=htmlentities(ucfirst($_POST['firstname1']));
			$lastname=htmlentities(ucfirst($_POST['surname1']));
			$password=md5($_POST['password1']);
			$password1=md5($_POST['password2']);
			$email=htmlentities($_POST['email1']);
			$gender=$_POST['gender1'];
			$date=$_POST['dob1'];
			$month=$_POST['month1'];
			$year=$_POST['year1'];
			$dob=$_POST['year1'].'-'.$_POST['month1'].'-'.$_POST['dob1'];
			$disease="NA";
			$special="NA";
			$spreadsheet="NA";
			$utype=$_POST['type'];
			$lati=$_POST['lati'];
			$longi=$_POST['longi'];
			if($utype=='1')
			{
				$disease=$_POST['disease'];
			}
			else if($utype=='2')
			{
				$special=$_POST['special'];
			}
			else if($utype=='3')
			{
            	$spreadsheet=$_POST['spreadsheet'];
			}
			else
			{
				$spreadsheet=$_POST['spreadsheet'];		
			}
			date_default_timezone_set("Asia/Kolkata");
			$time1= time();
			$date1= date( 'y-m-d h:i:s', $time1);
			if(!empty($firstname) && !empty($lastname) && !empty($password) && !empty($email) && !empty($gender) && !empty($dob) && !empty($month) && !empty($year)  && !empty($password1)/*&& !empty($response)*/)
			{

				if($password==$password1)
				{
					$query="SELECT * FROM login WHERE email='".mysqli_real_escape_string($con,$email) ."'";
					$query_run=mysqli_query($con,$query);
					$query_num=mysqli_num_rows($query_run);
					if($query_num>=1)
					{
						echo '<div id="register"><center><b style="color:red;">This Email Already Exists</b></center></div>';
					}
					else
					{

						$query="INSERT INTO login VALUES('','".mysqli_real_escape_string($con,$password)."','".mysqli_real_escape_string($con,$firstname)."','".mysqli_real_escape_string($con,$lastname)."','".mysqli_real_escape_string($con,$email)."','".mysqli_real_escape_string($con,$gender)."','".mysqli_real_escape_string($con,$dob)."','".mysqli_real_escape_string($con,$date1)."','','','','','.$ip.','".mysqli_real_escape_string($con,$date1)."','".mysqli_real_escape_string($con,$disease)."','".$utype."','".$special."','".$spreadsheet."','".$lati."','".$longi."')";
						if($query_run=mysqli_query($con,$query))
						{

							echo '<script type="text/javascript">';
							echo 'window.location.href="../login.php?redirect=reg"';
							echo '</script>';
							echo '<div id="register"><center><b style="color:red;">You Have Registered</b></center></div><br>';		  
						}
						else
						{
							echo mysqli_error($con);
						}
					}
				}
				else
				{
					echo '<div id="register"><center><b style="color:red;">Both Password Doesn\'t Match</b></center></div><br>';
				}
			}else
			{
				echo '<div id="register"><center><b style="color:red;">All Details are Mandatory</b></center></div><br>';
			}

		}
		else
		{
			echo '<div id="register"><center><b style="color:red;">Please Fill the Details</b></center></div><br>';
		}
}
?>

</html>
