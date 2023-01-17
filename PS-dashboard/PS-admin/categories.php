<?php 
include('./admin_inc/header.php');
include('./admin_inc/navbar.php');
?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="page-header">
                    Categories
                    <small>ElGohary News</small>
                </h1>
                <div class="row">
                    <div class="col-md-6">
                      <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>EDIT</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                // 1 get data
                $categoriesQuery = " SELECT * FROM `machines` ";
                $allCategories = mysqli_query($con, $categoriesQuery);

                //2 divid
                while ($row = mysqli_fetch_assoc($allCategories)) :
                    $PS_id = $row['PS_id'];
                    $PS_workhours = $row['PS_workhours'];
                ?>

                            <tr>
                                    <th><?=$PS_id?></th>
                                    <th><?=$PS_title?></th>
                                    <th><a href="categories.php?edit_id=<?=$PS_id?>"> <i class="fa fa-edit" ></i> </a></th>
                                    <th><a href="categories.php?del_id=<?=$PS_id?>"> <i class=" fa fa-trash"></i> </a></th>
                                </tr>
        <?php endwhile; ?>
        <?php
        if(isset($_GET['del_id'])){

            $del_id = $_GET['del_id'];
            $del_sql = " DELETE FROM `categories` WHERE cat_id = '$del_id' ";
            $del_cat = mysqli_query($connection, $del_sql);
            header("Location:categories.php");


        }
        ?>
                            </tbody>
                      </table>
                    </div><!-- table -->

                    <div class="col-md-6">
                        <?php
                        if(isset($_POST['Add_category'])){
                            $cat_title = $_POST['title'];
                         //   echo $cat_title ;
                        
                        if( !empty($cat_title) ){
                            $insertSql = "INSERT INTO `categories` (`cat_name`) VALUES ('$cat_title');";
                            $insert_cat = mysqli_query($connection, $insertSql);
                            header('Location:categories.php');

                            }
                            else  {
                                echo ' machen das nicht :p ' ; 
                            }
                           
                        
                       
                        }
                        ?>
                      <form action="" method="post">

                          <div class="form-group">
                              <label for="">Title</label>
                              <input type="text" name="title" class="form-control">
                          </div>
                          

                          <div class="form-group">
                            
                              <input type="submit" name="Add_category" class="btn btn-block btn-primary">
                          </div>

                      </form>

                      <?php if( isset($_GET['edit_id']) ){
                          $edit_id = $_GET['edit_id'];
                          include('admin_inc/edit_form.php');
                      } ?>

                    </div><!-- form -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php 
include('./admin_inc/footer.php');
?>