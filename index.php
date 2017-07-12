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


        if(isset($_GET['page'])){

            $page=$_GET['page'];

        }else{
            $page="";
        }

        if($page=="" || $page==1){
            $page_1=0;
        }else{
            $page_1=($page*5)-5;
        }



            $post_query_count="select * from posts";
            $find_count=mysqli_query($connection,$post_query_count);
            $count=mysqli_num_rows($find_count);
            $count=ceil($count / 5);






            	$query="select * from posts limit $page_1, 5";            	 $select_all_post_query=mysqli_query($connection,$query);
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
            		
                
               <!--  <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->





                <!-- First Blog Post -->



                <h3>
                    <a href="post.php?p_id=<?php echo $post_id;?>"> <?php echo $post_title ?> </a>
                </h3>

                <h4>
                    by <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_author ?></a>
                </h4>

                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                 <a href="post.php?p_id=<?php echo $post_id;?>"><img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="" width="400" height="250" style="border-radius:15px;">  </a>
                
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

<ul class="pager">

<?php

for($i=1;$i<=$count;$i++){

    if($i==$page){
       
        echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
     }else{
    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
}
}


?>


</ul>


    <?php
include "includes/footer.php";


?>   


<script>
$(document).ready(function(){
    <?php
    if(!isset($_GET['error'])){
    ?>
    $(".well2").hide();

    <?php
}
?>
    $(".admin").click(function(){
        $(".well2").toggle();
    });


});
</script>