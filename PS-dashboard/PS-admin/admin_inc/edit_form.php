<form action="" method="post">

    <div class="form-group">
        <label for="">Title</label>
        <?php      
        $cat_qry = "SELECT*FROM `categories` WHERE `cat_id` = '$edit_id';";
        $all_cat = mysqli_query($connection, $cat_qry);
?>
        <?php
while($row = mysqli_fetch_assoc($all_cat)):
    $cat_title = $row['cat_name'];
    ?>
        <input type="text" value="<?=$cat_title?>" name="title" class="form-control">
        <?php
    endwhile ;
?>

    </div>


    <?php
   if(isset($_POST['update_category'])){
       $cat_title = $_POST['title'] ;

       $update_sql = " UPDATE `categories` SET `cat_name`='$cat_title' WHERE `cat_id`='$edit_id' ; "; 
       $up_cat = mysqli_query($connection, $update_sql);
       header("Location:categories.php");



   }
   ?>


    <div class="form-group">

        <input type="submit" name="update_category" value="Update" class="btn btn-block btn-warning">
    </div>

</form>