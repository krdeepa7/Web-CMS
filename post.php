<?php
include "includes/header.php";


?>
<?php
include "includes/navigation.php";


?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">



     <?php
     if(isset($_GET['p_id']))
     {
        $the_post_id=$_GET['p_id'];
        $view_query="update posts set post_views_count=post_views_count + 1 where post_id= $the_post_id ";
        $send_query=mysqli_query($connection,$view_query);

        if(!$send_query){
          die("Failed");
        }





                $query="select * from posts where post_id=$the_post_id";
                 $select_all_post_query=mysqli_query($connection,$query);
                while($rows=mysqli_fetch_assoc($select_all_post_query))
                {
                    $post_title=$rows['post_title'];
                    $post_author=$rows['post_author'];
                    $post_date=$rows['post_date'];
                    $post_image=$rows['post_image'];
                    $post_content=$rows['post_content'];

               ?>

               <!--
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->





                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?> </a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>


                <hr>

          <?php
                }



              }else{

                header("Location: index.php");
              }
              ?>

             <!-- Blog Comments -->



<?php
if(isset($_POST['create_comment']))
{






   $the_post_id=$_GET['p_id'];
   $comment_author=$_POST['comment_author'];
   $comment_email=$_POST['comment_email'];
   $comment_content=$_POST['comment_content'];

if((!empty($comment_author))&&(!empty($comment_email))&&(!empty($comment_content)))
{
$query="insert into comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) ";
$query.="values ($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}', 'unapproved',now())";


$create_comment_query=mysqli_query($connection,$query);

if(!$create_comment_query)
{
die("failed".mysqli_error($connection));
}

$query="update posts set post_comment_count=post_comment_count+1 ";
$query.="where post_id=$the_post_id ";
$update_comment_count=mysqli_query($connection,$query);

?>

<script>alert("Comments will be displayed after admin approves it !")</script>
<?php
}

else
{
?>
  <script>alert('Fields Cannot Be Empty')</script>
<?php
}
}
?>

                <!-- Comments Form -->
<div class="well">
<h4>Leave a Comment:</h4>
<form action="" method="post" role="form">
    <div class="form-group">
    <label for="author">Author</label>
        <input type="text" name="comment_author" class=form-control>
    </div>
    <div class="form-group">
    <label for="email">Email</label>
        <input type="email" name="comment_email" class=form-control>
    </div>
    <div class="form-group">
    <label>Your Comment</label>
        <textarea name="comment_content" class="form-control" class=form-control rows="3"></textarea>
    </div>
    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
</form>
</div>

                <hr>

                <!-- Posted Comments -->
<?php
$query="select * from comments where comment_post_id={$the_post_id} ";
$query.="and comment_status='Approved' ";
$query.="order by comment_id DESC";
$select_comment_query=mysqli_query($connection,$query);
if(!$select_comment_query)
{
    die("query failed".mysqli_error($connection));
}
while($row=mysqli_fetch_assoc($select_comment_query))
{
    $comment_date=$row['comment_date'];
    $comment_content=$row['comment_content'];
    $comment_author=$row['comment_author'];
?>


<div class="media">
<a class="pull-left" href="#">
<img class="media-object" src="http://placehold.it/64x64" alt="">
</a>
<div class="media-body">
<h4 class="media-heading"><?php echo $comment_author; ?>
    <small><?php echo $comment_date; ?></small>
</h4>
<?php echo $comment_content; ?>
</div>
</div>

<?php } ?>



 <!-- Comment -->
     </div>


 <?php
include "includes/sidebar.php";


?>

        </div>
        <!-- /.row -->

        <hr>

    <?php
include "includes/footer.php";


?>
