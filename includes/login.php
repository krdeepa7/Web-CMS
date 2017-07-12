<?php
include "db.php";
?>
<?php
session_start();
?>

<?php
if(isset($_POST['login']))
{
 $username=$_POST['username'];
 $password=$_POST['password'];
 $username=mysqli_real_escape_string($connection,$username);
 $password=mysqli_real_escape_string($connection,$password);


$query="select * from users where user_name='{$username}' ";
$select_user_query=mysqli_query($connection,$query);
if(!$select_user_query)
{
	die("query failed".mysqli_error($connection));
}


if(mysqli_num_rows($select_user_query)==0){
	header("Location: ../index.php?error=invalid");
}else{

while($row=mysqli_fetch_array($select_user_query))
{
	$db_user_id=$row['user_id'];
	$db_user_firstname=$row['user_firstname'];
	$db_user_lastname=$row['user_lastname'];
	$db_user_role=$row['user_role'];
	$db_username=$row['user_name'];
	$db_password=$row['user_password'];
}

 $password=crypt($password,$db_password);

		if($username===$db_username && $password===$db_password && $db_user_role==="admin")
		{
		$_SESSION['username']=$db_username;
		$_SESSION['firstname']=$db_user_firstname;
		$_SESSION['lastname']=$db_user_lastname;
		$_SESSION['user_role']=$db_user_role;

		header("Location: ../admin");
		}
		else
		{	
			header("Location: ../index.php?error=denied");
			//echo "<script type='text-javascript'>alert('helo');</script>";
			
		}
}
}
?>