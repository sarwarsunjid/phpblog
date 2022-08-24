<?php
require_once '../vendor/autoload.php';

//created object for accessing logout function
use Sanjid\Phpblog\Class\AdminBlog;

$obj = new AdminBlog();
session_start();
$id = $_SESSION['adminID'];
if ($id == null) {
    header("location:index.php");
}
if (isset($_GET['adminlogout']) && $_GET['adminlogout'] == 'logout') {
    $obj->adminLogout();
}

?>

<?php include_once("inc/header.php") ?>
<body class="sb-nav-fixed">
<?php include_once("inc/topnav.php") ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php include_once("inc/sidenav.php") ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="conatiner-fluid">
                <?php
                if (isset($view)) {
                    if ($view == "dashboard") {
                        include("view/dash_view.php");
                    } elseif ($view == "add_category") {
                        include("view/add_cat_view.php");
                    } elseif ($view == "add_post") {
                        include("view/add_post_view.php");
                    } elseif ($view == "manage_category") {
                        include("view/manage_cat_view.php");
                    } elseif ($view == "manage_post") {
                        include("view/manage_post_view.php");
                    } elseif ($view == "edit_category") {
                        include("view/edit_cat_view.php");
                    }
                }
                ?>
            </div>
        </main>
        <?php include_once("inc/footer.php") ?>
    </div>
</div>
<?php include_once("inc/script.php") ?>
</body>
</html>