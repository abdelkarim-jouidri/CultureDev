<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background">
        <form action="scripts.php" id="form" method="POST">
            <h2 class="text-center purple-color border-bottom">Login to your account</h2>
            
            <div id="email-input-container">
                <div class="form-control">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Please enter your email">
                </div>
            </div>
            <div class="form-control">
                <label>Password</label>
                <input type="password" name="pwd" placeholder="Please enter your password">
            </div>
            <input type="submit" value="Sign In" name="signin" id="submit-btn">
            <p class="text-center info-text">You don't have an account? <a href="signup.php" class="anchor-style">Sign up here</a></p>
        </form>
    </div>
</body>
<script>
      const signInForm = document.getElementById('form');
    signInForm.email.addEventListener('blur',function(e){
        let emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        const input = e.target.value;
        errParagraph = document.createElement('p')
        errParagraph.setAttribute('id','email-input-error')
        errParagraph.style='color:red;font-size:10px;'

        if(input==''){
            e.target.classList.add('danger-border')
            errParagraph.innerText = 'Email is required'
            // e.target.appendSibling(errMsg)
            if(!document.getElementById('email-input-error')) document.getElementById('email-input-container').appendChild(errParagraph)
        }
        if(input!=''){
            if(!emailRegex.test(input)) {
                if(document.getElementById('email-input-error')){
                    document.getElementById('email-input-error').remove()
                }
                e.target.classList.add('danger-border')
                errParagraph.innerText = 'Invalid Email'
                document.getElementById('email-input-container').appendChild(errParagraph)
            }
            else {
                if(document.getElementById('email-input-error')){
                    e.target.classList.remove('danger-border')

                    document.getElementById('email-input-error').remove()
                    }
            }
        }
    })
</script>
</html>