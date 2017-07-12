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
            	$query="select * from posts ";            	 $select_all_post_query=mysqli_query($connection,$query);
                while($rows=mysqli_fetch_assoc($select_all_post_query))
                {
                    $post_id=$rows['post_id'];
                    $post_title=$rows['post_title'];
                    $post_author=$rows['post_author'];
                    $post_date=$rows['post_date'];
                    $post_image=$rows['post_image'];
                    $post_content=substr($rows['post_content'],0,150);
                     $post_status=$rows['post_status'];
if($post_status =='Publish')
{
  ?>
            		
                
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>





                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;?>"> <?php echo $post_title ?> </a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                 <a href="post.php?p_id=<?php echo $post_id;?>"><img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">  </a>
                
                <hr>

                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

          <?php
          		} }
              ?> 

                
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