<?php
include "includes/admin_header.php"
?>
<?php

if(isset($_SESSION['username']))
{
   // echo "hello";
   $username= $_SESSION['username'];
   $query="select * from users where user_name='{$username}'";
   $select_user_profile=mysqli_query($connection,$query);
   while($rows=mysqli_fetch_array($select_user_profile))
 {
            $user_id=$rows['user_id'];
            $user_name=$rows['user_name'];
            $user_password=$rows['user_password'];
            $user_firstname=$rows['user_firstname'];
            $user_lastname=$rows['user_lastname'];
            $user_email=$rows['user_email'];
            $user_role=$rows['user_role'];

   }
}
?>



<?php
if(isset($_POST['edit_user']))
{

//$user_id=$_POST['user_id'];
$user_name=$_POST['username'];
$user_password=$_POST['user_password'];
$user_firstname=$_POST['user_firstname'];
$user_lastname=$_POST['user_lastname'];
$user_email=$_POST['user_email'];
$user_role=$_POST['user_role'];

$s="$2y$10$";
$hash="iusesomecrazystrings22";
$hash_and_salt=$s.$hash;
$user_password=crypt($user_password,$hash_and_salt);
// move_uploaded_file($post_image_temp,"../images/$post_image");

    $query="update users SET ";
    $query.="user_firstname = '{$user_firstname}', ";
    $query.="user_lastname = '{$user_lastname}', ";
    $query.="user_role= '{$user_role}', ";
    $query.="user_email= '{$user_email}', ";
    $query.="user_password= '{$user_password}' ";
    $query.="where user_name= '{$user_name} '";
 
  $edit_user_query=mysqli_query($connection,$query);

  confirm($edit_user_query);


}
?>



<div id="wrapper">
<?php
include "includes/admin_navigation.php"

?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                     <h1 class="page-header">
                            Welcome To Admin
                            <small>Author</small>
                        </h1>
   
<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="title">First Name</label>
<input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
</div>
<div class="form-group">
<label for="title">Last Name</label>
<input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
</div>


<div class="form-group"> 
<label for="user_role">User Role</label> 
<select  style="max-width:11%;" name="user_role" id ="" class="form-control" >

<option value="subscriber"><?php echo $user_role; ?></option>
<?php
if($user_role=='Admin')
{
echo "<option value='Subscriber'>Subscriber</option>";
}
else
{
echo "<option value='Admin'>Admin</option>";
}
?>
</select>
</div>

<div class="form-group">
<label for="author">Username</label>
<input type="text" class="form-control" name="username" value="<?php echo $user_name; ?>">
</div>

<div class="form-group">
<label for="post_status">Email</label>
<input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
</div>

<div class="form-group">
<label for="post_image">Password</label>
<input type="Password" value="<?php echo $user_password; ?>" name="user_password" class="form-control">
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
<input class="btn btn-primary" type ="submit" name="edit_user" value="Submit">
</div>
</form>

   

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php
include "includes/admin_footer.php"

?>
