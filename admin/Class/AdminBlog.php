<?php

require_once 'Connection.php';

/**
 *------------------------------------------------------
 * Write Purpose of This Class and its USage
 * -----------------------------------------------------
 */
class AdminBlog
{

    /**
     * @var
     */
    private $conn;


    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->conn = Connection::getInstance();

        if (!$this->conn) {
            die("Database Connection error!!");
        }
    }

    /**
     * @param $data
     * @return void
     */
    public function admin_login($data)
    {
        $admin_email = $data['admin_email'];
        $admin_pass = md5($data['admin_pass']);

        $query = "SELECT * FROM admin_info WHERE admin_email='$admin_email' && admin_pass='$admin_pass'";


        if (mysqli_query($this->conn, $query)) {
            $admin_info = mysqli_query($this->conn, $query);

            if ($admin_info) {
                header("location:dashboard.php");
                $admin_data = mysqli_fetch_assoc($admin_info);
                session_start();
                $_SESSION['adminID'] = $admin_data['id'];
                $_SESSION['admin_name'] = $admin_data['admin_name'];
            }
        }

    }

    /**
     * @return void
     */
    public function adminLogout()
    {
        unset($_SESSION['adminID'], $_SESSION['admin_name']);
        header('location: index.php');
    }

    /**
     * @param $data
     * @return string|void
     */
    public function add_category($data)
    {
        $cat_name = $data['cat_name'];
        $cat_description = $data['cat_description'];

        $query = "INSERT INTO category(cat_name, cat_description) VALUE('$cat_name','$cat_description')";

        if (mysqli_query($this->conn, $query)) {
            return "Category Added Successfully!";
        }
    }

    /**
     * @return bool|mysqli_result|void
     */
    public function display_category()
    {

        $query = "SELECT * FROM category";

        if (mysqli_query($this->conn, $query)) {
            return mysqli_query($this->conn, $query);
        }

    }

    /**
     * @param $id
     * @return array|false|void|null
     */
    public function display_data_by_id($id)
    {

        $query = "SELECT * FROM category WHERE cat_id=$id";

        if (mysqli_query($this->conn, $query)) {
            $returnData = mysqli_query($this->conn, $query);
            return mysqli_fetch_assoc($returnData);
        }
    }

    /**
     * @param $data
     * @return string|void
     */
    public function update_category($data)
    {

        $cat_name = $data['u_cat_name'];
        $cat_description = $data['u_cat_description'];
        $id = $data['id'];

        $query = " UPDATE category SET cat_name='$cat_name', cat_description='$cat_description' WHERE cat_id= '" . $_GET['id'] . "'";

        if (mysqli_query($this->conn, $query)) {
            return "Category Updated Successfully!";
        }

    }


    //get id from manage_cat_view page

    /**
     * @param $id
     * @return string|void
     */
    public function delete_category($id)
    {
        $query = "DELETE FROM category WHERE cat_id=$id";

        if (mysqli_query($this->conn, $query)) {
            return "Category Deleted Successfully!";
        }
    }
}

