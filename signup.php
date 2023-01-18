<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background">
        <form action="scripts.php" id="form" method="POST">
            <h2 class="text-center purple-color border-bottom">Create an account</h2>
            
            <div class="form-control">
                <label>Full Name</label>
                <input type="text" name="fullname" placeholder="Please enter your full name">
            </div>
            <div class="form-control">
                <label>Email</label>
                <input type="email" name="email" placeholder="Please enter an email">
            </div>
            <div class="form-control">
                <label>Password</label>
                <input type="password" name="pwd" placeholder="Please enter a password">
            </div>
            <input type="submit" value="Sign Up" id="submit-btn"  name="signup">
            <p class="text-center info-text">Already have an account? <a href="signin.php" class="anchor-style">Sign in here</a></p>
        </form>
    </div>
</body>
</html>