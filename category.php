<?php

    include 'scripts.php';
    $category_instance = new Category($dsn,$user,$password);
    $data = $category_instance->readAll('categories');


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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        
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
        <div id="banner">Culture Dev</div>
        
    <div class="content-wrapper">
        <div class="heading-btn">
            <h4>Categories</h4>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="add-cat-btn">
                Add Category
            </button>
        </div>
        <table class="table table-hover " id="myTable" class="display" style="width:100%">
            <thead>
            <tr>
                <th class='center-text'>Category name</th>
                <th class='center-text'>Category description</th>
                <th class='center-text'>Actions</th>
            </tr>
            </thead>
            
            <?php
                foreach($data as $cat) :
                    $id = $cat['id'];
                    echo "<tr data-bs-toggle='modal' data-bs-target='#staticBackdrop' onclick='toggleEditBtn($id,this)'>
                    <td  class='center-text'>".$cat['name']."</td>
                    <td class='center-text'>".$cat['description']."</td>
                    <td class='center-text'>
                    <a  data-bs-toggle='modal' data-bs-target='#confirmModal' onclick='fillInput($id)'><i class='fa-solid fa-xmark'></i></a>
                    </td>
                    </tr>"
                    ?>
               <?php
                endforeach
                ?>
            
        </table>
        </div>
        
    </div>
        <!-- Modal category -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action='scripts.php' method="POST" id="form-category" onsubmit="return form(this)">
                <div class="modal-body">
                                <div class="category-inputs">
                                    <input type="hidden" name="myInput" id="" value="">
                                    <input type="hidden" id="category-id" name="category_id">
                                    <div class="category-input mb-2">
                                        <h5>Category 1</h5>
                                        <div class="mb-3">
                                            <label class="form-label ">Category Name</label>
                                            <input type="text" class="form-control mt-0 categoryName" onblur="validateInput(this)"   id="category-name" name="category_name[]" value="" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label ">Category Description</label>
                                            <input type="text" onblur="validateInput(this)" class=" categoryDescription form-control mt-0"  id="category-description" name="category_description[]" value="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="multiple-items-category display-flex align-items-center gap-1">
                                    <input type="number" class="border w-75 h-100 m-0" placeholder="number of category inputs to be added"> 
                                    <button type="button" class="btn btn-light border" id="multiple-category-btn">add inputs</button>
                                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                    <button type="submit" class="btn btn-primary" name="add_category" data-bs-dismiss="modal" id="save-category"  >Save</button>
                    <button type="submit" class="btn btn-warning" name="edit_category" data-bs-dismiss="modal" id="edit-category" >Edit</button>
                </div>
              </form> 
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
         $(document).ready(function() {
            $('#myTable').DataTable();
            document.getElementById('myTable_wrapper').classList.add('w-100')
        });
        
    const formCategory = document.getElementById('form-category')
    const multipleCategoryBtn = document.getElementById('multiple-category-btn')
    const categoryInputContainer = document.querySelector('.category-inputs')
    const categoryInput = document.querySelector('.category-input')
    multipleCategoryBtn.onclick = (e)=>{
        const number = e.target.previousElementSibling.value
        cloneObject(number, categoryInput, categoryInputContainer )
    }

    function cloneObject(number , original , container){
        for(let i=1 ; i<=number ; i++){
            const clone = original.cloneNode(true);
            const heading = clone.children[0].textContent = `Category ${i+1}`
            console.log(heading)
            container.appendChild(clone)
        }
    }
        function fillInput(id){
            document.getElementById('category-id-delete').value = id
            if(!document.querySelector('.multiple-items-category').classList.contains('d-none')){
            document.querySelector('.multiple-items-category').classList.add('d-none')
            }
        }
        
        function toggleEditBtn(id,element){
            if(document.getElementById('edit-category').classList.contains('d-none')){
                document.getElementById('edit-category').classList.remove('d-none')
            }
            if(!document.querySelector('.multiple-items-category').classList.contains('d-none')){
            document.querySelector('.multiple-items-category').classList.add('d-none')
            console.log('true')
            }
            if(!document.querySelector('#save-category').classList.contains('d-none')){
                document.querySelector('#save-category').classList.add('d-none')
            }
            
            document.getElementById('category-name').value = element.children[0].textContent;
            document.getElementById('category-description').value = element.children[1].textContent;
            document.getElementById('category-id').value = id
        }

        document.getElementById('add-cat-btn').onclick = ()=>{
            const inputMarkUp = `<input type="hidden" name="myInput" id="" value="">
            <input type="hidden" id="category-id" name="category_id">
            <div class="category-input mb-2">
                <h5>Category 1</h5>
                <div class="mb-3">
                    <label class="form-label ">Category Name</label>
                    <input type="text" onblur="validateInput(this)" class="form-control mt-0 myclass"   id="category-name" name="category_name[]" value="" />
                </div>
                <div class="mb-3">
                    <label class="form-label ">Category Description</label>
                    <input type="text" onblur="validateInput(this)" class="form-control mt-0"  id="category-description" name="category_description[]" value="" />
                </div>
            </div>`;
            
            categoryInputContainer.innerHTML = inputMarkUp;
    
            formCategory.reset()
            if(!document.getElementById('edit-category').classList.contains('d-none')){
                document.getElementById('edit-category').classList.add('d-none')
            }
            if(document.querySelector('.multiple-items-category').classList.contains('d-none')){
            document.querySelector('.multiple-items-category').classList.remove('d-none')
            }
            if(document.querySelector('#save-category').classList.contains('d-none')){
                document.querySelector('#save-category').classList.remove('d-none')
            }
        }

       

    function validateInput(input){
        let errObject = `<p class="mb-0" style="color:red;" id=${input.name}>${input.previousElementSibling.textContent} cannot be left empty</p>`
        if(input.value=='') {
            clearErrorMsg(input)
            input.insertAdjacentHTML("afterend", errObject);
            input.classList.add('danger-border')

        }
        else{
            clearErrorMsg(input)
        }
    }

    let clearErrorMsg = (input)=> {
        if(document.getElementById(`${input.name}`)) {
                input.classList.remove('danger-border')
                document.getElementById(`${input.name}`).remove()
            }
    }

    function isValid(input){
        let error = ''
        let errObject = `<p class="mb-0" style="color:red;" id=${input.name}>${input.previousElementSibling.textContent} cannot be left empty</p>`
        if(input.value=='') {
            error+='error'
            input.insertAdjacentHTML("afterend", errObject);
            input.classList.add('danger-border')
        }
        else{
            valid = true
            if(document.getElementById(`${input.name}`)) {
                input.classList.remove('danger-border')
                document.getElementById(`${input.name}`).remove()
            }
        }

        return error
    }

    function form(form){
        console.log('inside form function')
        res = ''
        
        const categoryName = Array.from(document.querySelectorAll('.categoryName'))
        const categoryDescription = Array.from(document.querySelectorAll('.categoryDescription'))
        categoryName.forEach(name=>res+=isValid(name))
        categoryDescription.forEach(description=>res+=isValid(description))
        if (res=='') {
            return true
        }
        else return false
    }

    </script>
</body>
</html>