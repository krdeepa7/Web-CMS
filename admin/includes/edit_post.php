<?php
if(isset($_GET['p_id']))
{
	//echo "hello";
	$the_post_id=$_GET['p_id'];

}

$query="select * from posts where post_id={$the_post_id} ";
$select_posts_by_id=mysqli_query($connection,$query);
while($rows=mysqli_fetch_assoc($select_posts_by_id))
{
$post_id=$rows['post_id'];
$post_author=$rows['post_author'];
$post_title=$rows['post_title'];
$post_category_id=$rows['post_category_id'];
$post_status=$rows['post_status'];
$post_image=$rows['post_image'];
$post_content=$rows['post_content'];
$post_tags=$rows['post_tags'];
$post_comment_count=$rows['post_comment_count'];
$post_date=$rows['post_date'];

}
if(isset($_POST['update_post']))
{
	 $post_author=$_POST['post_author'];
	 $post_title=$_POST['post_title'];
	 $post_category_id=$_POST['post_category'];
	 $post_status=$_POST['post_status'];
	 $post_image=$_FILES['post_image']['name'];
	 //echo $post_image;
	 $post_image_temp=$_FILES['post_image']['tmp_name'];
	 $post_content=$_POST['post_content'];
	 $post_tags=$_POST['post_tags'];
	
	move_uploaded_file($post_image_temp, "../images/$post_image"); 
	if(empty($post_image))
	{

		$query="select * from posts where post_id=$the_post_id";
		$select_image=mysqli_query($connection,$query);
		while($row=mysqli_fetch_array($select_image))
		{
			$post_image=$row['post_image'];
		}
	}

	$query="update posts SET ";
	$query.="post_title = '{$post_title}', ";
	$query.="post_category_id = '{$post_category_id}', ";
	$query.="post_date= now(), ";
	$query.="post_author= '{$post_author}', ";
	$query.="post_status= '{$post_status}', ";
	$query.="post_tags= '{$post_tags}', ";
	$query.="post_content= '{$post_content}', ";
	$query.="post_image= '{$post_image}' ";
	$query.="where post_id= {$the_post_id} ";
	//$query.="post_title='{post_title}',";
	//$select_posts_by_id=mysqli_query($connection,$query);
	$update_query=mysqli_query($connection,$query);
	confirm($update_query);

	echo "<p class='bg-success'>Post Updated: <a href='../post.php?p_id={$the_post_id}'>View Post</a></p>";
	echo "<p class='bg-success'>Edit Post: <a href='posts.php?p_id={$the_post_id}'>Edit More Posts</a></p>";
	

}

?>
<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="title">Post Title</label>
<input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
</div>

<div class="form-group">
<select name="post_category" id="" class="form-control" style="max-width:11%;">
<?php

$query="select * from categories";
$select_categories=mysqli_query($connection,$query);

confirm($select_categories);

while($rows=mysqli_fetch_assoc($select_categories))
{
$cat_id=$rows['cat_id'];
$cat_title=$rows['cat_title'];
echo "<option value='$cat_id'>{$cat_title}</option>";
}
?>
</select>
<!-- 
<label for="post_category">Post Category Id</label>
<input value="<?php //echo $post_category_id; ?>" type="text" class="form-control" name="post_category_id"> -->
</div>

<div class="form-group">

<label for="author">Post Author</label>
<input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
</div>



<div class="form-group">
<label for="post_status">Post Status</label>
<select name="post_status" id="" class="form-control" style="max-width:11%;">
<option value='<?php echo $post_status; ?>'><?php echo $post_status;?></option>
<?php
if($post_status=='Draft')
{
echo "<option value='Publish'>Publish</option>";
}
else
{
	echo "<option value='Draft'>Draft</option>";
}

?>
</select>

</div>
<!--
 <div class="form-group">
<label for="post_status">Post Status</label>
<input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
</div>
 -->
<div class="form-group">
<img width="100" src="../images/<?php echo $post_image; ?>" alt="">
<!-- <label for="post_image"></label> -->
<input type="file" name="post_image">

</div>

<div class="form-group">
<label for="post_tags">Post Tags</label>
<input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
</div>
<div class="form-group">
<label for="post_content">Post Content</label>
<textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?>
</textarea>
</div>

<div class="form-group">
<input class="btn btn-primary" type ="submit" name="update_post" value="Publish Post">
</div>
</form>