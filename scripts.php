<?php

include 'classes/Database.php';
include 'classes/Category.class.php';
include 'classes/Post.class.php';



class Login extends Database {
    public function login($email, $password) {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $query->execute(array(':email' => $email, ':password' => md5($password)));
        $result = $query->fetch();

        if ($result) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            echo "successful login";
            print_r($_SESSION);
            return true;
        } else {
            return false;
        }
    }

    public function logout() {
        session_destroy();
    }
}

class Signup extends Database {
    public function signup($username, $password, $email) {
        $query = $this->db->prepare("INSERT INTO users (fullname, password, email) VALUES (:username, :password, :email)");
        $query->execute(array(':username' => $username, ':password' => md5($password), ':email' => $email));

        if ($query) {
            echo "inserted successfully";
            return true;
        } else {
            echo "Error in signup";

            return false;
        }
    }
}



$dsn = "mysql:host=localhost;dbname=test";
$user = "root";
$password = "";
$login = new Login($dsn, $user, $password);
$signup = new Signup($dsn, $user, $password);
$category = new Category($dsn,$user,$password);
$post = new Posts($dsn,$user,$password);
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    if ($login->login($email, $password)) {
        header("Location: dashboard.php");
    } else {

        header("Location: signin.php");

    }
}

if (isset($_POST['signup'])) {
    $username = $_POST['fullname'];
    $password = $_POST['pwd'];
    $email = $_POST['email'];
echo "enterred if isset";
    if ($signup->signup($username, $password, $email)) {
        header('location:signin.php');
    } else {
        echo "Error creating account";
    }
}

if (isset($_GET['logout'])) {
    $login->logout();
    header("Location: login.php");
}








if (isset($_POST['addCategory'])) {
   

    $size = count($_POST['categoryDescription']);
    for($i=0 ; $i<$size ; $i++){
            if($category->create($_POST['categoryName'][$i],$_POST['categoryDescription'][$i])) echo "success";

    }

    header('location:category.php');
    
        
}

if(isset($_POST['delete_category'])) {
    $id=$_POST['category_id_delete'];
    if($category->delete($id)){
        header('location:category.php');
    }
}

if(isset($_POST['editCategory'])) {
    $id=$_POST['category_id'];
    $name = $_POST['categoryName'][0];
    $description = $_POST['categoryDescription'][0];
    if($category->update($id,$name,$description)){
        header('location:category.php');
    }
}

if (isset($_POST['add_post'])) {
    $file = $_FILES['post_image'];
    $size = count($_POST['post_description']);

    for($i=0 ; $i<$size ; $i++){
        print_r($file['name'][$i]);
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file["name"][$i]);
        move_uploaded_file($file["tmp_name"][0], $target_file);
        $size = count($_POST['post_description']);
        if($post->create($_POST['post_name'][$i],$_POST['post_description'][$i],$_POST['post_category'][$i],$file["name"][$i])) echo "success";
        
    }

    header('location:dashboard.php');
        
}