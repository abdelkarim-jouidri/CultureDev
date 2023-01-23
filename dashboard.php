<?php

    session_start();
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@latest/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

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
            <a href="category.php">Categories</a>
            <a href="#"> Posts</a>
            <a href="#">Statistics</a>
            <a href="#">Logout</a>
        </div>
        
    </div>
    <div class="content">
    <div class="heading-btn">
            <h1>Culture Dev Posts</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="add-post-btn">
                Add Post
            </button>
        </div>
        <!-- <h1>culture dev Posts</h1> -->
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
                    <button class="edit-button button"><a href="#">Edit</a></button>
                    <button class="delete-button button"><a href="#">Delete</a></button>
                    
                </td>
            </tr>
            <tr>
                <td>Post 2</td>
                <td>Lorem ipsum dolor sit amet consectetur .</td>
                <td>02/01/2021</td>
                <td>
                    <button class="edit-button button"><a href="#">Edit</a></button>
                    <button class="delete-button button"><a href="#">Delete</a></button>
                    
                </td>
            </tr>
        </table>

     <!-- Modal posts -->
     <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action='scripts.php' method="POST" id="form-category">
                <div class="modal-body">
                                <div class="post-inputs">
                                    <input type="hidden" id="post-id" name="post_id">
                                    <div class="post-input mb-2">
                                        <div class="mb-3">
                                            <label class="form-label">post Name</label>
                                            <input type="text" class="form-control"  id="post-name" name="post_name[]" value="" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">post Description</label>
                                            <input type="text" class="form-control"  id="post-description" name="post_description[]" value="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="multiple-items-post d-flex align-items-center gap-1">
                                    <input type="number" class="border w-75 h-100 m-0" placeholder="number of post inputs to be added"> 
                                    <button type="button" class="btn btn-light border" id="multiple-post-btn">add inputs</button>
                                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                    <button type="submit" class="btn btn-primary" name="add_post" data-bs-dismiss="modal" id="save-post" >Save</button>
                    <button type="submit" class="btn btn-warning" name="edit_post" data-bs-dismiss="modal" id="edit-post" >Edit</button>
                </div>
              </form> 
            </div>
          </div>
        </div>
    </div>

        <!-- DELETE POPUP -->
        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="scripts.php" method="POST">
                        <input type="hidden" id="post-id-delete" name="post_id_delete">
                        Are you sure you want to delete this post ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="delete_post" data-bs-dismiss="modal">Yes !</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

    </div>
</body>
<script>
         $(document).ready(function() {
            $('#myTable').DataTable();
        });

    const multiplePostBtn = document.getElementById('multiple-post-btn')
    const postInputContainer = document.querySelector('.post-inputs')
    const postInput = document.querySelector('.post-input')
    multiplePostBtn.onclick = (e)=>{
        const number = e.target.previousElementSibling.value
        cloneObject(number, postInput, postInputContainer )
    }

    function cloneObject(number , original , container){
        for(let i=1 ; i<=number ; i++){
            const clone = original.cloneNode(true);
            container.appendChild(clone)
        }
    }
        function fillInput(id){
            document.getElementById('post-id-delete').value = id
        }
        
        function toggleEditBtn(id,element){
            if(document.getElementById('edit-post').classList.contains('d-none')){
                document.getElementById('edit-post').classList.remove('d-none')
            }
            if(!document.querySelector('.multiple-items-post').classList.contains('d-none')){
            document.querySelector('.multiple-items-post').classList.add('d-none')
            }
            if(!document.querySelector('#save-post').classList.contains('d-none')){
                document.querySelector('#save-post').classList.add('d-none')
            }
            
            console.log(id , element.children[0].textContent)
            document.getElementById('post-name').value = element.children[0].textContent;
            document.getElementById('post-description').value = element.children[1].textContent;
            document.getElementById('post-id').value = id
        }

        document.getElementById('add-cat-btn').onclick = ()=>{
            if(!document.getElementById('edit-post').classList.contains('d-none')){
                document.getElementById('edit-post').classList.add('d-none')
            }
            if(document.querySelector('.multiple-items-post').classList.contains('d-none')){
            document.querySelector('.multiple-items-post').classList.remove('d-none')
            }
            if(document.querySelector('#save-post').classList.contains('d-none')){
                document.querySelector('#save-post').classList.remove('d-none')
            }
        }
    </script>
</html>