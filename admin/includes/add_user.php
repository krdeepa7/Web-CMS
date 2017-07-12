<?php
if(isset($_POST['create_user']))
{

//$user_id=$_POST['user_id'];
$username=$_POST['username'];
$user_password=$_POST['user_password'];

$s="$2y$10$";
$hash="iusesomecrazystrings22";
$hash_and_salt=$s.$hash;
$user_password=crypt($user_password,$hash_and_salt);


$user_firstname=$_POST['user_firstname'];
$user_lastname=$_POST['user_lastname'];
$user_email=$_POST['user_email'];
$user_role=$_POST['user_role'];


// move_uploaded_file($post_image_temp,"../images/$post_image");

 $query="insert into users(user_firstname,user_lastname,user_role,user_name,user_email,user_password) ";

$query.= " values('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}') ";

 $create_user_query=mysqli_query($connection,$query);

  confirm($create_user_query);

echo "User Created: "." "."<a href='users.php'>View Users</a>";
}
?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="title">First Name</label>
<input type="text" class="form-control" name="user_firstname">
</div>
<div class="form-group">
<label for="title">Last Name</label>
<input type="text" class="form-control" name="user_lastname">
</div>


<div class="form-group"> 
<label for="user_role">User Role</label> 
<select  style="max-width:11%;" name="user_role" id ="" class="form-control" >
<option value="subscriber">Select Option</option>
<option value="admin">Admin</option>
<option value="subscriber">Subscriber</option>
</select>
</div>

<div class="form-group">
<label for="author">Username</label>
<input type="text" class="form-control" name="username">
</div>

<div class="form-group">
<label for="post_status">Email</label>
<input type="email" class="form-control" name="user_email">
</div>

<div class="form-group">
<label for="post_image">Password</label>
<input type="Password" name="user_password" class="form-control">
</div>

<!-- <div class="form-group">
<label for="post_tags">Post Tags</label>
<input type="text" class="form-control" name="post_tags">
</div>
<div class="form-group">
<label for="post_content">Post Content</label>
<textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
</div> -->

<div class="form-group">
<input class="btn btn-primary" type ="submit" name="create_user" value="Add User">
</div>
</form>