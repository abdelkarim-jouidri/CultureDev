<?php

    include 'scripts.php';
    $category_instance = new Category($dsn,$user,$password);
    $data = $category_instance->readAll();
   print_r($_POST)


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@latest/css/all.min.css">

    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <h1>Culture Dev</h1>
        </div>
        <div class="user-session">
            <p><?php 
            if(isset($_SESSION['email'])) echo "connected with ".$_SESSION['email']
            ?></p>
        </div>
        <div class="anchors-container">
            <a href="#">Categories</a>
            <a href="#"> Posts</a>
            <a href="#">Statistics</a>
            <a href="#">Logout</a>
        </div>
        
    </div>
    <div class="content">
        <!-- <div class="card-container">
            <div class="card-create">
                <div class="card-heading rounded-top">
                    <h2>Add Categories</h2>
                </div>
                <div class="card-inputs">
                    <label for="">my input</label>
                    <input type="text">
                </div>
            </div>
        </div> -->
        
        
        <div class="heading-btn">
            <h1>culture dev Categories</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add Category
            </button>
        </div>
        <table>
            <tr>
                <th class='center-text'>Category name</th>
                <th class='center-text'>Category description</th>
                <th class='center-text'>Actions</th>
            </tr>
            
            <?php
                foreach($data as $cat) :
                    $id = $cat['id'];
                    echo "<tr>
                    <td  class='center-text'>".$cat['name']."</td>
                    <td class='center-text'>".$cat['description']."</td>
                    <td class='center-text'>
                    <a  data-bs-toggle='modal' data-bs-target='#updateModal' onclick='fillInput($id)'><i class='fa-solid fa-xmark'></i></a>
                    </td>
                    </tr>"
                    ?>
               <?php
                endforeach
                ?>
            
        </table>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action='scripts.php' method="POST" id="form-category">
                <div class="modal-body">
                                <input type="hidden" id="category-id" name="category_id">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control"  id="category-name" name="category_name" value="" />
                                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                    <button type="submit" class="btn btn-primary" name="add_category" data-bs-dismiss="modal" >Save</button>
                    <button type="submit" class="btn btn-primary" name="edit_category" data-bs-dismiss="modal" >Edit</button>
                </div>
              </form> 
            </div>
          </div>
        </div>
    </div>

        <!-- DELETE POPUP -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="scripts.php" method="POST">
                        <input type="hidden" id="category-id-delete" name="category_id_delete">
                        Are you sure you want to delete this category ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="delete_category" data-bs-dismiss="modal">Yes !</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    <script>
        function fillInput(id){
            document.getElementById('category-id-delete').value = id
            
        }
    </script>
</body>
</html>