<?php 
    // for recieving all data from category 
    $catdata = $obj->display_category();

    if(isset($_GET['status'])){
        if($_GET['status'] == 'delete'){
            $delid = $_GET['id'];
            //for delete purpose, have to pass this id through the function 
            // $obj->delete_category($delid);

            //to return with message
            $msg = $obj->delete_category($delid);
        }
    }
?>

<h2>Manage Category</h2>
<?php if(isset($msg))
    echo $msg;
?>
<table class="table table-bordered">
    <thead>
        <th>ID</th>
        <th>Category Name</th>
        <th>Category Description</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php while($cat=mysqli_fetch_assoc($catdata)){  ?>
        <tr>
            <td><?php echo $cat['cat_id']; ?></td>
            <td><?php echo $cat['cat_name']; ?></td>
            <td><?php echo $cat['cat_description']; ?></td>
            <td>
                <a class="btn btn-primary" href="edit_category.php?status=edit&&id=<?php echo $cat['cat_id'] ?>">Edit</a>
                <a class="btn btn-danger" href="?status=delete&&id=<?php echo $cat['cat_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>