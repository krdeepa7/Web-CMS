<table class="table table-bordered table-hover" >
        <thead>
        <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response To</th>
        <th>Date</th>
        <th>Approved</th>
        <th>Unapproved</th>
        <th>Delete</th>
        </tr>
        </thead>
        
        <tbody>


<?php
$query="select * from comments ";
$select_comments=mysqli_query($connection,$query);

while($rows=mysqli_fetch_assoc($select_comments))
{
$comment_id=$rows['comment_id'];
$comment_post_id=$rows['comment_post_id'];
$comment_author=$rows['comment_author'];
$comment_content=$rows['comment_content'];
$comment_email=$rows['comment_email'];

$comment_status=$rows['comment_status'];
$comment_date=$rows['comment_date'];
///$post_comment_count=$rows['post_comment_count'];
//$post_date=$rows['post_date'];
echo "<tr>";
echo "<td>$comment_id</td>";
//echo "<td>$comment_post_id</td>";
echo "<td>$comment_author</td>";
echo "<td>$comment_content</td>";
echo "<td>$comment_email</td>";
//echo "<td>dvbhjvbhbhjv{$post_category_id}</td>";

// $query="select * from comments where cat_id ={$post_category_id} ";
// $select_categories_id=mysqli_query($connection,$query);
// while($rows=mysqli_fetch_assoc($select_categories_id))
// {
// $cat_id=$rows['cat_id'];
// $cat_title=$rows['cat_title'];


// echo "<td>$cat_title</td>";

//  }



// echo "<td>$post_status</td>";
// echo "<td><img width='100' src='../images/$post_image' alt='image'> </td>";
echo "<td>$comment_status</td>";

$query="select * from posts where post_id=$comment_post_id";
$select_post_id_query=mysqli_query($connection,$query);
while($rows=mysqli_fetch_assoc($select_post_id_query))
{
    $post_id=$rows['post_id'];
    $post_title=$rows['post_title'];
    //$post_id=$rows['post_id'];
    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
}




echo "<td>$comment_date</td>";
//echo "<td>$post_date</td>";
echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";

echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
// echo "<td><a href='posts.php?source=edit_post&p_id='>Edit</a></td>";

echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
echo "</tr>";

}
?>
    
 </tbody>
</table>



 <?php

if(isset($_GET['unapprove']))
{
      //  echo "hello";
$the_comment_id=$_GET['unapprove'];
$query="update comments set comment_status='Unapproved' where comment_id=$the_comment_id";
$unapprove_query=mysqli_query($connection,$query);
header("Location:comments.php");
}

if(isset($_GET['approve']))
{
      //  echo "hello";
$the_comment_id=$_GET['approve'];
$query="update comments set comment_status='Approved' where comment_id=$the_comment_id";
$approve_query=mysqli_query($connection,$query);
header("Location:comments.php");
}

if(isset($_GET['delete']))
{
      //  echo "hello";
$the_comment_id=$_GET['delete'];
$query="delete from comments where comment_id={$the_comment_id}";
$delete_query=mysqli_query($connection,$query);
header("Location:comments.php");
}
?>

