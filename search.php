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

    
                if(isset($_POST['submit']))
                {
                 $search= $_POST['search'];
                $query="select * from posts where post_tags like '%$search%' ";
                $search_query=mysqli_query($connection,$query);
                if(!$search_query)
                {
                    die("query fail".mysqli_error($connection));
                }
                $count=mysqli_num_rows($search_query);
                if($count==0)
                    echo "<h1>No result</h1>";


                
                else
                {
                    
                   
                while($rows=mysqli_fetch_assoc($search_query))
                {
                    $post_title=$rows['post_title'];
                    $post_author=$rows['post_author'];
                    $post_date=$rows['post_date'];
                    $post_image=$rows['post_image'];
                    $post_content=substr($rows['post_content'],0,200);
                    $post_id=$rows['post_id'];

               ?>
                    
               <!--  
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
 -->




                <!-- First Blog Post -->
                <h3>
                    <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title ?> </a>
                </h3>
                <h4>
                    by <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_author ?></a>
                </h4>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="" width="400" height="250" style="border-radius:15px;">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

          <?php
                }
              
                }

                
                }


?>


                














            	
                
             </div>





<?php
include 'includes/sidebar.php'
?>





           
        </div>
        <!-- /.row -->

        <hr>

    <?php
include "includes/footer.php";


?>


<script>
$(document).ready(function(){
 
 $(".well2").hide();
    $(".admin").click(function(){
        $(".well2").toggle();
    });


});
</script>   