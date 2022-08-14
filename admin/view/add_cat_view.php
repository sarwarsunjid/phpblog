<?php
    if(isset($_POST['add_cat'])){
       $return_msg =  $obj->add_category($_POST);
    }

?>


<h2>Add Category Page</h2>
<?php if(isset($return_msg)){echo $return_msg;} ?> 
<form action="" method="post">
    <div class="form-group">
        <label for="cat_name" class="mb-1"></label>
        <input type="text" class="form-control py-2" name="cat_name" id="cat_name">
    </div>
    <div class="form-group">
        <label for="cat_description" class="mb-1"></label>
        <input type="text" class="form-control py-2" name="cat_description" id="cat_des">
    </div>
    <input type="submit" name="add_cat" value="Add Category" class="form-control btn btn-block btn-primary mt-4">
</form>