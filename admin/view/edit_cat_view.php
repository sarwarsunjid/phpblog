<?php 
    $catdata = $obj->display_category();

    if(isset($_GET['status'])){
        if($_GET['status']){
            $id =$_GET['id'];
            $returndata = $obj->display_data_by_id($id);
        }
    }

    if(isset($_POST['edit_cat'])){
        $msg = $obj->update_category($_POST);
    }
?>

<h2>Edit Category</h2>
<?php if(isset($msg)){echo $msg;} ?>
<form action="" method="post">
    <div class="form-group">
        <label for="cat_name" class="mb-1"></label>
        <input type="text" class="form-control py-2" name="u_cat_name" value="<?php echo $returndata['cat_name']; ?>">
    </div>
    <div class="form-group">
        <label for="cat_description" class="mb-1"></label>
        <input type="text" class="form-control py-2" name="u_cat_description" value="<?php echo $returndata['cat_description']; ?>">
        <input type="hidden" name="id" value="<?php echo $returndata['$id'];?>">
    </div>
    <input type="submit" name="edit_cat" value="Update Category" class="form-control btn btn-block btn-primary mt-4">
</form>