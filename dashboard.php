<?php

    session_start();
    print_r($_SESSION);
   echo "<h1>WELCOME TO THE DASHBOARD email :".$_SESSION['email']." </h1>"


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
        <div class="anchors-container">
            <a href="#">Categories</a>
            <a href="#"> Posts</a>
            <a href="#">Statistics</a>
            <a href="#">Logout</a>
        </div>
    </div>
    <div class="content">
        <h1>culture dev Posts</h1>
        <table>
            <tr>
                <th>Title</th>
                <th>description</th>
                <th>Publish Date</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>Post 1</td>
                <td>Lorem ipsum dolor sit amet consectetur .</td>
                <td>01/01/2021</td>
                <td>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
            <tr>
                <td>Post 2</td>
                <td>Lorem ipsum dolor sit amet consectetur .</td>
                <td>02/01/2021</td>
                <td>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>