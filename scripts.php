<?php

class Database {
    protected $db;

    public function __construct($dsn, $user, $password) {
        try {
            $this->db = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

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
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    if ($login->login($email, $password)) {
        header("Location: dashboard.php");
    } else {
        echo "Incorrect username or password";
    }
}

if (isset($_POST['signup'])) {
    $username = $_POST['fullname'];
    $password = $_POST['pwd'];
    $email = $_POST['email'];
echo "enterred if isset";
    if ($signup->signup($username, $password, $email)) {
        echo "Account created successfully!";
    } else {
        echo "Error creating account";
    }
}

if (isset($_GET['logout'])) {
    $login->logout();
    header("Location: login.php");
}

class Category extends Database {
    
    public function create($name, $description) {
        $stmt = $this->db->prepare("INSERT INTO categories (name, description) VALUES (?, ?)");
        $stmt->execute([$name, $description]);
        return $this->db->lastInsertId();
    }

    public function readAll() {
        $stmt = $this->db->prepare("SELECT * FROM categories");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $description) {
        $stmt = $this->db->prepare("UPDATE categories SET name = ?, description = ? WHERE id = ?");
        $stmt->execute([$name, $description, $id]);
        return $stmt->rowCount();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
}