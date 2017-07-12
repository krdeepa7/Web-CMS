<table class="table table-bordered table-hover" >
        <thead>
        <tr>
        <th>Id</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>
       <!--  <th>Date</th> -->
        <!-- <th>Approved</th>
        <th>Unapproved</th>
        <th>Delete</th> -->
        </tr>
        </thead>
        
        <tbody>


<?php
$query="select * from users ";
$select_users=mysqli_query($connection,$query);

while($rows=mysqli_fetch_assoc($select_users))
{
$user_id=$rows['user_id'];
$user_name=$rows['user_name'];
$user_password=$rows['user_password'];
$user_firstname=$rows['user_firstname'];
$user_lastname=$rows['user_lastname'];
$user_email=$rows['user_email'];
//$user_status=$rows['user_status]'];
//$user_date=$rows['user_date'];
$user_role=$rows['user_role'];

echo "<tr>";
echo "<td>$user_id</td>";
//echo "<td>$comment_post_id</td>";
echo "<td>$user_name</td>";
echo "<td>$user_firstname</td>";
echo "<td>$user_lastname</td>";
echo "<td>$user_email</td>";
echo "<td>$user_role</td>";


// $query="select * from posts where post_id=$comment_post_id";
// $select_post_id_query=mysqli_query($connection,$query);
// while($rows=mysqli_fetch_assoc($select_post_id_query))
// {
//     $post_id=$rows['post_id'];
//     $post_title=$rows['post_title'];
//     //$post_id=$rows['post_id'];
//     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
// }




echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";

echo "<td><a href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
// echo "<td><a href='posts.php?source=edit_post&p_id='>Edit</a></td>";
echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
echo "</tr>";

}
?>
    
 </tbody>
</table>



 <?php

if(isset($_GET['change_to_admin']))
{
      //  echo "hello";
$the_user_id=$_GET['change_to_admin'];
$query="update users set user_role='Admin' where user_id=$the_user_id";
$c_t_a_query=mysqli_query($connection,$query);
header("Location:users.php");
}

if(isset($_GET['change_to_subscriber']))
{
      //  echo "hello";
$the_user_id=$_GET['change_to_subscriber'];
$query="update users set user_role='Subscriber' where user_id=$the_user_id";
$c_t_s_query=mysqli_query($connection,$query);
header("Location:users.php");
}

if(isset($_GET['delete']))
{
      //  echo "hello";
$the_user_id=$_GET['delete'];
$query="delete from users where user_id={$the_user_id}";
$delete_user_query=mysqli_query($connection,$query);
header("Location:users.php");
}
?>

