 <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">






                <!---Blog Search Well -->
                <br>
                <br>
                
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit"class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
<!-- login form -->

<?php
if(isset($_GET['error'])){
    if($_GET['error']=='invalid'){
       echo '<h4 class="text-center">Invalid Username/Password</h2>';
    }else if($_GET['error']=='denied'){
        echo '<h4 class="text-center">Permission Denied</h4><h5 class="text-center">Contact Admin !</h5>';
    }
}
?>



<?php
include "loginwell.php";
?>










               


                <!-- Blog Categories Well -->

                <div class="well">
            

            <?php
            $query="select * from categories ";
            $select_categories_sidebar=mysqli_query($connection,$query);
           

            ?>






                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                    <?php
                    while($rows=mysqli_fetch_assoc($select_categories_sidebar))
                    {
                    $cat_title=$rows['cat_title'];
                    $cat_id=$rows['cat_id'];
                    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                    }

                    ?>

                    </ul>
                        </div>
                        


                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>











                <!-- Side Widget Well -->
                <?php
                include "widget.php";
                ?>

            </div>
