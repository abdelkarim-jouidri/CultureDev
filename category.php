<?php

    include 'scripts.php';
    $category_instance = new Category($dsn,$user,$password);
    $data = $category_instance->readAll();
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <h1>Culture Dev</h1>
        </div>
        <div class="user-session">
        <p><?="connected with ".$_SESSION['email']?></p>
        </div>
        <div class="anchors-container">
            <a href="#">Categories</a>
            <a href="#"> Posts</a>
            <a href="#">Statistics</a>
            <a href="#">Logout</a>
        </div>
        
    </div>
    <div class="content">
        <h1>culture dev Categories</h1>
        <table>
            <tr>
                <th>Category name</th>
                <th>Category description</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>Cat 1</td>
                <td>lorem ipsum</td>
                <td>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
            <tr>
                <td>Cat 2</td>
                <td>lorem ipsum</td>
                <td>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
            <?php
            $x ="okok";
                foreach($data as $cat) :
                   echo "<tr>
                    <td>".$cat['name']."</td>
                    <td>".$cat['description']."</td>
                    <td>
                        <a href='#'>Edit</a>
                        <a href='#'>Delete</a>
                    </td>
                </tr>"
            ?>
               <?php
                endforeach
            ?>
            
        </table>
    </div>
</body>
</html>