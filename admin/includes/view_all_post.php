<?php
if(isset($_POST['checkBoxArray']))
{
   foreach($_POST['checkBoxArray'] as $postValueId)
    {
    $bulk_options=$_POST['bulk_options'];
    switch($bulk_options)
    {
        case 'Publish':
        $query="update posts set post_status='{$bulk_options}' where post_id=$postValueId";
        $update_to_publish=mysqli_query($connection,$query);
        break;
        case 'Draft':
        $query="update posts set post_status='{$bulk_options}' where post_id=$postValueId";
        $update_to_draft=mysqli_query($connection,$query);
        break;
       
        case 'Delete':
        $query="delete from posts where post_id=$postValueId";
        $update_to_draft=mysqli_query($connection,$query);
        break;








    } 

    }
}


?>


<form action="" method="post"> 
<table class="table table-bordered table-hover" >
        
<div id="bulkOptionContainer" class="col-xs-4">
<select value="" id="" class="form-control" name="bulk_options">
<option value="">Select Options</option>
<option value="Draft">Draft</option>
<option value="Publish">Publish</option>
<option value="Delete">Delete</option>
</select>
</div>
<div class="col-xs-4">
<input type="submit" name="submit" class="btn btn-success" value="Apply">  <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
</div>

        </br>
        </br>
        </br>
        
        <thead>
        <tr>
        <th><input id="selectAllBoxes" type="checkbox"></th>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
         <th>View Post</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Views</th>
  </tr>
        </thead>

        <tbody>
        <?php
$query="select * from posts ";
$select_posts=mysqli_query($connection,$query);
while($rows=mysqli_fetch_assoc($select_posts))
{
$post_id=$rows['post_id'];
$post_author=$rows['post_author'];
$post_title=$rows['post_title'];
$post_category_id=$rows['post_category_id'];
$post_status=$rows['post_status'];
$post_image=$rows['post_image'];
$post_tags=$rows['post_tags'];
$post_comment_count=$rows['post_comment_count'];
$post_date=$rows['post_date'];
$post_views_count=$rows['post_views_count'];
echo "<tr>";
?>

<td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $post_id;?>'></td>


<?php
echo "<td>$post_id</td>";
echo "<td>$post_author</td>";
echo "<td>$post_title</td>";
//echo "<td>dvbhjvbhbhjv{$post_category_id}</td>";

$query="select * from categories where cat_id ={$post_category_id} ";
$select_categories_id=mysqli_query($connection,$query);
while($rows=mysqli_fetch_assoc($select_categories_id))
{
$cat_id=$rows['cat_id'];
$cat_title=$rows['cat_title'];


echo "<td>$cat_title</td>";

 }



echo "<td>$post_status</td>";
echo "<td><img width='100' src='../images/$post_image' alt='image'> </td>";
echo "<td>$post_tags</td>";
echo "<td>$post_comment_count</td>";
echo "<td>$post_date</td>";
echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";

echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";

echo "<td><a onClick=\" javascript: return confirm('Are you sure you want ')\" href='posts.php?delete={$post_id}'>Delete</a></td>";
echo "<td>{$post_views_count}</td>"; 
echo "</tr>";

}
?>
    
 </tbody>
</table>
</form>

<?php
if(isset($_GET['delete']))
{
      //  echo "hello";
$the_post_id=$_GET['delete'];
$query="delete from posts where post_id={$the_post_id}";
$delete_query=mysqli_query($connection,$query);
header("Location:posts.php");
}
?>

